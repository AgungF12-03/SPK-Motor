<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>

<h1>Selamat Datang</h1>

<p>Website Sistem Pakar Motor</p>


@if(auth()->user()->role == 'admin')

    <a href="/admin/edit">
        Edit Website
    </a>

@endif


<br><br>

<form method="POST" action="{{ route('logout') }}">

    @csrf

    <button type="submit">
        Logout
    </button>

</form>

</body>
</html>
