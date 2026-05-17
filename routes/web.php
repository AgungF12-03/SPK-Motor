<?php

use App\Http\Controllers\Admin\WebsiteContentController;
use App\Http\Controllers\ProfileController;
use App\Models\WebsiteContent;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


# fungsi: route di bawah ini hanya dapat dibuka oleh user yang sudah login.
Route::middleware(['auth'])->group(function () {

    Route::get('/home', function () {
        $content = WebsiteContent::query()->first();

        return view('home', [
            'content' => $content,
        ]);

    })->name('home');

    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('home');
    })->name('dashboard');

    # fungsi: route profile bawaan Laravel Breeze untuk melihat dan mengubah data akun.
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


# fungsi: route admin hanya dapat dibuka oleh akun dengan role admin.
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin', [WebsiteContentController::class, 'index'])
        ->name('admin.dashboard');

    Route::get('/admin/edit', [WebsiteContentController::class, 'edit'])
        ->name('admin.edit');

    Route::patch('/admin/content', [WebsiteContentController::class, 'update'])
        ->name('admin.content.update');

    Route::delete('/admin/users/{user}', [WebsiteContentController::class, 'destroyUser'])
        ->name('admin.users.destroy');

});


require __DIR__.'/auth.php';
