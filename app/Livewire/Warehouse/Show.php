<?php

namespace App\Livewire\Warehouse;

use Livewire\Component;
use App\Models\Warehouse;

class Show extends Component
{
    public function render()
    {
        return view('livewire.warehouse.show', ['warehouses' => Warehouse::all()]);
    }
}
