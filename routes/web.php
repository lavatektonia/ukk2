<?php

use Illuminate\Support\Facades\Route;

// Route halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Route dengan middleware autentikasi
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'CheckUserRoles:super_admin',
    'CheckUserRoles:student',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/dataPkl', App\Livewire\Pkl\Index::class)->name('pkl');
    Route::get('/addDataPkl', App\Livewire\Pkl\Create::class)->name('pklCreate');

});
