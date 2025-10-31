<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">Neuen Verein erstellen</h2>
    </x-slot>
    <div class="lg:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
    <form method="POST" action="{{ route('clubs.store') }}">
        @csrf
        
            <legend class="fieldset-legend">Name</legend>
            <input type="text" id="name" name="name" class="w-full" placeholder="Vereinsname" required>
            
            <legend class="fieldset-legend">Website</legend>
            <input type="text" id="website" name="website" class="w-full" placeholder="Website" >

            <legend class="fieldset-legend">Anschrift</legend>
            <input type="text" id="address" name="address" class="w-full" placeholder="Anschrift">
                    
            <legend class="fieldset-legend">Weitergabe an Pfarrei</legend>
            <input type="checkbox" class="toggle toggle-neutral" name="send_to_church"  id="send_to_church" value="1" />
            
            <legend class="fieldset-legend">Weitergabe an Gemeinde</legend>
            <input type="checkbox" class="toggle toggle-neutral" name="send_to_community"  id="send_to_community" value="1" />

        
        <button type="submit" class="btn bg-info-content text-base-100 w-full mt-5 btn-lg">Verein erstellen</button>
        
    </form>
    </div>
    </div>
</div>
</div>
</x-app-layout>