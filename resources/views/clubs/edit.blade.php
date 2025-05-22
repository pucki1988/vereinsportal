<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Verein bearbeiten') }}
        </h2>
    </x-slot>

    <div class="lg:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    
                <form method="POST" action="{{ route('clubs.update', $club) }}">
                    @csrf
                    @method('PUT')


                    <legend class="fieldset-legend">Name</legend>
                    <input type="text" id="name" name="name" class="w-full" placeholder="Vereinsname" value="{{ old('name', $club->name) }}" required>
                    
                    <legend class="fieldset-legend">Website</legend>
                    <input type="text" id="website" name="website" class="w-full" placeholder="Website" value="{{ old('website', $club->website) }}">
                    
                    <legend class="fieldset-legend">Anschrift</legend>
                    <input type="text" id="address" name="address" class="w-full" placeholder="Anschrift" value="{{ old('address', $club->address) }}">
                    
                    <legend class="fieldset-legend">Weitergabe an Pfarrei</legend>
                    <input type="checkbox" class="toggle toggle-neutral" name="send_to_church"  id="send_to_church" @checked($club->send_to_church) value="1" />
            
                    <legend class="fieldset-legend">Weitergabe an Gemeinde</legend>
                    <input type="checkbox" class="toggle toggle-neutral" name="send_to_community"  id="send_to_community" @checked($club->send_to_community) value="1" />

                    <div class="flex justify-end mt-3">
                        <x-primary-button>
                            {{ __('Speichern') }}
                        </x-primary-button>
                    </div>
                </form>
                <ul class="list bg-base-100 rounded-box mt-5">
                <li class="p-4 pb-2 text-lg opacity-60 tracking-wide bg-neutral-content">User</li>
            @foreach($club->users as $index => $user)
                <li class="list-row">
                <div class="text-4xl font-thin opacity-30 tabular-nums">0{{ $index + 1 }}</div>
                <div>
                    
                <div>{{ $user->name }}</div>
                <div class="text-xs uppercase font-semibold opacity-60">{{  $user->email }}</div>
                </div>
                @role('admin')
                <form action="{{ route('profile.destroyUser', $user) }}" method="POST" onsubmit="return confirm('Wirklich löschen?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn"> <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-2 14H7L5 7m1 0h12M10 3v2h4V3m-7 0v2h4V3z" />
                        </svg>
                    </span></button>
                </form>
                @endrole
                </li>
                @endforeach
            </ul>

            <ul class="list bg-base-100 rounded-box ">
                <li class="p-4 pb-2 text-lg opacity-60 tracking-wide bg-neutral-content">Events</li>
            @foreach($club->events->sortBy('start') as $index => $event)
                <li class="list-row">
                <div class="text-4xl font-thin opacity-30 tabular-nums">{{ $event->start->format('d') }}</div>
                <div>
                    
                <div>{{ $event->title }}</div>
                <div class="text-xs uppercase font-semibold opacity-60">{{  $event->start->format('d.m.Y') }} - {{  $event->end->format('d.m.Y') }}</div>
                </div>
                </li>
                @endforeach
            </ul>
                

            </div>
        </div>
    </div>
    </div>
</x-app-layout>