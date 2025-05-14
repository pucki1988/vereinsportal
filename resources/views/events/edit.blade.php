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


    
        <form method="POST" action="{{ route('events.update', $event) }}">
        @csrf
        @method('PUT')
            
            <fieldset class="fieldset">
            <legend class="fieldset-legend">Status</legend>
            @if(old('is_visible', $event->is_visible))
            <div class="badge badge-outline badge-success mb-3">sichtbar</div>
            @else
            <div class="badge badge-outline badge-error mb-3">ausgeblendet</div>
            @endif
            <legend class="fieldset-legend">Name</legend>
            <input type="text" id="title" name="title" placeholder="Titel des Event" value="{{ old('title', $event->title) }}" required>
            <legend class="fieldset-legend">Beschreibung</legend>
            <textarea class="textarea h-24 w-full textarea-neutral" id="description" name="description" value="{{ old('description', $event->description) }}" placeholder="Beschreibe das Event"></textarea>
            <legend class="fieldset-legend">Start</legend>
            <input type="datetime-local" class="form-control" id="start" value="{{ old('start', $event->start) }}" name="start">
            <legend class="fieldset-legend">Ende</legend>
            <input type="datetime-local" class="form-control" id="end" value="{{ old('end', $event->end) }}" name="end" required>

            
            
            
            

            @role('admin')
                <legend class="fieldset-legend">Sichtbar</legend>
                <input type="checkbox" class="toggle toggle-neutral" name="is_visible"  id="is_visible" @checked($event->is_visible) value="1" />
                <legend class="fieldset-legend">Verein</legend>
                <select class="select w-full select-neutral" name="club_id" id="club_id" value="{{ old('club_id', $event->club_id) }}">
                    @foreach($clubs as $club)
                        <option value="{{ $club->id }}">{{ $club->name }}</option>
                    @endforeach
                </select>
            @else
                <input type="hidden" name="club_id" value="{{ $clubs->first()->id }}">
            @endrole
        </fieldset>
        <button type="submit" class="btn btn-primary w-full mt-5 btn-lg">Event speichern</button>
    </form>

    </div>
</div>
            </div>
        </div>
</x-app-layout>