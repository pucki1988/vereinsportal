
<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Neuen Termin eintragen') }}
        </h2>
    </x-slot>
<div class="lg:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


    

    <form method="POST" action="{{ route('events.store') }}">
        @csrf
        <fieldset class="fieldset">
            <legend class="fieldset-legend">Name</legend>
            <input type="text" id="title" name="title" placeholder="Titel des Event" required>
            <legend class="fieldset-legend">Beschreibung</legend>
            <textarea class="textarea h-24 w-full textarea-neutral" id="description" name="description" placeholder="Beschreibe das Event"></textarea>
            <legend class="fieldset-legend">Start</legend>
            <input type="datetime-local" class="form-control" id="start" name="start">
            <legend class="fieldset-legend">Ende</legend>
            <input type="datetime-local" class="form-control" id="end" name="end" required>
            <legend class="fieldset-legend">Veranstaltungsort</legend>
            <input
                type="text"
                class="form-control"
                id="location"
                name="location"
                placeholder="z. B. Sporthalle Nord"
            />

            @role('admin')
                <legend class="fieldset-legend">Verein</legend>
                <select class="select w-full select-neutral" name="club_id" id="club_id">
                    @foreach($clubs as $club)
                        <option value="{{ $club->id }}">{{ $club->name }}</option>
                    @endforeach
                </select>
            @else
                <input type="hidden" name="club_id" value="{{ $clubs->first()->id }}">
            @endrole
        </fieldset>
        <button type="submit" class="btn btn-primary w-full mt-5 btn-lg">Event erstellen</button>
    </form>

    </div>
</div>
            </div>
        </div>
</x-app-layout>