<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Einladungen</h2>
    </x-slot>

    <div class="lg:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex justify-end">
                    <a href="{{ route('invitations.create') }}" class="btn bg-info-content text-base-100 mb-4">Vereinsverwalter einladen</a>
                    </div>
                    
                    @if ($invitations->isEmpty())
                <div role="alert" class="alert bg-base-100 text-info-content text-center border border-info-content flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-6 w-6 shrink-0 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-center">Keine offenen Einladungen</span>
                </div>
                @else
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Verein</th>
                        <th>Gültig bis</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invitations as $invitation)
                        <tr>
                            <td>{{ $invitation->email }}</td>
                            <td>{{ $invitation->club?->name ?? '-' }}</td>
                            <td>{{ optional($invitation->expires_at)->format('d.m.Y') ?? '∞' }}</td>
                            <td>
                                @if($invitation->used_at)
                                    <span class="badge badge-success">Genutzt</span>
                                @elseif($invitation->expires_at && now()->gt($invitation->expires_at))
                                    <span class="badge badge-error">Abgelaufen</span>
                                @else
                                    <span class="badge badge-neutral">Offen</span>
                                @endif

                                <form action="{{ route('invitations.destroy', $invitation->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Einladung löschen?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-xs md:btn"><span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-2 14H7L5 7m1 0h12M10 3v2h4V3m-7 0v2h4V3z" />
                                    </svg>
                                </span></button>
                            </form>
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