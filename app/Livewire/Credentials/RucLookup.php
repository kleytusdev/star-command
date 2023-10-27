<?php

namespace App\Livewire\Credentials;

use App\Api\ApiPeru;
use Livewire\Component;

class RucLookup extends Component
{
    public int $ruc;
    public bool $loading = false;
    public object $rucData;

    public function getRucData(ApiPeru $apiPeru): void
    {
        $this->loading = true;
        $this->resetErrorBag('ruc');

        try {
            if ($this->ruc && preg_match('/^\d{11}$/', $this->ruc)) {
                $response = $apiPeru->getRuc($this->ruc);

                if ($response) {
                    $this->rucData = $response;
                } else {
                    $this->addError('dni', "No se pudo obtener la información del RUC");
                }
            }
            $this->loading = false;
        } catch (\Throwable $th) {
            $this->addError('ruc', "No se pudo obtener la información del DNI");
        }
    }

    public function render()
    {
        return view('livewire.credentials.ruc-lookup');
    }
}
