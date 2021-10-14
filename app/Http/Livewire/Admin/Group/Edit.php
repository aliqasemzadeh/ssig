<?php

namespace App\Http\Livewire\Admin\Group;

use App\Models\Group;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Edit extends ModalComponent
{

    public $title;
    public $description;
    public $group;

    public function mount(Group $group)
    {
        $this->group = $group;
        $this->title = $group->title;
        $this->description = $group->description;
    }

    public function edit()
    {
        $this->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $this->group->title = $this->title;
        $this->group->description = $this->description;
        $this->group->save();

        $this->closeModalWithEvents([
            \App\Http\Livewire\Admin\Group\Index::getName() => 'updateList',
        ]);

        $this->alert(
            'success',
            __('global.edited')
        );
    }


    public function render()
    {
        return view('livewire.admin.group.edit');
    }
}
