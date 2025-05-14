<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Neuen Verein erstellen</h2>
    </x-slot>
    <div class="lg:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
    <form method="POST" action="{{ route('clubs.store') }}">
        @csrf
        
            <legend class="fieldset-legend">Name</legend>
            <input type="text" id="name" name="name" class="w-full" placeholder="Vereinsname" required>
            <legend class="fieldset-legend">Farbe</legend>
            <input type="color"  class="w-16 h-16 rounded" name="color" required/>
        
        <button type="submit" class="btn btn-primary w-full mt-5 btn-lg">Verein erstellen</button>
        
    </form>
    </div>
    </div>
</div>
</div>
</x-app-layout>