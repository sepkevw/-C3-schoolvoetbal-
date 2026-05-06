<x-base-layout>
    <h1>Wedstrijd-overzicht</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Locatie</th>
                <th>Teams</th>
                <th>Datum</th>
            </tr>
        </thead>
        <tbody>
            @foreach($wedstrijden as $wedstrijd)
                <tr>
                    <td>{{ $wedstrijd->locatie }}</td>
                    <td>{{ $wedstrijd->team1->naam }} vs {{ $wedstrijd->team2->naam }}</td>
                    <td>{{ $wedstrijd->datum }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-base-layout>
