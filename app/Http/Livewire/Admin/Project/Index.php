<?php

namespace App\Http\Livewire\Admin\Project;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.project.index')->layout('layouts.admin');
    }
}
