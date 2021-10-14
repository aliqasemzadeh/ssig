<?php

namespace App\Http\Livewire\Admin\Project;

use App\Models\Project;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use AuthorizesRequests;
    public $project;

    protected $listeners = [
        'confirmedDelete',
        'cancelledDelete',
        'updateList' => 'render'
    ];

    public function delete(Project $project)
    {
        $this->confirm(__('global.are_you_sure'), [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => __('global.cancel'),
            'confirmButtonText' => __('global.confirm'),
            'onConfirmed' => 'confirmedDelete',
            'onCancelled' => 'cancelledDelete'
        ]);
        $this->project = $project;
    }

    public function confirmedDelete()
    {
        $this->project->delete();
        $this->emit('updateList');
        $this->alert(
            'success',
            __('global.removed')
        );
    }

    public function cancelledDelete()
    {
        $this->alert(
            'success',
            __('global.cancelled')
        );
    }

    public function render()
    {
        $projects = Project::with(['group', 'category'])->paginate(15);
        return view('livewire.admin.project.index', compact('projects'))->layout('layouts.admin');
    }
}
