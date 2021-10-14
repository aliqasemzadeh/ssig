<div>
    <x-card title="{{ __('global.create') }}">
        <x-select
            label="{{ __('global.type') }}"
            wire:model.defer="type"
        >
            @foreach(config('system.categories') as $type)
                <x-select.option label="{{ __('category.'.$type) }}" value="{{ $type }}" />
            @endforeach
        </x-select>

        <x-input wire:model.defer="title" label="{{ __('global.title') }}" />
        <x-textarea  wire:model.defer="description" label="{{ __('global.description') }}" />
        <x-slot name="footer">
            <div class="flex justify-between items-center">
                <x-button label="{{ __('global.cancel') }}"  wire:click="$emit('closeModal')" flat negative />
                <x-button label="{{ __('global.create') }}" wire:click="create" primary />
            </div>
        </x-slot>
    </x-card>
</div>
