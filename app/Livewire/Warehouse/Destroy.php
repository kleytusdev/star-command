<?php

namespace App\Livewire\Warehouse;

use App\Models\Warehouse;
use Livewire\Component;

class Destroy extends Component
{
    public $warehouse;

    public function render()
    {
        return view('livewire.warehouse.destroy');
    }

    public function destroy()
    {
        Warehouse::destroy($this->warehouse->id);

        return redirect()->route('dashboard')->with('success', 'Almacén creado exitosamente');
    }
}
