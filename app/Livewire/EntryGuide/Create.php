<?php

namespace App\Livewire\EntryGuide;

use App\Enums\EntryGuideStatusEnum;
use Livewire\Component;
use App\Models\Product;
use App\Models\Warehouse;
use App\Enums\SalePaymentMethodEnum;

class Create extends Component
{
    public $price;
    public $status;
    public $quantity;
    public $productId;
    public $dataClient;
    public array $products = [];
    public string $lastClientUpdated = '';

    protected $listeners = [
        'priceUpdated' => 'updatePrice',
        'productIdUpdated' => 'addProductId',
        'removeProduct' => 'updatedProducts',
    ];

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
        // Verifica si se ha seleccionado un producto y si la cantidad es válida
        if ($this->productId && $this->quantity > 0) {
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
        // dd($this->products);
    }
}
