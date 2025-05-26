<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Vorstandschaft</h2>
    </x-slot>

    <div class="lg:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
        
                <div class="flex justify-end">
                <a href="{{ route('board-members.create') }}" class="btn bg-info-content text-base-100 mb-4">Vorstandschaftsmitglied anlegen</a>
                </div>
                    
        <table class="table w-full">
            <thead>
                <tr>
                    <th>Name</th>
                    <th class="hidden md:table-cell">E-Mail</th>
                    <th>Position</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                    <tr>
                        <td>{{ $member->name }}</td>
                        <td class="hidden md:table-cell">{{$member->email}}</td>
                        <td>{{$member->position}}</td>
                        <td><div class="flex space-x-2">
                            <a href="{{ route('board-members.edit', $member->id) }}" class="btn btn-xs md:btn">
                            <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
</svg></span>
</a>
                        <form action="{{ route('board-members.destroy', $member) }}" method="POST" onsubmit="return confirm('Mitglied wirklich löschen?');">
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
    </div>
    </div>
    </div>
    </div>
</x-app-layout>
