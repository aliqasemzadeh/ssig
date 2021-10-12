<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ __('global.direction') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@if(isset($title)){{ $title }} - @endif {{ __('global.title') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @livewireStyles

    <!-- Scripts -->
    @wireUiScripts
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased">


<div class="h-screen flex overflow-hidden bg-gray-100">
    <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
    <div class="fixed inset-0 flex z-40 md:hidden" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-600 bg-opacity-75" aria-hidden="true"></div>
        <div class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-gray-800">
            <div class="absolute top-0 right-0 -mr-12 pt-2">
                <button type="button" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                    <span class="sr-only">Close sidebar</span>
                    <!-- Heroicon name: outline/x -->
                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="flex-shrink-0 flex items-center px-4">
                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg" alt="Workflow">
            </div>
            <div class="mt-5 flex-1 h-0 overflow-y-auto">
                <nav class="px-2 space-y-1">
                    @foreach(config('menu.admin') as $menu)
                        <a href="{{ route($menu['route']) }}" class="@if(request()->routeIs($menu['route'])) bg-gray-900 text-white group flex items-center px-2 py-2 text-base font-medium rounded-md @else text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md @endif">
                            <x-icon name="{{ $menu['icon'] }}" class="text-gray-300 mr-3 flex-shrink-0 h-6 w-6" />
                            {{ __($menu['title']) }}
                        </a>
                    @endforeach
                </nav>
            </div>
        </div>

        <div class="flex-shrink-0 w-14" aria-hidden="true">

        </div>
    </div>

    <!-- Static sidebar for desktop -->
    <div class="hidden md:flex md:flex-shrink-0">
        <div class="flex flex-col w-64">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex-1 flex flex-col min-h-0">
                <div class="flex items-center h-16 flex-shrink-0 px-4 bg-gray-900">
                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg" alt="Workflow">
                </div>
                <div class="flex-1 flex flex-col overflow-y-auto">
                    <nav class="flex-1 px-2 py-4 bg-gray-800 space-y-1">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        @foreach(config('menu.admin') as $menu)
                            <a href="{{ route($menu['route']) }}" class="@if(request()->routeIs($menu['route'])) bg-gray-900 text-white group flex items-center px-2 py-2 text-base font-medium rounded-md @else text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md @endif">
                                <x-icon name="{{ $menu['icon'] }}" class="text-gray-300 mr-3 flex-shrink-0 h-6 w-6" />
                                {{ __($menu['title']) }}
                            </a>
                        @endforeach
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col w-0 flex-1 overflow-hidden">
        @include('layouts.global.header')
        <main class="flex-1 relative overflow-y-auto focus:outline-none">
            {{ $slot }}
        </main>
    </div>



</div>

@stack('modals')

@livewireScripts
</body>
</html>
