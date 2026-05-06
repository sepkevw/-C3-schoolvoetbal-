<x-base-layout>
    <h1 class="text-2xl font-bold mb-4">Teams</h1>

    <form method="POST" action="/teams" class="mb-4">
        @csrf
        <input type="text" name="name" placeholder="Team naam" class="border p-2">
        <button class="bg-blue-500 text-white px-4 py-2">Toevoegen</button>
    </form>

    <ul class="bg-white p-4">
        @foreach($teams as $team)
            <li class="border-b p-2">{{ $team->name }}</li>
        @endforeach
    </ul>
</x-base-layout>
