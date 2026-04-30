<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h1>Maak een account</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="/register">
        @csrf

        <label>Naam</label>
        <input type="text" name="name" value="{{ old('name') }}">
        <br><br>

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}">
        <br><br>

        <label>Wachtwoord</label>
        <input type="password" name="password">
        <br><br>

        <button type="submit">Registreren</button>
    </form>
</body>
</html>
