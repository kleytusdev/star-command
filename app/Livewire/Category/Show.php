<?php

namespace App\Livewire\Category;

use App\Enums\CategoryStatusEnum;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Models\Category;
use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        return view('livewire.category.show', ['categories' => Category::all()])->layout('layouts.app');
    }
}
