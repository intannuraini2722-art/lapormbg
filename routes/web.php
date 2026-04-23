<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AutentikasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Halaman depan diarahkan ke Login
Route::get('/', function () { return redirect()->route('login'); });

// Route untuk tamu (Guest)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AutentikasiController::class, 'tampilLogin'])->name('login'); // Sudah dibuat di tahap sebelumnya
    Route::post('/login', [AutentikasiController::class, 'autentikasi']);
    Route::get('/register', [AutentikasiController::class, 'tampilRegister'])->name('register'); // Sudah dibuat
    Route::post('/register', [AutentikasiController::class, 'simpanRegister']);
});

// Route untuk yang sudah login (Auth)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AutentikasiController::class, 'logout'])->name('logout');

    // GRUP KHUSUS ADMIN
    Route::middleware(AdminMiddleware::class)->group(function () {
        Route::get('/manajemen-user', [UserController::class, 'index'])->name('user.index');
        Route::post('/manajemen-user', [UserController::class, 'store'])->name('user.store');
        Route::put('/manajemen-user/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/manajemen-user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

        // Anda bisa menambah route admin lainnya di sini (Kategori, Lokasi, dll)
        // Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    });

});


