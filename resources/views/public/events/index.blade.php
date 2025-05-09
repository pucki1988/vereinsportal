<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Öffentliche Veranstaltungen
        </h2>
    </x-slot>

    <div class="py-6 px-4 max-w-7xl mx-auto">
        @foreach ($events as $event)
            <div class="mb-4 p-4 bg-white rounded shadow">
                <h3 class="text-lg font-bold">{{ $event->title }}</h3>
                <p class="text-sm text-gray-600">
                    {{ $event->start->format('d.m.Y H:i') }} – {{ $event->end->format('d.m.Y H:i') }}<br>
                    Veranstalter: {{ $event->club->name ?? 'Unbekannt' }}
                </p>
                <p class="mt-2">{{ $event->description }}</p>
            </div>
        @endforeach
    </div>
</x-app-layout>