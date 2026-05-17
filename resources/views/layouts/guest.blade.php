<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'SPK Motor') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-slate-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-blue-50 to-slate-100">
        <!-- Logo Section -->
        <div class="mb-8 text-center">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-blue-600 text-white text-2xl mb-4">
                🚗
            </div>
            <h1 class="text-3xl font-bold text-slate-900">SPK Motor</h1>
            <p class="text-slate-600 text-sm mt-1">Sistem Pendukung Keputusan</p>
        </div>

        <!-- Auth Card -->
        <div class="w-full sm:max-w-md rounded-lg bg-white shadow-lg border border-slate-200">
            <div class="p-8">
                {{ $slot }}
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-8 text-center text-sm text-slate-500">
            <p>Sistem Pendukung Keputusan Kerusakan Mesin Kendaraan Bermotor</p>
            <p class="mt-1">Menggunakan Metode Simple Additive Weighting (SAW)</p>
        </div>
    </div>
</body>
</html>
