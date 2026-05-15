<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});


// HOME SETELAH LOGIN
Route::middleware(['auth'])->group(function () {

    Route::get('/home', function () {

        return view('home');

    });

});


// KHUSUS ADMIN
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/edit', function () {

        return view('admin.edit');

    });

});


require __DIR__.'/auth.php';
