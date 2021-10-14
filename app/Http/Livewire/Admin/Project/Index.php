<?php

namespace App\Http\Livewire\Admin\Project;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $listeners = [
        'confirmedDelete',
        'cancelledDelete',
        'updateList' => 'render'
    ];

    public function render()
    {
        $projects = Project::with(['group', 'category'])->paginate(15);
        return view('livewire.admin.project.index', compact('projects'))->layout('layouts.admin');
    }
}
