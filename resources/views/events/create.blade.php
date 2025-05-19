
<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Neues Event eintragen') }}
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
            
            <legend class="fieldset-legend">Veranstaltungsort</legend>
            <input
                type="text"
                class="form-control"
                id="location"
                name="location"
                placeholder="z. B. Sporthalle Nord"
            />

            <legend class="fieldset-legend">Beschreibung</legend>
            <textarea class="textarea h-24 w-full textarea-neutral" id="description" name="description" placeholder="Beschreibe das Event"></textarea>
            
            <legend class="fieldset-legend">Ganztägig</legend>
            <input type="checkbox" class="toggle toggle-neutral" name="all_day"  id="all_day" value="1" />

            <legend class="fieldset-legend">Startdatum</legend>
            <input type="date" class="form-control" id="start_date" name="start_date" required>

            
            
            
            <div id="start_time_wrapper">
            <legend class="fieldset-legend">Startzeit</legend>
            <input type="time" class="form-control" id="start_time" name="start_time">
            </div>

            <legend class="fieldset-legend">Enddatum</legend>
            <input type="date" class="form-control" id="end_date" name="end_date" required>
            
            <div id="end_time_wrapper">
            <legend class="fieldset-legend">Endzeit</legend>
            <input type="time" class="form-control" id="end_time" name="end_time">
            </div>
           

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


<script>
    const allDayCheckbox = document.getElementById('all_day');
    const startTimeWrapper = document.getElementById('start_time_wrapper');
    const endTimeWrapper = document.getElementById('end_time_wrapper');

     
    function toggleTimeFields() {
        const hide = allDayCheckbox.checked;
        startTimeWrapper.style.display = hide ? 'none' : 'block';
        endTimeWrapper.style.display = hide ? 'none' : 'block';
    }

    allDayCheckbox.addEventListener('change', toggleTimeFields);

    // Initialer Zustand beim Laden
    document.addEventListener('DOMContentLoaded', toggleTimeFields);
</script>

</x-app-layout>