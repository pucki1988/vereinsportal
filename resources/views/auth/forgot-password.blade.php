<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Du hast dein Passwort vergessen? Kein Problem. Gib einfach deine E-Mail-Adresse an, und wir senden dir einen Link zum Zurücksetzen deines Passworts. Über diesen Link kannst du ein neues Passwort wählen.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('E-Mail')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('E-Mail Passwort Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
