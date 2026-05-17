<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\WebsiteContent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WebsiteContentController extends Controller
{
    # fungsi: menampilkan dashboard admin berisi ringkasan konten website dan data user.
    public function index(): View
    {
        return view('admin.edit', [
            'content' => $this->getContent(),
            'users' => User::query()
                ->orderBy('role')
                ->orderBy('name')
                ->get(),
        ]);
    }

    # fungsi: membuka halaman edit konten. Untuk progress saat ini dibuat sama dengan dashboard admin.
    public function edit(): View
    {
        return $this->index();
    }

    # fungsi: menyimpan perubahan judul dan deskripsi website dari form admin.
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:120'],
            'description' => ['required', 'string', 'max:1000'],
        ]);

        $this->getContent()->update($validated);

        return redirect()
            ->route('admin.dashboard')
            ->with('status', 'Konten website berhasil diperbarui.');
    }

    # fungsi: admin dapat menghapus akun user biasa, tetapi tidak boleh menghapus admin lain atau dirinya sendiri.
    public function destroyUser(User $user): RedirectResponse
    {
        if ($user->role === 'admin' || $user->id === auth()->id()) {
            return redirect()
                ->route('admin.dashboard')
                ->with('error', 'Akun admin tidak boleh dihapus dari halaman ini.');
        }

        $user->delete();

        return redirect()
            ->route('admin.dashboard')
            ->with('status', 'User berhasil dikeluarkan dari sistem.');
    }

    # fungsi: mengambil konten pertama. Jika tabel masih kosong, sistem membuat data awal otomatis.
    private function getContent(): WebsiteContent
    {
        return WebsiteContent::query()->firstOrCreate(
            ['id' => 1],
            [
                'title' => 'Sistem Pendukung Keputusan Kerusakan Mesin Motor',
                'description' => 'Website ini membantu pengguna memahami alternatif penanganan kerusakan mesin kendaraan bermotor menggunakan metode Simple Additive Weighting (SAW).',
            ],
        );
    }
}
