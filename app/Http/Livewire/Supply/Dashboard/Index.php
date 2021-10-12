<?php

namespace App\Http\Livewire\Supply\Dashboard;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.supply.dashboard.index')->layout('layouts.supply');
    }
}
