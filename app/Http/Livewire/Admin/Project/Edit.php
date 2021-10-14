<?php

namespace App\Http\Livewire\Admin\Project;

use App\Models\Category;
use App\Models\Group;
use Livewire\Component;

class Edit extends Component
{
    public function render()
    {
        $categories = Category::where('type', 'Project')->get();
        $groups = Group::all();
        return view('livewire.admin.project.edit', compact('categories', 'groups'))->layout('layouts.admin');
    }
}
