<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Verein') }}
        </h2>
    </x-slot>

    <div class="lg:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                <div class="text-xl lg:text-3xl py-2">Vereinsinformationen</div>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-3 mb-6">
       
                <div class="card text-base-100 w-full bg-info-content">
                    <div class="card-body flex justify-between">
                        <div class="badge bg-base-100">Name</div>
                        <h2 class="card-title">{{$club->name}}</h2>
                    </div>
                </div>

                <div class="card text-base-100 w-full bg-info-content">
                    <div class="card-body flex justify-between">
                        <div class="badge bg-base-100">Website</div>
                        <h2 class="card-title">{{$club->website}}</h2>
                    </div>
                </div>
                <div class="card text-base-100 w-full bg-info-content">
                    <div class="card-body flex justify-between">
                        <div class="badge bg-base-100">Anschrift</div>
                        <h2 class="card-title">{{$club->address}}</h2>
                    </div>
                </div>
                <div class="card text-base-100 w-full bg-info-content">
                    <div class="card-body flex justify-between">
                        <div class="badge bg-base-100">Weitergabe Pfarrbrief</div>
                        <h2 class="card-title">{{ $club->send_to_church ? 'Ja' : 'Nein' }}</h2>
                    </div>
                </div>
                <div class="card text-base-100 w-full bg-info-content">
                    <div class="card-body flex justify-between">
                        <div class="badge bg-base-100">Weitergabe Gemeinde</div>
                        <h2 class="card-title">{{ $club->send_to_community ? 'Ja' : 'Nein' }}</h2>
                    </div>
                </div>

                </div>
                
                
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

            
                

            </div>
        </div>
    </div>
    </div>
</x-app-layout>