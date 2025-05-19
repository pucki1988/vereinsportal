<x-app-layout>
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
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>