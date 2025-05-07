<?php

namespace App\Core;

use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Title('Dashboard')]
    
    public function render()
    {
        return view('core.dashboard')->layout('layouts.app');
    }
}
