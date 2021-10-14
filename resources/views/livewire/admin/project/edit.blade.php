<div>
    <x-card title="{{ __('global.edit') }}">
        <x-select
            label="{{ __('global.group') }}"
            wire:model.defer="group_id"
        >
            @foreach($groups as $group)
                <x-select.option label="{{ $group->title }}" value="{{ $group->id }}" />
            @endforeach
        </x-select>
        <x-select
            label="{{ __('global.category') }}"
            wire:model.defer="category_id"
        >
            @foreach($categories as $category)
                <x-select.option label="{{ $category->title }}" value="{{ $category->id }}" />
            @endforeach
        </x-select>

        <x-input wire:model.defer="title" label="{{ __('global.title') }}" />
        <x-textarea  wire:model.defer="description" label="{{ __('global.description') }}" />

        <x-inputs.maskable mask="####/##/##" emitFormatted wire:model.defer="start_at" label="{{ __('project.start_at') }}" />
        <x-inputs.maskable mask="####/##/##" emitFormatted wire:model.defer="finish_at" label="{{ __('project.finish_at') }}" />
        <x-slot name="footer">
            <div class="flex justify-between items-center">
                <x-button label="{{ __('global.cancel') }}"  wire:click="$emit('closeModal')" flat negative />
                <x-button label="{{ __('global.edit') }}" wire:click="edit" primary />
            </div>
        </x-slot>
    </x-card>
</div>
