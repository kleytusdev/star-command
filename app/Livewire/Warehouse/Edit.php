<?php

namespace App\Livewire\Warehouse;

use App\Models\Warehouse;
use Livewire\Component;

class Edit extends Component
{
    public $warehouse;
    public string $name;
    public string $address;

    public function render()
    {
        return view('livewire.warehouse.edit', ['warehouse' => $this->warehouse]);
    }

    public function mount($warehouse)
    {
        $this->name = $warehouse->name;
        $this->address = $warehouse->address;
    }

    public function update()
    {
        $this->validate([
            'name' => ['required', 'string', 'min:4'],
            'address' => ['required', 'string', 'min:6'],
        ]);

        $warehouse = [
            'name' => $this->name,
            'address' => $this->address,
        ];

        Warehouse::find($this->warehouse->id)->update($warehouse);

        return redirect()->route('dashboard')->with('success', 'Almacén creado exitosamente');
    }
}
