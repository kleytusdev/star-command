<?php

namespace App\Livewire\Sale;

use App\Models\Product;
use Livewire\Component;

class TableProducts extends Component
{
    public array $products = [];

    protected $listeners = ['addTableProducts' => 'tableProducts'];

    public function tableProducts($products)
    {
        $this->products = $products;
    }

    public function listProducts()
    {
        $productIds = collect($this->products)->pluck('productId')->unique();

        // Obtener los datos de los productos basados en los IDs
        $productsData = Product::whereIn('id', $productIds)->get();

        // Modificar el array $this->products para agregar las propiedades "image" y "total"
        foreach ($this->products as &$addedProduct) {
            $product = $productsData->firstWhere('id', $addedProduct['productId']);

            if ($product) {
                $addedProduct['name'] = $product->name;
                $addedProduct['photo_uri'] = $product->photo_uri;
                $addedProduct['total'] = $addedProduct['price'] * $addedProduct['quantity'];
            }
        }

        return collect($this->products);
    }


    public function render()
    {
        return view('livewire.sale.table-products', [
            'productsData' => $this->listProducts(),
        ]);
    }
}
