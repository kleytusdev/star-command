<?php

namespace App\Livewire\Components;

use App\Models\Product;
use App\Models\Warehouse;
use Livewire\Component;

class Dropdown extends Component
{
    public $price;
    public $warehouses;
    public $products;
    public $warehouseId;
    public $productId;

    public function mount()
    {
        $this->warehouses = Warehouse::all();
        $this->products = Product::all();
    }

    public function render()
    {
        return view('livewire.components.dropdown');
    }

    public function updatedWarehouseId($value): void
    {
        if ($value === '') {
            // Cuando se selecciona "Todos los almacenes," cargar todos los productos
            $this->productId = null; // Deselecciona el producto seleccionado
            $this->products = Product::all();
        } else {
            // Cargar productos del almacén seleccionado
            $this->products = Product::where('warehouse_id', $value)->get();
            $this->productId = null; // Deselecciona el producto seleccionado
        }
    }

    public function updatedProductId($value): void
    {
        // Aquí debes obtener y asignar el precio del producto seleccionado
        if ($value) {
            $product = Product::find($value);
            $this->price = $product->price; // Suponiendo que el modelo de producto tiene un atributo 'price'
        } else {
            $this->price = null; // Deselecciona el precio si no hay producto seleccionado
        }

        $this->dispatch('priceUpdated', $this->price);
        $this->dispatch('productIdUpdated', $this->productId);
    }
}
