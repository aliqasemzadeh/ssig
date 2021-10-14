<?php

namespace App\Http\Livewire\Admin\Project;

use App\Models\Category;
use App\Models\Group;
use App\Models\Project;
use App\Rules\CheckPersianDate;
use Livewire\WithPagination;
use LivewireUI\Modal\ModalComponent;

class Create extends ModalComponent
{
    use WithPagination;
    public $title;
    public $description;
    public $start_at;
    public $finish_at;
    public $group_id;
    public $category_id;

    public function create()
    {
        dd($this->start_at);

        $this->validate([
           'title' => 'required|string',
           'group_id' => 'required|string',
           'category_id' => 'required|string',
           'description' => 'nullable',
           'start_at' => [new CheckPersianDate(), 'required'],
           'finish_at' => [new CheckPersianDate(), 'required'],
        ]);

        $project = new Project();
        $project->title = $this->title;
        $project->group_id = $this->group_id;
        $project->category_id = $this->category_id;
        $project->description = $this->description;
        $project->start_at = $this->start_at;
        $project->finish_at = $this->finish_at;
        $project->save();

        $this->closeModalWithEvents([
            \App\Http\Livewire\Admin\Project\Index::getName() => 'updateList',
        ]);

        $this->alert(
            'success',
            __('admin.created')
        );
    }

    public function render()
    {
        $categories = Category::where('type', 'Project')->get();
        $groups = Group::all();
        return view('livewire.admin.project.create', compact('categories', 'groups'))->layout('layouts.admin');
    }
}
