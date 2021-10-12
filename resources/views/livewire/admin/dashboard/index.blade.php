<div>
    <x-slot name="title">
        {{ __('admin.dashboard') }}
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
        <!-- Replace with your content -->
        <div class="py-4">
            <div class="py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                    <h1 class="text-2xl font-semibold text-gray-900">{{ __('admin.dashboard') }}</h1>
                </div>
                <div>
                    <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
                        <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                {{ __('admin.users') }}
                            </dt>
                            <dd class="mt-1 text-3xl font-semibold text-gray-900">
                                71,897
                            </dd>
                        </div>

                        <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                {{ __('admin.projects') }}
                            </dt>
                            <dd class="mt-1 text-3xl font-semibold text-gray-900">
                                58.16%
                            </dd>
                        </div>

                        <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                {{ __('admin.tasks') }}
                            </dt>
                            <dd class="mt-1 text-3xl font-semibold text-gray-900">
                                24.57%
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>

</div>
