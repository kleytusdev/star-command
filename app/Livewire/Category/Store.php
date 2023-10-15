<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use App\Enums\CategoryStatusEnum;

class Store extends Component
{
    use WithFileUploads;

    public $name, $photoUri;

    public function render()
    {
        return view('livewire.category.store');
    }

    public function store()
    {
        $this->validate([
            'name' => ['required', 'string'],
            'photoUri' => ['nullable', 'image'],
        ]);

        $category = [
            'name' => $this->name,
            'status' => CategoryStatusEnum::ACTIVE,
            'photo_uri' => $this->photoUri,
        ];
        // Guardar el archivo en el disco 'public' y obtener la ruta completa
        if ($this->photoUri) {
            $extension = $this->photoUri->extension();
            $imageName = date('YmdHis') . '_' . rand(11111, 99999) . '.' . $extension;
            $this->photoUri->storeAs('public/categories', $imageName);
            $category['photo_uri'] = $imageName;
        }

        Category::create($category);

        return redirect()->route('categories.index')->with('success', 'Categoría creada exitosamente');
    }
}
