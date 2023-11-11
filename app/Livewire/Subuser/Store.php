<?php

namespace App\Livewire\Subuser;

use App\Api\ApiPeru;
use App\Enums\DocumentTypeEnum;
use Livewire\Component;
use Livewire\WithFileUploads;

class Store extends Component
{
    use WithFileUploads;

    public string $dni;
    public $photoUri;
    public string $name;
    public object $dniData;
    public string $documentType;
    public string $phoneNumber;
    public string $paternalSurname;
    public string $maternalSurname;

    protected $rules = [
        'dni' => 'required|numeric|digits:8',
    ];

    protected $listeners = ['dniChanged' => 'getDniData'];

    public function getDniData(ApiPeru $apiPeru): void
    {
        $this->resetErrorBag('dni');
        $this->validate();

        try {
            if ($this->dni && preg_match('/^\d{8}$/', $this->dni)) {
                $response = $apiPeru->getDni($this->dni);
                if ($response) {
                    dd($response);
                    $this->dniData = $response;
                }
            }
        } catch (\Throwable $th) {
            $this->addError('dni', "No se pudo obtener la información del DNI");
            $this->dniData = (object)[];
        }
    }

    public function render()
    {
        return view('livewire.subuser.store');
    }
}
