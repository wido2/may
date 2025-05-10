<?php

namespace App\Core\Auth;

use Livewire\Component;

class Logout extends Component
{
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }

    public function render()
    {
        return view('core.auth.logout');
    }
}
