
<x-app-layout>

<div class="container">
    <h1>Neues Event erstellen</h1>

    <!-- Fehlernachrichten anzeigen -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('events.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">Titel</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="description">Beschreibung</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>

        <div class="form-group">
            <label for="start">Startdatum</label>
            <input type="datetime-local" class="form-control" id="start" name="start" required>
        </div>

        <div class="form-group">
            <label for="end">Enddatum</label>
            <input type="datetime-local" class="form-control" id="end" name="end" required>
        </div>

        <div class="form-group">
            <label for="club_id">Verein</label>
            <select class="form-control" id="club_id" name="club_id" required>
                @foreach ($clubs as $club)
                    <option value="{{ $club->id }}">{{ $club->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Event erstellen</button>
    </form>
</div>

</x-app-layout>