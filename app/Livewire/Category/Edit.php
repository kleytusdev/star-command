<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $name;
    public $photoUri;
    public $category;

    public function render()
    {
        return view('livewire.category.edit');
    }

    public function mount($category)
    {
        $this->name = $category->name;
    }

    public function update()
    {
        $this->validate([
            'name' => ['required', 'string', 'min:4'],
        ]);

        $category = [
            'name' => $this->name,
        ];

        if ($this->photoUri) {
            $this->validate([
                'photoUri' => ['image'],
            ]);

            // Procesar la imagen y guardarla
            $extension = $this->photoUri->extension();
            $imageName = date('YmdHis') . '_' . rand(11111, 99999) . '.' . $extension;
            $this->photoUri->storeAs('public/categories', $imageName);
            $category['photo_uri'] = $imageName;
        }

        // Actualizar la categoría
        Category::find($this->category->id)->update($category);

        return redirect()->route('categories.index')->with('success', 'Categoría actualizada exitosamente');
    }
}
