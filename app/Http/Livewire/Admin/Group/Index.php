<?php

namespace App\Http\Livewire\Admin\Group;

use App\Models\Group;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public function render()
    {
        $groups = Group::paginate(15);
        return view('livewire.admin.group.index', compact('groups'))->layout('layouts.admin');
    }
}
