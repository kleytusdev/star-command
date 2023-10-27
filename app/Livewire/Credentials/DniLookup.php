<?php

namespace App\Livewire\Credentials;

use App\Api\ApiPeru;
use Livewire\Component;

class DniLookup extends Component
{
    public int $dni;
    public bool $loading = false;
    public object $dniData;

    public function getDniData(ApiPeru $apiPeru): void
    {
        $this->loading = true;
        $this->resetErrorBag('dni');

        try {
            if ($this->dni && preg_match('/^\d{8}$/', $this->dni)) {
                $response = $apiPeru->getDni($this->dni);

                if ($response) {
                    $this->dniData = $response;
                } else {
                    $this->addError('dni', "No se pudo obtener la información del DNI");
                }
            }
            $this->loading = false;
        } catch (\Throwable $th) {
            $this->addError('dni', "No se pudo obtener la información del DNI");
        }
    }

    public function render()
    {
        return view('livewire.credentials.dni-lookup');
    }
}
