<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Mitglied erstellen</h2>
    </x-slot>
    <div class="lg:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
    <form method="POST" action="{{ route('board-members.store') }}">
        @csrf
        
            <legend class="fieldset-legend">Name</legend>
            <input type="text" id="name" name="name" class="w-full" placeholder="Name" required>
            
            
            <legend class="fieldset-legend">E-Mail</legend>
            <input type="text" id="email" name="email" class="w-full" placeholder="E-Mail" >

            <legend class="fieldset-legend">Position</legend>
            <input type="text" id="position" name="position" class="w-full" placeholder="Position" >
        
        <button type="submit" class="btn bg-info-content text-base-100 w-full mt-5 btn-lg">Mitglied erstellen</button>
        
    </form>
    </div>
    </div>
</div>
</div>
</x-app-layout>