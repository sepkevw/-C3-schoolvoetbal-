<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>

    @vite('resources/css/app.css')
</head>
<body>

<header>
    <nav class="navbar">

        <div class="nav-left">
            <a href="{{ route('home') }}">home-pagina</a>

            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('teams') }}">teams</a>
                @endif
            @endauth
        </div>

        <div class="nav-center">
            <img src="{{ asset('img/football.png') }}" alt="logo" class="logo">

            <h1>schoolvoetbal</h1>

            <img src="{{ asset('img/football.png') }}" alt="logo" class="logo">
        </div>

        <div class="nav-right">
            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('wedstrijden') }}">wedstrijden</a>
                @endif

                <a href="{{ route('inzetten') }}">inzetten</a>

                <form method="POST" action="{{ route('logout') }}" class="logout-form">
                    @csrf
                    <button type="submit" class="nav-button">uitloggen</button>
                </form>
            @else
                <a href="{{ route('login') }}">inloggen</a>
                <a href="{{ route('register') }}">registreren</a>
            @endauth
        </div>

    </nav>
</header>

<main>
    {{ $slot }}
</main>

<footer></footer>

</body>
</html>
