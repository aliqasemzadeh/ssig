<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use App\Models\Group;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Create extends ModalComponent
{
    public $title;
    public $type;
    public $description;

    public function create()
    {
        $this->validate([
            'title' => 'required|string',
            'type' => 'required',
            'description' => 'nullable',
        ]);

        $category = new Category();
        $category->title = $this->title;
        $category->type = $this->type;
        $category->description = $this->description;
        $category->save();

        $this->closeModalWithEvents([
            \App\Http\Livewire\Admin\Category\Index::getName() => 'updateList',
        ]);

        $this->alert(
            'success',
            __('global.created')
        );
    }

    public function render()
    {
        return view('livewire.admin.category.create');
    }
}
