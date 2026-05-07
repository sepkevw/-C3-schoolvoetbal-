<x-base-layout>
    <h2 class="text-2xl font-bold mb-4">Teams</h2>

    {{-- FORM --}}
    <form method="POST" action="/teams" class="mb-6 flex flex-col gap-2 max-w-md">
        @csrf

        <input
            type="text"
            name="name"
            placeholder="Team naam"
            class="border p-2 rounded"
            required
        >

        <input
            type="text"
            name="location"
            placeholder="Locatie (bijv. Amsterdam)"
            class="border p-2 rounded"
        >

        <input
            type="date"
            name="event_date"
            class="border p-2 rounded"
        >

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Team toevoegen
        </button>
    </form>

    {{-- LIST --}}
    <div class="bg-white p-4 rounded shadow">
        <h3 class="text-lg font-semibold mb-2">Gemaakte teams</h3>

        @if($teams->count())
            <ul>
                @foreach($teams as $team)
                    <li class="border-b py-2 flex flex-col">
                        <span class="font-semibold">
                            {{ $team->name }}
                        </span>

                        <span class="text-sm text-gray-600">
                            📍 {{ $team->location ?? 'Geen locatie' }}
                        </span>

                        <span class="text-sm text-gray-600">
                            📅 {{ $team->event_date ?? 'Geen datum' }}
                        </span>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500">Nog geen teams toegevoegd.</p>
        @endif
    </div>
</x-base-layout>
