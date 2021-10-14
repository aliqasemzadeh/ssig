<?php

namespace App\Http\Livewire\Admin\Group;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Group;

class Table extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make( __('global.title'), 'title')
                ->sortable()
                ->searchable(),
        ];
    }

    public function query(): Builder
    {
        return Group::query();
    }
}
