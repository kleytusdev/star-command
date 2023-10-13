<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        return view('livewire.product.show', [ 'products' => Product::all() ]);
    }
}
