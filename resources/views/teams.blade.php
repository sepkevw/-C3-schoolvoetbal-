<x-base-layout>
    <h1>Teams</h1>

    <form method="POST" action="/teams">
        @csrf
        <input type="text" name="naam" placeholder="Team naam">
        <button type="submit">Toevoegen</button>
    </form>

    <ul>
        @foreach($teams as $team)
            <li>{{ $team->naam }}</li>
        @endforeach
    </ul>
</x-base-layout>
