<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="page-label">Dashboard Admin</p>
            <h1 class="page-title">Kelola Sistem</h1>
        </div>
    </x-slot>

    <!-- Alert Messages -->
    @if (session('status'))
        <div class="alert-success mb-6">✅ {{ session('status') }}</div>
    @endif

    @if (session('error'))
        <div class="alert-danger mb-6">❌ {{ session('error') }}</div>
    @endif

    <!-- Stats Row -->
    <div class="grid gap-6 md:grid-cols-4 mb-6">
        <div class="stat-card">
            <div class="stat-value">{{ \App\Models\User::count() }}</div>
            <div class="stat-label">Total Pengguna</div>
        </div>
        <div class="stat-card">
            <div class="stat-value">{{ \App\Models\User::where('role', 'admin')->count() }}</div>
            <div class="stat-label">Admin</div>
        </div>
        <div class="stat-card">
            <div class="stat-value">{{ \App\Models\User::where('role', 'user')->count() }}</div>
            <div class="stat-label">Pengguna Biasa</div>
        </div>
        <div class="stat-card">
            <div class="stat-value">✓</div>
            <div class="stat-label">Sistem Aktif</div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content-grid mb-6">
        <!-- Content Editor -->
        <div class="info-card">
            <p class="page-label">Pengaturan Konten</p>
            <h3>Edit Informasi Website</h3>

            <form method="POST" action="{{ route('admin.content.update') }}" class="form-stack">
                @csrf
                @method('PATCH')

                <div>
                    <x-input-label for="title" :value="__('Judul Website')" />
                    <x-text-input 
                        id="title" 
                        name="title" 
                        type="text" 
                        :value="old('title', $content->title)" 
                        class="form-input"
                        required 
                    />
                    @error('title')
                        <x-input-error :messages="$errors->get('title')" />
                    @enderror
                </div>

                <div>
                    <x-input-label for="description" :value="__('Deskripsi Website')" />
                    <textarea
                        id="description"
                        name="description"
                        rows="5"
                        class="form-input"
                        required
                    >{{ old('description', $content->description) }}</textarea>
                    @error('description')
                        <x-input-error :messages="$errors->get('description')" />
                    @enderror
                </div>

                <button type="submit" class="btn-success">Simpan Perubahan</button>
            </form>
        </div>

        <!-- Admin Info -->
        <div class="info-card">
            <p class="page-label">Info Admin</p>
            <h3>{{ auth()->user()->name }}</h3>
            <p class="text-sm mt-3">
                <strong>Email:</strong><br>
                <span class="text-slate-600">{{ auth()->user()->email }}</span>
            </p>
            <p class="text-sm mt-3">
                <strong>Tipe Akun:</strong><br>
                <span class="inline-block mt-1 px-3 py-1 rounded-full text-sm bg-blue-100 text-blue-800 font-medium">Administrator</span>
            </p>
            <p class="text-sm text-slate-500 mt-4">Anda memiliki akses penuh ke sistem untuk mengelola konten dan pengguna.</p>
        </div>
    </div>

    <!-- User Management -->
    <div class="info-card">
        <div class="flex items-center justify-between mb-6">
            <div>
                <p class="page-label">Manajemen Pengguna</p>
                <h3>Daftar Akun Terdaftar</h3>
            </div>
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                {{ \App\Models\User::count() }} Pengguna
            </span>
        </div>

        <div class="table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Tipe</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>
                                <span class="font-medium text-slate-900">{{ $user->name }}</span>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $user->role === 'admin' ? 'bg-blue-100 text-blue-800' : 'bg-slate-100 text-slate-800' }}">
                                    {{ $user->role === 'admin' ? 'Admin' : 'Pengguna' }}
                                </span>
                            </td>
                            <td>
                                @if ($user->role !== 'admin')
                                    <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-danger" onclick="return confirm('Yakin ingin menghapus pengguna ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                @else
                                    <span class="text-xs text-slate-500 font-medium">Dilindungi</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-slate-500">Tidak ada pengguna yang terdaftar</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
