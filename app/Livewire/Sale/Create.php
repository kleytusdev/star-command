<?php

namespace App\Livewire\Sale;

use App\Enums\ProductStatusEnum;
use App\Models\Product;
use Livewire\Component;
use App\Models\Warehouse;
use App\Enums\SalePaymentMethodEnum;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Services\ClientService;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;

class Create extends Component
{
    public $price;
    public $dniData;
    public $rucData;
    public $quantity;
    public $productId;
    public $dataClient;
    public $paymentMethod;
    public array $products = [];
    public string $lastClientUpdated = '';

    protected $listeners = [
        'priceUpdated' => 'updatePrice',
        'productIdUpdated' => 'addProductId',
        'removeProduct' => 'updatedProducts',
        'dniDataObtained' => 'receiveDniData',
        'rucDataObtained' => 'receiveRucData'
    ];

    public function receiveDniData($response)
    {
        $this->dniData = $response;
        $this->lastClientUpdated = 'dni';
        $this->rucData = null; // Reiniciar datos de RUC
        $this->resetErrorBag('dataClient');
    }

    public function receiveRucData($response)
    {
        $this->rucData = $response;
        $this->lastClientUpdated = 'ruc';
        $this->dniData = null; // Reiniciar datos de DNI
        $this->resetErrorBag('dataClient');
    }

    public function updatePrice($newPrice)
    {
        $this->price = $newPrice;
    }

    public function addProductId($newProductId)
    {
        $this->productId = $newProductId;
    }

    public function removeProduct($index)
    {
        unset($this->products[$index]);
    }

    public function updatedProducts($products)
    {
        $this->products = $products;
    }

    public function addProduct()
    {
        $this->resetErrorBag('quantity');

        // Verifica si se ha seleccionado un producto y si la cantidad es válida
        if ($this->productId && $this->quantity > 0) {
            $productIndex = $this->findProductIndex($this->productId);
            $product = Product::find($this->productId);

            if ($product) {
                if ($product->stock < $this->quantity) {
                    // La cantidad excede el stock, crea un mensaje de error
                    $this->addError('quantity', "Solo te quedan {$product->stock} unidades.");
                    return; // Evita agregar el producto al array si hay un error
                }
            }

            if ($productIndex !== false) {
                // El producto ya existe, actualiza la información
                $this->products[$productIndex]['price'] = $this->price;
                $this->products[$productIndex]['quantity'] = $this->quantity;
            } else {
                // El producto no existe, agrégalo al array
                $product = [
                    'id' => $this->productId,
                    'price' => $this->price,
                    'quantity' => $this->quantity,
                ];

                $this->products[] = $product;
            }

            $this->dispatch('addTableProducts', $this->products);
        }
    }

    private function findProductIndex($productId)
    {
        foreach ($this->products as $key => $product) {
            if ($product['id'] == $productId) {
                return $key;
            }
        }

        return false;
    }

    public function render()
    {
        return view('livewire.sale.create', [
            'products' => Product::all(),
            'warehouses' => Warehouse::all(),
            'paymentMethods' => SalePaymentMethodEnum::cases(),
        ]);
    }

    public function store(ClientService $clientService)
    {
        $this->dataClient = match (true) {
            $this->dniData !== null => $this->dniData, // Si solo DNI tiene datos, se guarda DNI.
            $this->rucData !== null => $this->rucData, // Si solo RUC tiene datos, se guarda RUC.
            default => null, // Si ambos campos son nulos, no se guarda nada.
        };

        $this->validate([
            'dataClient' => ['required', 'array'],
            'paymentMethod' => ['required', new Enum(SalePaymentMethodEnum::class)],
            'products' => ['required', 'array'],
            'products.*.id' => ['required', 'exists:products,id'],
            'products.*.price' => ['required'],
            'products.*.quantity' => ['required'],
        ]);

        try {
            $client = $clientService->createOrUpdateClient($this->dataClient);
        } catch (\Throwable $th) {
            session()->flash('error', 'No se encontró al cliente');
        }

        DB::transaction(function () use ($client) {
            $sale = Sale::create([
                'discount' => 0,
                'igv' => 0,
                'subtotal' => 0,
                'total' => 0,
                'payment_method' => $this->paymentMethod,
                'client_id' => $client->id,
                'created_by' => Auth::id(),
            ]);

            foreach ($this->products as $product) {
                $quantity = $product['quantity'];
                SaleDetail::create([
                    'quantity' => $quantity,
                    'unit_price' => $product['price'],
                    'total' => $quantity * $product['price'],
                    'sale_id' => $sale->id,
                    'product_id' => $product['id'],
                ]);

                $product = Product::findOrFail($product['id']);
                $newStock = $product->stock - $quantity;
                if ($newStock === 0) {
                    $product->update(['status' => ProductStatusEnum::SOLD_OUT]);
                }
                $product->update(['stock' => $newStock]);
            }
        });

        return redirect(route('sales.index'));
    }
}
