<?php

namespace App\Http\Livewire\Admin\Project;

use App\Models\Category;
use App\Models\Group;
use App\Models\Project;
use App\Rules\CheckPersianDate;
use LivewireUI\Modal\ModalComponent;

class Edit extends ModalComponent
{
    public $project;
    public $title;
    public $description;
    public $start_at;
    public $finish_at;
    public $group_id;
    public $category_id;

    public function mount(Project $project)
    {
        $this->project = $project;
        $this->title = $project->title;
        $this->description = $project->description;
        $this->start_at = jdate($project->start_at)->format('Y\m\d');
        $this->finish_at = jdate($project->finish_at)->format('Y\m\d');
        $this->group_id = $project->group_id;
        $this->category_id = $project->category_id;

    }

    public function edit()
    {
        $this->validate([
            'title' => 'required|string',
            'group_id' => 'required|string',
            'category_id' => 'required|string',
            'description' => 'nullable',
            'start_at' => [new CheckPersianDate(), 'required'],
            'finish_at' => [new CheckPersianDate(), 'required'],
        ]);

        $this->project->title = $this->title;
        $this->project->group_id = $this->group_id;
        $this->project->category_id = $this->category_id;
        $this->project->description = $this->description;
        $this->project->start_at =  \Morilog\Jalali\CalendarUtils::createDatetimeFromFormat('Y/m/d', $this->start_at);
        $this->project->finish_at =  \Morilog\Jalali\CalendarUtils::createDatetimeFromFormat('Y/m/d', $this->finish_at);
        $this->project->save();

        $this->closeModalWithEvents([
            \App\Http\Livewire\Admin\Project\Index::getName() => 'updateList',
        ]);

        $this->alert(
            'success',
            __('global.edited')
        );
    }
    public function render()
    {
        $categories = Category::where('type', 'Project')->get();
        $groups = Group::all();
        return view('livewire.admin.project.edit', compact('categories', 'groups'))->layout('layouts.admin');
    }
}
