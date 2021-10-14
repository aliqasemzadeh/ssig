<?php

namespace App\Http\Livewire\Admin\Project;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public function render()
    {
        $projects = Project::paginate(15);
        return view('livewire.admin.project.index', compact('projects'))->layout('layouts.admin');
    }
}
