<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="page-label">Selamat datang</p>
            <h1 class="page-title">Halo, {{ auth()->user()->name }} 👋</h1>
        </div>
    </x-slot>

    <!-- Stats Row -->
    <div class="grid gap-6 md:grid-cols-4 mb-6">
        <div class="stat-card">
            <div class="stat-value">0</div>
            <div class="stat-label">Diagnosis Dibuat</div>
        </div>
        <div class="stat-card">
            <div class="stat-value">0</div>
            <div class="stat-label">Riwayat Akses</div>
        </div>
        <div class="stat-card">
            <div class="stat-value">{{ \App\Models\User::count() }}</div>
            <div class="stat-label">Pengguna Terdaftar</div>
        </div>
        <div class="stat-card">
            <div class="stat-value">-</div>
            <div class="stat-label">Status Sistem</div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="content-grid mb-6">
        <!-- Website Info -->
        <div class="info-card">
            <p class="page-label">Tentang Sistem</p>
            <h3>{{ $content?->title ?? 'Sistem Pendukung Keputusan' }}</h3>
            <p>
                {{ $content?->description ?? 'Sistem ini dirancang untuk membantu pengguna dalam membuat keputusan terkait penanganan kerusakan mesin kendaraan bermotor menggunakan metode SAW.' }}
            </p>
            <div class="button-row">
                <button class="btn-primary">Mulai Diagnosis</button>
            </div>
        </div>

        <!-- User Profile Card -->
        <div class="info-card">
            <p class="page-label">Profil Anda</p>
            <h3>{{ auth()->user()->name }}</h3>
            <p class="text-sm mt-3">
                <strong>Email:</strong><br>
                <span class="text-slate-600">{{ auth()->user()->email }}</span>
            </p>
            <p class="text-sm mt-3">
                <strong>Tipe Akun:</strong><br>
                <span class="text-slate-600 capitalize">{{ auth()->user()->role === 'admin' ? 'Administrator' : 'Pengguna Biasa' }}</span>
            </p>
            <div class="button-row">
                <a href="{{ route('profile.edit') }}" class="btn-secondary">Edit Profil</a>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="info-card">
        <p class="page-label">Fitur Utama</p>
        <h3>Apa yang Dapat Anda Lakukan</h3>
        <div class="feature-list">
            <div>
                <strong>🔍 Diagnosis Mesin</strong>
                <p class="text-sm text-slate-600 mt-2">Gunakan sistem SAW untuk mendapatkan rekomendasi penanganan kerusakan mesin bermotor Anda.</p>
            </div>
            <div>
                <strong>📚 Pelajari Mesin</strong>
                <p class="text-sm text-slate-600 mt-2">Akses fitur edukasi untuk memahami berbagai jenis kerusakan dan cara penanganannya.</p>
            </div>
            <div>
                <strong>📋 Riwayat Diagnosis</strong>
                <p class="text-sm text-slate-600 mt-2">Lihat riwayat semua diagnosis yang telah Anda lakukan sebelumnya.</p>
            </div>
        </div>
    </div>

    <!-- Info Box -->
    <div class="mt-6 rounded-lg border border-blue-200 bg-blue-50 px-6 py-4">
        <p class="text-sm text-blue-800">
            <strong>💡 Tip:</strong> Gunakan menu di sebelah kiri untuk navigasi ke halaman diagnosis dan edukasi. Jangan lupa untuk memperbarui profil Anda agar data selalu akurat.
        </p>
    </div>
</x-app-layout>
