<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if($errors->has('login'))
        <p style="color: red;">{{ $errors->first('login') }}</p>
    @endif

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="/login">
        @csrf

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}">
        <br><br>

        <label>Wachtwoord</label>
        <input type="password" name="password">
        <br><br>

        <button type="submit">Inloggen</button>
    </form>
</body>
</html>
