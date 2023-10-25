<?php

namespace App\Livewire\Sale;

use App\Models\Product;
use Livewire\Component;
use App\Enums\SalePaymentMethodEnum;
use App\Models\Warehouse;

class Create extends Component
{
    public $price;
    public $quantity;
    public $productId;
    public array $products = [];

    protected $listeners = ['priceUpdated' => 'updatePrice', 'productIdUpdated' => 'addProductId'];

    public function updatePrice($newPrice)
    {
        $this->price = $newPrice;
    }

    public function addProductId($newProductId)
    {
        $this->productId = $newProductId;
    }

    public function render()
    {
        return view('livewire.sale.create', [
            'products' => Product::all(),
            'warehouses' => Warehouse::all(),
            'paymentMethods' => SalePaymentMethodEnum::cases(),
        ]);
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
                    'productId' => $this->productId,
                    'price' => $this->price,
                    'quantity' => $this->quantity,
                ];

                $this->products[] = $product;
            }

            $this->dispatch('addTableProducts', $this->products);

            $this->price = null;
            $this->quantity = null;
        }
    }

    private function findProductIndex($productId)
    {
        foreach ($this->products as $key => $product) {
            if ($product['productId'] == $productId) {
                return $key;
            }
        }

        return false;
    }

    public function store()
    {
        dd($this->products);
    }
}
