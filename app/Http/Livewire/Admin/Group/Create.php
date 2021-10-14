<?php

namespace App\Http\Livewire\Admin\Group;

use App\Models\Group;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Create extends ModalComponent
{
    public $title;
    public $description;

    public function create()
    {
        $this->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $group = new Group();
        $group->title = $this->title;
        $group->description = $this->description;
        $group->save();
    }

    public function render()
    {
        return view('livewire.admin.group.create');
    }
}
