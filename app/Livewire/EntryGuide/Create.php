<?php

namespace App\Livewire\EntryGuide;

use App\Enums\EntryGuideStatusEnum;
use App\Enums\ProductStatusEnum;
use Livewire\Component;
use App\Models\Product;
use App\Models\Warehouse;
use App\Enums\SalePaymentMethodEnum;
use App\Models\EntryGuide;
use App\Models\Guide;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;

class Create extends Component
{
    public $price;
    public $status;
    public $orderAt;
    public $quantity;
    public $productId;
    public $observation;
    public array $products = [];

    protected $listeners = [
        'productIdUpdated' => 'addProductId',
        'removeProduct' => 'updatedProducts',
    ];

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
        // Verifica si se ha seleccionado un producto y si la cantidad es válida
        if ($this->productId && $this->price > 0 && $this->quantity > 0 && $this->status != '') {
            $productIndex = $this->findProductIndex($this->productId);
            $product = Product::find($this->productId);

            if ($productIndex !== false) {
                // El producto ya existe, actualiza la información
                $this->products[$productIndex]['price'] = $this->price;
                $this->products[$productIndex]['status'] = $this->status;
                $this->products[$productIndex]['quantity'] = $this->quantity;
            } else {
                // El producto no existe, agrégalo al array
                $product = [
                    'id' => $this->productId,
                    'price' => $this->price,
                    'status' => $this->status,
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
        return view('livewire.entry-guide.create', [
            'statuses' => EntryGuideStatusEnum::cases(),
            'products' => Product::all(),
            'warehouses' => Warehouse::all(),
        ]);
    }

    public function store()
    {
        $this->validate([
            'orderAt' => ['required', 'string', 'max:50'],
            'observation' => ['required', 'string', 'max:255'],
            'status' => ['required', new Enum(EntryGuideStatusEnum::class)],
            'products' => ['required', 'array'],
            'price' => ['required'],
            'quantity' => ['required'],
            'productId' => ['required', 'exists:products,id'],
        ]);

        DB::transaction(function () {
            $guide = Guide::create([
                'observation' => $this->observation,
                'order_at' => $this->orderAt,
                'created_by' => Auth::id(),
            ]);

            foreach ($this->products as $product) {
                $quantity = $product['quantity'];
                EntryGuide::create([
                    'status' => $product['status'],
                    'quantity' => $quantity,
                    'unit_price' => $product['price'],
                    'total' => $quantity * $product['price'],
                    'guide_id' => $guide->id,
                    'product_id' => $product['id'],
                ]);

                $product = Product::findOrFail($product['id']);
                $newStock = $product->stock + $quantity;
                if ($newStock > 0) {
                    $product->update(['status' => ProductStatusEnum::ACTIVE]);
                }
                $product->update(['stock' => $newStock]);
            }
        });

        return redirect(route('entry-guides.index'));
    }
}
