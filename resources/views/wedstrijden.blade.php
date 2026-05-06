<x-base-layout>
    <h1>Wedstrijden</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Datum</th>
                <th>Teams</th>
                <th>Locatie</th>
            </tr>
        </thead>
        <tbody>
            @foreach($wedstrijden as $wedstrijd)
                <tr>
                    <td>{{ $wedstrijd->datum }}</td>
                    <td>
                        {{ $wedstrijd->team1->naam }} vs {{ $wedstrijd->team2->naam }}
                    </td>
                    <td>{{ $wedstrijd->locatie }}</td>
                </tr>
                <form method="POST" action="/schema/generate">
    @csrf
    <button>Genereer schema</button>
</form>
            @endforeach
        </tbody>
    </table>
</x-base-layout>
