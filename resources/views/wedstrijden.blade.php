<x-base-layout>
    <h1 class="text-2xl font-bold mb-4">Wedstrijdschema</h1>

    <form method="POST" action="{{ route('schema.generate') }}" class="mb-4">
        @csrf
        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Genereer nieuw schema
        </button>
    </form>

    <table class="w-full border bg-white">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2">Datum</th>
                <th>Teams</th>
                <th>Locatie</th>
            </tr>
        </thead>
        <tbody>
            @foreach($wedstrijden as $wedstrijd)
                <tr class="border-t">
                    <td class="p-2">{{ $wedstrijd->datum }}</td>
                    <td>{{ $wedstrijd->team1->name }} vs {{ $wedstrijd->team2->name }}</td>
                    <td>{{ $wedstrijd->locatie }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-base-layout>
