<?php

namespace App\Livewire\Credentials;

use App\Api\ApiPeru;
use Livewire\Component;

class DniLookup extends Component
{
    public string $dni;
    public object $dniData;

    protected $rules = [
        'dni' => 'required|numeric|digits:8',
    ];

    protected $listeners = ['rucDataObtained' => 'updateDniData'];

    public function updateDniData()
    {
        $this->dniData = (object)[];
        $this->dni = '';
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function getDniData(ApiPeru $apiPeru): void
    {
        $this->resetErrorBag('dni');
        $this->validate();

        try {
            if ($this->dni && preg_match('/^\d{8}$/', $this->dni)) {
                $response = $apiPeru->getDni($this->dni);
                if ($response) {
                    $this->dniData = $response;
                    $this->dispatch('dniDataObtained', $response);
                }
            }
        } catch (\Throwable $th) {
            $this->addError('dni', "No se pudo obtener la información del DNI");
            $this->dniData = (object)[];
        }
    }

    public function render()
    {
        return view('livewire.credentials.dni-lookup');
    }
}
