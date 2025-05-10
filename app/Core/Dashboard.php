<?php

namespace App\Core;

use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Title('Dashboard')]
    #[Layout('layouts.app')]
    public function render()
    {
        return view('core.dashboard');
    }
}
