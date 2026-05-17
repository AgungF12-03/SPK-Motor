<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPK Motor</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="public-page">
    {{-- # fungsi: halaman awal bersifat publik, tetapi tombol fitur utama diarahkan ke login jika belum masuk. --}}
    <main class="public-wrapper">
        <section class="public-panel">
            <p class="page-label">Progress Sistem KC dan RPL</p>
            <h1>Sistem Pendukung Keputusan Penanganan Kerusakan Mesin Kendaraan Bermotor</h1>
            <p>
                Website ini disiapkan untuk membantu proses pemilihan penanganan kerusakan mesin
                menggunakan metode Simple Additive Weighting (SAW).
            </p>

            <div class="button-row">
                @auth
                    <a class="btn-primary" href="{{ route('dashboard') }}">Masuk ke Sistem</a>
                @else
                    <a class="btn-primary" href="{{ route('login') }}">Login</a>
                    <a class="btn-secondary" href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        </section>
    </main>
</body>
</html>
