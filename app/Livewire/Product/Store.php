<?php

namespace App\Livewire\Product;

use App\Enums\CategoryStatusEnum;
use App\Enums\ProductStatusEnum;
use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use App\Models\Warehouse;
use Livewire\WithFileUploads;

class Store extends Component
{
    use WithFileUploads;

    public string $name;
    public float $price;
    public string $brand;
    public string $model;
    public int $stock;
    public $photoUri;
    public int $categoryId;
    public int $warehouseId;

    public function render()
    {
        return view(
            'livewire.product.store',
            [
                'categories' => Category::all(),
                'warehouses' => Warehouse::all()
            ]
        );
    }

    public function store()
    {
        $this->validate([
            'name' => ['required', 'string'],
            'price' => ['required', 'regex:/^\d{1,7}(\.\d{1,2})?$/'],
            'brand' => ['required', 'string'],
            'model' => ['required', 'string'],
            'stock' => ['required', 'integer'],
            'photoUri' => ['nullable', 'image'],
            'categoryId' => ['required', 'integer', 'exists:categories,id'],
            'warehouseId' => ['required', 'integer', 'exists:warehouses,id'],
        ]);

        $product = [
            'name' => $this->name,
            'price' => $this->price,
            'brand' => $this->brand,
            'model' => $this->model,
            'stock' => $this->stock,
            'photo_uri' => $this->photoUri,
            'status' => ProductStatusEnum::ACTIVE,
            'qr_code' => 1,
            'category_id' => $this->categoryId,
            'warehouse_id' => $this->warehouseId,
        ];

        // Guardar el archivo en el disco 'public' y obtener la ruta completa
        if ($this->photoUri) {
            $extension = $this->photoUri->extension();
            $imageName = date('YmdHis') . '_' . rand(11111, 99999) . '.' . $extension;
            $this->photoUri->storeAs('public/products', $imageName);
            $product['photo_uri'] = $imageName;
        }

        Product::create($product);

        return redirect()->route('products.index')->with('success', 'Categoría creada exitosamente');
    }
}
