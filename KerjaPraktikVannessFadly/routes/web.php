<?php

use Illuminate\Support\Facades\Route;

// Rute untuk halaman beranda
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk halaman dashboard, data karyawan, dan absensi
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Data Karyawan
    Route::get('/data-karyawan', function () {
        return view('data-karyawan');
        // Tambahkan logika untuk menampilkan data karyawan
    })->name('data-karyawan');

    // Absensi
    Route::get('/absensi', function () {
        return view('absensi');
        // Tambahkan logika untuk halaman absensi
    })->name('absensi');

    // Rute untuk profil pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Termasuk file auth.php untuk rute otentikasi
require __DIR__.'/auth.php';
