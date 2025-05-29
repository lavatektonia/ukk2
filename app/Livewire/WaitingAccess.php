<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class WaitingAccess extends Component
{
    public function mount()
    {
        if (Auth::user()->roles->isNotEmpty()) {
            return redirect()->route('dashboard');
        }
    }

    public function checkRoles()
    {
        if (Auth::user()->roles->isNotEmpty()) {
            return redirectRoute('dashboard');
        }
    }

    public function render()
    {
        return view('livewire.waiting-access');
    }
}
