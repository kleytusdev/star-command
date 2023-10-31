<?php

namespace App\Livewire\Credentials;

use App\Api\ApiPeru;
use Livewire\Component;

class RucLookup extends Component
{
    public string $ruc;
    public object $rucData;

    protected $rules = [
        'ruc' => 'required|numeric|digits:11',
    ];

    protected $listeners = ['dniDataObtained' => 'updateRucData'];

    public function updateRucData()
    {
        $this->rucData = (object)[];
        $this->ruc = '';
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function getRucData(ApiPeru $apiPeru): void
    {
        $this->resetErrorBag('ruc');
        $this->validate();

        try {
            if ($this->ruc && preg_match('/^\d{11}$/', $this->ruc)) {
                $response = $apiPeru->getRuc($this->ruc);

                if ($response) {
                    $this->rucData = $response;
                    $this->dispatch('rucDataObtained', $response);
                }
            }
        } catch (\Throwable $th) {
            $this->addError('ruc', "No se pudo obtener la información del DNI");
            $this->rucData = (object)[];
        }
    }

    public function render()
    {
        return view('livewire.credentials.ruc-lookup');
    }
}
