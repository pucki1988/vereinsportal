<x-app-layout>
<form action="{{ route('invitations.store') }}" method="POST" class="max-w-md mx-auto bg-white p-4 rounded">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">E-Mail</label>
            <input type="email" name="email" required class="w-full border px-2 py-1 rounded">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Verein</label>
            <select name="club_id" required class="w-full border px-2 py-1 rounded">
                @foreach($clubs as $club)
                    <option value="{{ $club->id }}">{{ $club->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Einladen</button>
    </form>
    </x-app-layout>