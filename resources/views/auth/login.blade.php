<x-guest-layout>
    <div class="mt-8">
        <div class="mt-6">
            <x-jet-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="sm:col-span-3">
                    <x-jet-label for="system" value="{{ __('system.select_system') }}" />
                    <div class="mt-1">
                        <select id="system" name="system" autocomplete="system" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value="supply">{{ __('system.supply') }}</option>
                            <option value="knowledge">{{ __('system.knowledge') }}</option>
                            <option value="revenue">{{ __('system.revenue') }}</option>
                        </select>
                    </div>
                </div>
                <div class="mt-4">
                    <x-jet-label for="username" value="{{ __('system.username') }}" />
                    <x-jet-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />
                </div>
                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('system.password') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>
                <div class="mt-4">
                    <x-jet-label for="captcha" value="{{ __('system.captcha') }}" />
                    <div class="relative flex items-center">
                        <input type="number" name="captcha" id="captcha" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 flex py-3 pr-3">
                            {!! captcha_img() !!}
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-jet-button class="ml-4">
                        {{ __('system.login') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
