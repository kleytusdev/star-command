<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use App\Enums\CategoryStatusEnum;
use App\Http\Requests\Category\CategoryStoreRequest;

class Store extends Component
{
    public function render()
    {
        return view('livewire.category.store');
    }

    public function store(CategoryStoreRequest $request)
    {
        // Guardar el archivo en el disco 'public' y obtener la ruta completa
        if ($request->hasFile('uri_photo')) {
            $path = $request->file('uri_photo')->store('public/categories');
            $fullPath = asset(str_replace('public', 'storage', $path));
        }

        Category::create([
            'name' => $request->name,
            'status' => CategoryStatusEnum::ACTIVE,
            'uri_photo' => $fullPath ?? null
        ]);

        // return redirect()->route('categories.index')->with('success', 'Categoría creada exitosamente');
    }
}
