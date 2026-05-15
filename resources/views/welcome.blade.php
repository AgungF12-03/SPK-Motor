<!DOCTYPE html>
<html>
<head>
    <title>SPK Motor</title>
</head>
<body>

@if (Route::has('login'))

    @auth

        <a href="{{ url('/home') }}">
            Home
        </a>

    @else

        <a href="{{ route('login') }}">
            Login
        </a>

        <a href="{{ route('register') }}">
            Register
        </a>

    @endauth

@endif

<h1>Website Sistem Pakar Motor</h1>

</body>
</html>
