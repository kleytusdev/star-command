<?php

namespace App\Livewire\EntryGuide;

use App\Models\Product;
use Livewire\Component;

class TableProducts extends Component
{
    public array $products = [];
    public $productIndex = null;

    protected $listeners = ['addTableProducts' => 'tableProducts'];

    public function tableProducts($products)
    {
        $this->products = $products;
    }

    public function listProducts()
    {
        $productIds = collect($this->products)->pluck('id')->unique();

        // Obtener los datos de los productos basados en los IDs
        $productsData = Product::whereIn('id', $productIds)->get();

        // Modificar el array $this->products para agregar las propiedades
        foreach ($this->products as &$addedProduct) {
            $product = $productsData->firstWhere('id', $addedProduct['id']);

            if ($product) {
                $addedProduct['name'] = $product->name;
                $addedProduct['status'] = $addedProduct['status'];
                $addedProduct['photo_uri'] = $product->photo_uri;
                $addedProduct['total'] = $addedProduct['price'] * $addedProduct['quantity'];
            }
        }

        return $this->products;
    }

    public function removeProduct($index)
    {
        unset($this->products[$index]);
        $this->productIndex = null;
        $this->dispatch('removeProduct', $this->products);
    }

    public function render()
    {
        return view('livewire.entry-guide.table-products', [
            'productsData' => $this->listProducts(),
        ]);
    }
}
