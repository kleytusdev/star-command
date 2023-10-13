<?php

namespace App\Livewire\Product;

use App\Enums\CategoryStatusEnum;
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
    public $photo_uri;
    public int $category_id;
    public int $warehouse_id;

    protected $rules = [
        'name' => ['required', 'string'],
        'price' => ['required', 'regex:/^\d{1,7}(\.\d{1,2})?$/'],
        'brand' => ['required', 'string'],
        'model' => ['required', 'string'],
        'stock' => ['required', 'integer'],
        'photo_uri' => ['nullable', 'image'],
        'category_id' => ['required', 'integer', 'exists:categories,id'],
        'warehouse_id' => ['required', 'integer', 'exists:warehouses,id'],
    ];

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
        // $this->validate;
        $validatedData = $this->validate();
        // Guardar el archivo en el disco 'public' y obtener la ruta completa
        if ($this->photo_uri) {
            $extension = $this->photo_uri->extension();
            $imageName = date('YmdHis') . '_' . rand(11111, 99999) . '.' . $extension;
            $this->photo_uri->storeAs('public/products', $imageName);
            $validatedData['photo_uri'] = $imageName;
        }
        $validatedData['status'] = CategoryStatusEnum::ACTIVE;
        $validatedData['qr_code'] = 1;

        Product::create($validatedData);

        return redirect()->route('products.index')->with('success', 'Categoría creada exitosamente');
    }
}
