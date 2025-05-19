<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Mitglied bearbeiten') }}
        </h2>
    </x-slot>

    <div class="lg:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    
                <form method="POST" action="{{ route('board-members.update', $boardMember) }}">
                    @csrf
                    @method('PUT')


                    <legend class="fieldset-legend">Name</legend>
                    <input type="text" id="name" name="name" class="w-full" placeholder="Vereinsname" value="{{ old('name', $boardMember->name) }}" required>
                    <legend class="fieldset-legend">E-Mail</legend>
                    <input type="text" id="email" name="email" class="w-full" placeholder="E-Mail Adresse" value="{{ old('email', $boardMember->email) }}">
                    <legend class="fieldset-legend">Position</legend>
                    <input type="text" id="position" name="position" class="w-full" placeholder="Position" value="{{ old('position', $boardMember->position) }}">
                    <div class="flex justify-end mt-3">
                        <x-primary-button>
                            {{ __('Speichern') }}
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    </div>
</x-app-layout>