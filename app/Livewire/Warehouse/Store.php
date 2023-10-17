<?php

namespace App\Livewire\Warehouse;

use App\Models\Warehouse;
use Livewire\Component;

class Store extends Component
{
    public $name;
    public $address;

    public function render()
    {
        return view('livewire.warehouse.store');
    }

    public function store()
    {
        $this->validate([
            'name' => ['required', 'string', 'min:4'],
            'address' => ['required', 'string', 'min:6'],
        ]);

        $warehouse = [
            'name' => $this->name,
            'address' => $this->address,
        ];

        // dd($warehouse);

        Warehouse::create($warehouse);

        return redirect()->route('dashboard')->with('success', 'Almacén creado exitosamente');
    }
}
