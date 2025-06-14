<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\WaitingAccess;

// Halaman Landing
Route::get('/', function () {
    return view('landing');
})->name('landing');

// // Halaman Login
Route::get('/student-access', function () {
    return view('auth'); 
})->name('studentAccess');

//waiting-access
Route::get('/waiting-access', function () {
    return view('livewire.waiting-access');
})->middleware('auth')->name('waitingAccess');

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

    // pkl
    Route::get('/dataPkl', App\Livewire\Pkl\Index::class)->name('pkl');
    Route::get('/addDataPkl', App\Livewire\Pkl\Create::class)->name('pklCreate');
    Route::get('/viewDataPkl/{id}', App\Livewire\Pkl\View::class)->name('pklView');
    Route::get('/editDataPkl/{id}', App\Livewire\Pkl\Edit::class)->name('pklEdit');

    // guru
    Route::get('/teacher', App\Livewire\Teacher\Index::class)->name('teacher');

    //siswa
    Route::get('/student', App\Livewire\Student\Index::class)->name('student');

    //industri
    Route::get('/industry', App\Livewire\Industry\Index::class)->name('industry');
    Route::get('/industryCreate', App\Livewire\Industry\Create::class)->name('industryCreate');
});
