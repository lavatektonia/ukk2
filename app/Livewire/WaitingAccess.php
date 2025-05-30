<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class WaitingAccess extends Component
{
    public function mount()
    {
        if (Auth::user()?->roles->isNotEmpty()) {
            return redirect()->to(route('dashboard'));
        }
    }

    public function checkRoles()
    {
        if (Auth::user()?->roles->isNotEmpty()) {
            return redirect()->to(route('dashboard'));
        }
    }

    public function render()
    {
        return; 
    }
}
