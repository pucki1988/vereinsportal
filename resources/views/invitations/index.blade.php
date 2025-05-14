<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Einladungen</h2>
    </x-slot>

    <div class="lg:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex justify-end">
                    <a href="{{ route('invitations.create') }}" class="btn btn-primary mb-4">Vereinsverwalter einladen</a>
                    </div>
                    

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
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $invitations->links() }}
            </div>
        </div>
    </div>
    </div>
    </div>
</x-app-layout>