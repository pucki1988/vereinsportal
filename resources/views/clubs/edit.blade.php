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
                    
                    <legend class="fieldset-legend">Farbe</legend>
                    <input type="color"  class="w-16 h-16 rounded" name="color" value="{{ old('color', $club->color) }}"/>
                    
            
            
            

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