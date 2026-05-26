<x-base-layout>
    <section class="page-section">
        <h2>Wedstrijd-overzicht</h2>

        <div class="table-card">
            @if($wedstrijden->count())
                <table class="wedstrijd-table">
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
                                <td>
                                    <strong>{{ $wedstrijd->team1->name }}</strong>
                                    <span class="versus">vs</span>
                                    <strong>{{ $wedstrijd->team2->name }}</strong>
                                </td>
                                <td>{{ $wedstrijd->datum }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="empty-message">Er zijn nog geen wedstrijden gepland.</p>
            @endif
        </div>
    </section>
</x-base-layout>
