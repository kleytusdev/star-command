<?php

namespace App\Livewire\Subuser;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Table extends Component
{
    public function render()
    {
        return view('livewire.subuser.table', ['subusers' => $this->getSubusers()]);
    }

    public function getSubusers()
    {
        return User::has('roles')->has('person')
        ->where('id', '!=', Auth::id()) // Excluir usuario autenticado
        ->with(['roles', 'person'])
        ->orderByDesc('created_at') // Ordenar descendientemente por created_at
        ->get()
        ->map(function ($user) {
            return (object) [
                'id' => $user->id,
                'role' => $user->roles[0]['name'],
                'photoUri' => $user->photo_uri,
                'email' => $user->email,
                'name' => ucwords(strtolower($user->person->name)),
                'documentNumber' => $user->person->document_number,
                'phoneNumber' => $user->person->phone_number,
                'paternalSurname' => $user->person->paternal_surname,
                'maternalSurname' => $user->person->maternal_surname,
                'active' => $user->active ? 'Activo' : 'Deshabilitado',
            ];
        })
        ->values();
    }
}
