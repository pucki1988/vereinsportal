<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Vereine</h2>
    </x-slot>

    <div class="lg:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
        
                <div class="flex justify-end">
                <a href="{{ route('clubs.create') }}" class="btn bg-info-content text-base-100 mb-4">Neuen Verein anlegen</a>
                </div>
        

    @if ($clubs->isEmpty())
    <div role="alert" class="alert bg-base-100 text-info-content text-center border border-info-content flex">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-6 w-6 shrink-0 stroke-current">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="text-center">Keine Vereine erstellt</span>
    </div>
    @else
        <table class="table w-full">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Aktionen</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clubs as $club)
                    <tr>
                        <td>{{ $club->name }}</td>
                        <td><div class="flex space-x-2">
                            <a href="{{ route('clubs.edit', $club->id) }}" class="btn btn-xs md:btn">
                            <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
</svg></span>
</a>
                        <form action="{{ route('clubs.destroy', $club) }}" method="POST" onsubmit="return confirm('Verein wirklich löschen?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-xs md:btn"> <span class="icon">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-2 14H7L5 7m1 0h12M10 3v2h4V3m-7 0v2h4V3z" />
        </svg>
    </span></button>
</form></div>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
    </div>
    </div>
    </div>
</x-app-layout>