<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
</head>
<body>
<header>
    <nav>
        <a href="{{ route('home') }}">home-pagina</a>
        <a href="{{ route('teams') }}">teams</a>
        <a href="{{ route('wedstrijden') }}">wedstrijden</a>
        <a href="{{ route('inzetten') }}">inzetten</a>
    </nav>
</header>
<main>{{ $slot }}</main>
<footer></footer>
</body>
</html>
