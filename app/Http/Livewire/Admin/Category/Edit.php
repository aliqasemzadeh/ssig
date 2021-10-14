<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use LivewireUI\Modal\ModalComponent;

class Edit extends ModalComponent
{
    public $title;
    public $description;
    public $type;
    public $category;

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->title = $category->title;
        $this->type = $category->type;
        $this->description = $category->description;
    }

    public function edit()
    {
        $this->validate([
            'title' => 'required|string',
            'type' => 'required|string',
            'description' => 'nullable',
        ]);

        $this->category->title = $this->title;
        $this->category->type = $this->type;
        $this->category->description = $this->description;
        $this->category->save();

        $this->closeModalWithEvents([
            \App\Http\Livewire\Admin\Category\Index::getName() => 'updateList',
        ]);

        $this->alert(
            'success',
            __('global.edited')
        );
    }

    public function render()
    {
        return view('livewire.admin.category.edit');
    }
}
