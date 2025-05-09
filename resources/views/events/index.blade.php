<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Meine Events') }}
        </h2>
    </x-slot>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
    <h1>Alle Events</h1>

    <!-- Prüfen, ob Events vorhanden sind -->
    @if ($events->isEmpty())
        <p>Keine Events gefunden.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Titel</th>
                    <th>Start</th>
                    <th>Ende</th>
                    <th>Aktionen</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->start }}</td>
                        <td>{{ $event->end }}</td>
                        <td>
                            <a href="{{ route('events.show', $event->id) }}" class="btn btn-info">Anzeigen</a>
                            <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning">Bearbeiten</a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Löschen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('events.create') }}" class="btn btn-primary">Neues Event erstellen</a>
</div>
</div>
            </div>
        </div>
</x-app-layout>