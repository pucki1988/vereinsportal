@php
    use Carbon\Carbon;
@endphp

<x-app-layout>
    

<div class="py-6 px-4 max-w-7xl mx-auto">
        <div class="text-xl lg:text-3xl py-2">Bevorstehende Veranstaltungen</div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-3 mb-6">
        
        @foreach ($events as $event)

        <div class="card bg-base-100 w-100 shadow-sm border-b-4 border-info-content" >
        <div class="card-body">
            
            <div class="badge bg-primary-content badge-xs">in {{ Carbon::now()->startOfDay()->diffInDays(Carbon::parse($event->start->startOfDay(),false)) }} Tagen</div>
            
            <div class="flex justify-between">
            <h2 class="text-2xl font-bold text-info-content">{{ $event->title }}</h2>
     
            </div>
            
            <ul class="mt-6 flex flex-col gap-2 text-xs">

            <li>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 me-2 inline-block"><path fill-rule="evenodd" d="M5.75 2a.75.75 0 0 1 .75.75V4h7V2.75a.75.75 0 0 1 1.5 0V4h.25A2.75 2.75 0 0 1 18 6.75v8.5A2.75 2.75 0 0 1 15.25 18H4.75A2.75 2.75 0 0 1 2 15.25v-8.5A2.75 2.75 0 0 1 4.75 4H5V2.75A.75.75 0 0 1 5.75 2Zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75Z" clip-rule="evenodd" /></svg>
                <span>{{ $event->start->format('d.m.Y') }} @if($event->start->format('H:i') !== '00:00')<span class="mx-1 text-info-content">//</span> {{ $event->start->format('H:i') }} @endif</span>
            </li>
            
            <li >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 me-2 inline-block"><path d="M10 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM6 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0ZM1.49 15.326a.78.78 0 0 1-.358-.442 3 3 0 0 1 4.308-3.516 6.484 6.484 0 0 0-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 0 1-2.07-.655ZM16.44 15.98a4.97 4.97 0 0 0 2.07-.654.78.78 0 0 0 .357-.442 3 3 0 0 0-4.308-3.517 6.484 6.484 0 0 1 1.907 3.96 2.32 2.32 0 0 1-.026.654ZM18 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0ZM5.304 16.19a.844.844 0 0 1-.277-.71 5 5 0 0 1 9.947 0 .843.843 0 0 1-.277.71A6.975 6.975 0 0 1 10 18a6.974 6.974 0 0 1-4.696-1.81Z" /></svg>
            <span>{{ $event->club->name}}</span>  
            </li>
            <li>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4 me-2 inline-block"><path fill-rule="evenodd" d="m9.69 18.933.003.001C9.89 19.02 10 19 10 19s.11.02.308-.066l.002-.001.006-.003.018-.008a5.741 5.741 0 0 0 .281-.14c.186-.096.446-.24.757-.433.62-.384 1.445-.966 2.274-1.765C15.302 14.988 17 12.493 17 9A7 7 0 1 0 3 9c0 3.492 1.698 5.988 3.355 7.584a13.731 13.731 0 0 0 2.273 1.765 11.842 11.842 0 0 0 .976.544l.062.029.018.008.006.003ZM10 11.25a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5Z" clip-rule="evenodd" /></svg>

                <span>{{ $event->location}}</span>
            </li>
            </ul>
            <div class="card-actions justify-start">
            <a href="{{ route('veranstaltungen.show', $event) }}" class="btn bg-info-content text-base-100 mt-2">
     <div class="text-4xl tabular-nums"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
  <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-7-4a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM9 9a.75.75 0 0 0 0 1.5h.253a.25.25 0 0 1 .244.304l-.459 2.066A1.75 1.75 0 0 0 10.747 15H11a.75.75 0 0 0 0-1.5h-.253a.25.25 0 0 1-.244-.304l.459-2.066A1.75 1.75 0 0 0 9.253 9H9Z" clip-rule="evenodd" />
</svg></div>
Details</a>
    </div>
            
        </div>
        </div>
        @endforeach
        </div>



        <div class="text-xl lg:text-3xl py-2">Vereine</div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-3 mb-6">
        @foreach($clubs as $club)

        

        <div class="card text-base-100 w-full bg-info-content">
            <div class="card-body flex justify-between">
                <h2 class="card-title">{{$club->name}}</h2>
                
                <div class="card-actions justify-start">
                
                
                <a href="{{ route('clubinfo.show', $club->id) }}" class="btn btn-content-neutral">Information</a>
                
                <a href="{{ route('veranstaltungen.index',['club_id' => $club->id]) }}" class="btn btn-outline ms-2">Veranstaltungen</a>
                </div>
            </div>
        </div>
        @endforeach
        </div>
    
</div>

</x-app-layout>