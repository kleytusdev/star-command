<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Models\Category;

class Destroy extends Component
{
    public $category;

    public function render()
    {
        return view('livewire.category.destroy');
    }

    public function destroy()
    {
        Category::destroy($this->category->id);

        return redirect()->route('categories.index')->with('success', 'Categoría eliminada exitosamente');
    }
}
