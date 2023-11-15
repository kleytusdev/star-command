<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ProfileCard extends Component
{
    public function render()
    {
        $user = User::with(['roles', 'person'])->find(Auth::id());

        return view('livewire.user.profile-card', ['user' => $user]);
    }
}
