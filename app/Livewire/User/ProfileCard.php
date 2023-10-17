<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ProfileCard extends Component
{
    public function render()
    {
        return view('livewire.user.profile-card', ['user' => Auth::user()]);
    }
}
