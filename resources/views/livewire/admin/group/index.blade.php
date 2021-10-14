<div>
    <x-slot name="title">
        {{ __('admin.group') }}
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
        <!-- Replace with your content -->
        <div class="py-4">
            <div class="py-4">
                    <div class="md:flex md:items-center md:justify-between md:space-x-5">
                        <div class="flex items-start space-x-5">
                            <div class="pt-1.5">
                                <h1 class="text-2xl font-bold text-gray-900">{{ __('admin.group') }}</h1>
                            </div>
                        </div>
                        <div class="mt-6 flex flex-col-reverse justify-stretch space-y-4 space-y-reverse sm:flex-row-reverse sm:justify-end sm:space-x-reverse sm:space-y-0 sm:space-x-3 md:mt-0 md:flex-row md:space-x-3">
                            <button onclick="Livewire.emit('openModal', 'admin.group.create')" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500">
                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                </svg>
                                {{ __('global.create') }}
                            </button>
                        </div>
                    </div>
            </div>
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('global.title') }}
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">{{ __('global.actions') }}</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200"  wire:sortable="updateOrder">
                                    @forelse($groups as $group)
                                    <tr wire:sortable.item="{{ $group->id }}" wire:key="product-{{ $group->id }}">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $group->title }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">{{ __('global.edit') }}</a>
                                            <a href="#" class="text-indigo-600 hover:text-red-900">{{ __('global.remove') }}</a>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2">{{ __('admin.empty') }}</td>
                                        </tr>
                                    @endforelse

                                    <!-- More people... -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
</div>
