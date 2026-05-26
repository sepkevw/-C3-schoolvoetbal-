<x-base-layout>
    <h2 class="page-title">Teams</h2>


    <form method="POST" action="/teams" class="team-form">
        @csrf

        <input
            type="text"
            name="name"
            placeholder="Team naam"
            class="form-input"
            required
        >

        <input
            type="text"
            name="location"
            placeholder="Locatie (bijv. Amsterdam)"
            class="form-input"
        >

        <input
            type="date"
            name="event_date"
            class="form-input"
        >
    <div class="teams-button">
           <button class="primary-button">
            Team toevoegen
        </button>
        </div>

    </form>



    <div class="team-container">
        <h3 class="section-title">Gemaakte teams</h3>

        @if($teams->count())
            <ul class="team-list">
                @foreach($teams as $team)
                    <li class="team-item">
                        <span class="team-name">
                            {{ $team->name }}
                        </span>

                        <span class="team-meta">
                            📍 {{ $team->location ?? 'Geen locatie' }}
                        </span>

                        <span class="team-meta">
                            📅 {{ $team->event_date ?? 'Geen datum' }}
                        </span>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="empty-message">Nog geen teams toegevoegd.</p>
        @endif
    </div>
</x-base-layout>
