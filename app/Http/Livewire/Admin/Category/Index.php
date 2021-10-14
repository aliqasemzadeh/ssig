<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public function render()
    {
        $categories = Category::paginate(15);
        return view('livewire.admin.category.index', compact('categories'))->layout('layouts.admin');
    }
}
