<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use App\Models\Group;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use AuthorizesRequests;
    public $category;

    protected $listeners = [
        'confirmedDelete',
        'cancelledDelete',
        'updateList' => 'render'
    ];

    public function delete(Category $category)
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
        $this->category = $category;
    }

    public function confirmedDelete()
    {
        $this->category->delete();
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
        $categories = Category::paginate(15);
        return view('livewire.admin.category.index', compact('categories'))->layout('layouts.admin');
    }
}
