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
<body class="font-sans antialiased bg-slate-50">
    <div class="flex h-screen flex-col">
        <!-- NAVBAR -->
        <nav class="navbar">
            <div class="navbar-container">
                <div class="navbar-brand">
                    <span>🚗</span>
                    <span>SPK Motor</span>
                </div>
                <div class="navbar-actions">
                    <span class="text-sm text-slate-600">{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn-secondary">Logout</button>
                    </form>
                </div>
            </div>
        </nav>

        <div class="flex flex-1 overflow-hidden">
            <!-- SIDEBAR -->
            <aside class="sidebar">
                <div class="sidebar-header">
                    <p class="text-xs font-semibold uppercase text-slate-500">Menu</p>
                </div>
                <nav class="sidebar-content">
                    <a href="{{ route('home') }}" class="sidebar-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        📊 Beranda
                    </a>
                    <a href="{{ route('profile.edit') }}" class="sidebar-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                        👤 Profil
                    </a>
                    @if(auth()->user()->role === 'admin')
                        <div class="my-3 border-t border-slate-200 pt-3">
                            <p class="px-4 text-xs font-semibold uppercase text-slate-500">Admin</p>
                        </div>
                        <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.*') ? 'active' : '' }}">
                            ⚙️ Dashboard
                        </a>
                    @endif
                </nav>
            </aside>

            <!-- MAIN CONTENT -->
            <main class="flex-1 overflow-y-auto">
                @isset($header)
                    <div class="border-b border-slate-200 bg-white px-8 py-6">
                        {{ $header }}
                    </div>
                @endisset

                <div class="page-section">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
</body>
</html>
