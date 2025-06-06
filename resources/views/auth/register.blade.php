<x-guest-layout>

@php
    $token = request('token');
@endphp
    <form method="POST" action="{{ route('register') }}">
        @csrf

        @if ($token)
        
        @endif

        @if ($token)
        <div class="mb-4 p-2 bg-blue-100 text-blue-800 rounded">
        Du wurdest eingeladen, dich als Vereinsverwalter zu registrieren.
        </div>
        <input type="hidden" name="token" value="{{ $token }}">
        @else
        <div>
            <x-input-label for="token" :value="__('Einladungscode')" />
            <x-text-input id="token" class="block my-1 w-full" type="text" name="token" :value="old('token')" />
        </div>
        @endif

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Passwort')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Passwort wiederholen')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Bereits registriert?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrieren') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
