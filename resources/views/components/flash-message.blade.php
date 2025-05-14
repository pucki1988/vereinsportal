<div class="toast toast-center toast-top fixed z-50">
    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-transition class="alert alert-success" x-init="setTimeout(() => show = false, 5000)" >
            <span>{{ session('success') }}</span>
            <button @click="show = false" class="btn btn-sm btn-circle btn-ghost ml-auto">✕</button>
        </div>
    @endif

    @if (session('warning'))
        <div x-data="{ show: true }" x-show="show" x-transition class="alert alert-warning" x-init="setTimeout(() => show = false, 10000)" >
            <span>{{ session('warning') }}</span>
            <button @click="show = false" class="btn btn-sm btn-circle btn-ghost ml-auto">✕</button>
        </div>
    @endif

    @if (session('error'))
        <div x-data="{ show: true }" x-show="show" x-transition class="alert alert-error" x-init="setTimeout(() => show = false, 10000)" >
            <span>{{ session('error') }}</span>
            <button @click="show = false" class="btn btn-sm btn-circle btn-ghost ml-auto">✕</button>
        </div>
    @endif

    @if ($errors->any())
        <div x-data="{ show: true }" x-show="show" x-transition class="alert alert-error" x-init="setTimeout(() => show = false, 10000)" >
            <div>
                <strong>Fehler:</strong>
                <ul class="list-disc pl-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <button @click="show = false" class="btn btn-sm btn-circle btn-ghost ml-auto">✕</button>
        </div>
    @endif
</div>