<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Account löschen') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Sobald dein Konto gelöscht wurde, werden alle dazugehörigen Daten und Ressourcen dauerhaft entfernt. Bitte lade vor dem Löschen deines Kontos alle Daten oder Informationen herunter, die du behalten möchtest.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Account Löschen') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Bist du sicher, dass du den Account löschen willst?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Wenn dein Account gelöscht wird, werden alle deine Daten unwiderruflich gelöscht. Bitte gib dein Passwort ein um zu bestätigen, dass du deinen Account unwiderruflich löschen willst.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Passwort') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Abbrechen') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Account löschen') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
