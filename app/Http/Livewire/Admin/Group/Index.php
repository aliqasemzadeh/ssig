<?php

namespace App\Http\Livewire\Admin\Group;

use App\Models\Group;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use AuthorizesRequests;
    public $group;

    protected $listeners = [
        'confirmedDelete',
        'cancelledDelete',
        'updateList' => 'render'
    ];

    public function delete(Group $group)
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
        $this->group = $group;
    }

    public function confirmedDelete()
    {
        $this->group->delete();
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
        $groups = Group::paginate(15);
        return view('livewire.admin.group.index', compact('groups'))->layout('layouts.admin');
    }
}
