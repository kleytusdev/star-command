<?php

namespace App\Livewire\Warehouse;

use Livewire\Component;

class Edit extends Component
{
    public $warehouse;

    public function render()
    {
        return view('livewire.warehouse.edit', ['warehouse' => $this->warehouse]);
    }
}
