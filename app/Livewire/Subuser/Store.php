<?php

namespace App\Livewire\Subuser;

use App\Api\ApiPeru;
use App\Models\User;
use App\Models\Person;
use Livewire\Component;
use App\Enums\RoleEnum;
use Livewire\WithFileUploads;
use App\Enums\DocumentTypeEnum;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Enum;

class Store extends Component
{
    use WithFileUploads;

    public $dni;
    public $name;
    public $role;
    public $photoUri;
    public string $email;
    public object $dniData;
    public string $password;
    public $paternalSurname;
    public $maternalSurname;
    public string $phoneNumber;
    public string $documentType;

    protected $rules = [
        'dni' => ['required', 'numeric', 'digits:8'],
    ];

    protected $listeners = [
        'dniChanged' => 'getDniData',
        'dniFound' => 'mount'
    ];

    public function mount()
    {
        $this->dni = $this->dniData->document_number ?? null;
        $this->name = $this->dniData->name ?? null;
        $this->paternalSurname = $this->dniData->paternal_surname ?? null;
        $this->maternalSurname = $this->dniData->maternal_surname ?? null;
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
                    $this->dispatch('dniFound', $response);
                }
            }
        } catch (\Throwable $th) {
            $this->addError('dni', "No se pudo obtener la información del DNI");
            $this->dniData = (object)[];
        }
    }

    public function render()
    {
        return view('livewire.subuser.store', ['roles' => RoleEnum::cases()]);
    }

    public function store()
    {
        $this->validate([
            'role' => ['required', 'string', new Enum(RoleEnum::class)],
            'dni' => ['required', 'numeric', 'digits:8'],
            'name' => ['required', 'string'],
            'paternalSurname' => ['required', 'string'],
            'maternalSurname' => ['required', 'string'],
            'phoneNumber' => ['required', 'numeric', 'digits:9'],
            'email' => ['required', 'string', 'email:rfc,dns', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $person = Person::firstOrCreate([
            'document_type' => DocumentTypeEnum::DNI,
            'document_number' => $this->dni,
        ], [
            'name' => $this->name,
            'paternal_surname' => $this->paternalSurname,
            'maternal_surname' => $this->maternalSurname,
            'full_name' => $this->dniData->fullName,
            'phone_number' => $this->phoneNumber
        ]);

        $user = User::create([
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'person_id' => $person->id
        ]);

        // Guardar el archivo en el disco 'public' y obtener la ruta completa
        if ($this->photoUri) {
            $extension = $this->photoUri->extension();
            $imageName = date('YmdHis') . '_' . rand(11111, 99999) . '.' . $extension;
            $this->photoUri->storeAs('public/users', $imageName);
            $user->photo_uri = $imageName;
        }

        $user->assignRole($this->role);
        $user->save();
    }
}
