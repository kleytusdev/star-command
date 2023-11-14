<?php

namespace App\Livewire\Subuser;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $dni;
    public $name;
    public $subuser;
    public $photoUri;
    public $paternalSurname;
    public $maternalSurname;
    public string $phoneNumber;

    public function render()
    {
        return view('livewire.subuser.edit');
    }

    public function mount($subuser)
    {
        $this->dni = $subuser->documentNumber;
        $this->name = $subuser->name;
        $this->phoneNumber = $subuser->phoneNumber;
        $this->paternalSurname = $subuser->paternalSurname;
        $this->maternalSurname = $subuser->maternalSurname;
    }

    public function update()
    {
        $this->validate([
            'name' => ['required', 'string', 'min:4'],
        ]);

        $subuser = [
            'name' => $this->name,
        ];

        if ($this->photoUri) {
            $this->validate([
                'photoUri' => ['image'],
            ]);

            // Procesar la imagen y guardarla
            $extension = $this->photoUri->extension();
            $imageName = date('YmdHis') . '_' . rand(11111, 99999) . '.' . $extension;
            $this->photoUri->storeAs('public/users', $imageName);
            $subuser['photo_uri'] = $imageName;
        }

        // Actualizar la categoría
        User::find($this->subuser->id)->update($subuser);

        return redirect()->route('categories.index')->with('success', 'Categoría actualizada exitosamente');
    }
}
