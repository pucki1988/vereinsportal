<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vereinsverwalter einladen') }}
        </h2>
    </x-slot>
<div class="lg:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
<form action="{{ route('invitations.store') }}" method="POST">
        @csrf

        <fieldset class="fieldset">
            <legend class="fieldset-legend">E-Mail</legend>
            <input type="email" name="email" name="email" placeholder="E-Mail" required>
            <legend class="fieldset-legend">Verein</legend>
                <select class="select w-full select-neutral" name="club_id" id="club_id">
                    @foreach($clubs as $club)
                        <option value="{{ $club->id }}">{{ $club->name }}</option>
                    @endforeach
                </select>
        
        </fieldset>
        <button type="submit" class="btn btn-primary w-full mt-5 btn-lg">Einladen</button>
    </form>
    </div>
    </div>
    </div>
    </div>
    </x-app-layout>