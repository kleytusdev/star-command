<?php

namespace App\Livewire\Subuser;

use App\Enums\DocumentTypeEnum;
use Livewire\Component;
use Livewire\WithFileUploads;

class Store extends Component
{
    use WithFileUploads;

    public $name;
    public $photoUri;
    public $documentType;

    public function render()
    {
        return view('livewire.subuser.store', [
            'documentTypes' => DocumentTypeEnum::cases(),
        ]);
    }
}
