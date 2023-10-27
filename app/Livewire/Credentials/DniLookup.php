<?php

namespace App\Livewire\Credentials;

use App\Api\ApiPeru;
use Livewire\Component;

class DniLookup extends Component
{
    public $dni = '';
    public $loading = false;
    public $dniData;

    public function getDniData(ApiPeru $apiPeru)
    {
        $this->loading = true;

        if ($this->dni && preg_match('/^\d{8}$/', $this->dni)) {
            $response = $apiPeru->getDni($this->dni);

            if ($response) {
                $this->dniData = $response;
            } else {
                $this->dniData = ['error' => 'No se pudo obtener la información del DNI'];
            }
        }
        $this->loading = false;
    }

    public function render()
    {
        return view('livewire.credentials.dni-lookup');
    }
}
