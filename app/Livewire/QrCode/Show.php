<?php

namespace App\Livewire\QrCode;

use Livewire\Component;

class Show extends Component
{
    public $product;

    public function render()
    {
        return view('livewire.qr-code.show');
    }
}
