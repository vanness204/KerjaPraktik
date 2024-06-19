<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\OwnerLoginController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\OwnerDashboardController;
use App\Http\Controllers\LaporanControllerOwner;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\Auth\PasswordResetLinkController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Data Karyawan
Route::get('/data-karyawan', [KaryawanController::class, 'index'])->name('data-karyawan'); // Rute untuk menampilkan data karyawan
Route::post('/simpan-karyawan', [KaryawanController::class, 'simpanKaryawan'])->name('simpan-karyawan'); // Rute untuk menyimpan data karyawan baru
Route::delete('/karyawan/{id}', [KaryawanController::class, 'hapus'])->name('hapus-karyawan'); // Rute untuk menghapus karyawan

// Absensi
Route::get('/absen', [AbsenController::class, 'index'])->name('absen'); // Menampilkan formulir absensi
Route::post('/simpan-absensi', [AbsenController::class, 'simpanAbsensi'])->name('simpan-absensi'); // Menyimpan data absensi baru

// Laporan
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::post('/laporan/filter', [LaporanController::class, 'filter'])->name('laporan.filter');
Route::get('/laporan/download', [LaporanController::class, 'download'])->name('laporan.download');

// Profile dengan middleware auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Grafik
Route::get('/grafik', [GrafikController::class, 'index'])->name('grafik.index');

// Auth Routes
require __DIR__.'/auth.php';

// Rute untuk registrasi
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

// Rute untuk login owner
Route::get('/owner/login', [OwnerLoginController::class, 'showLoginForm'])->name('owner.login');
Route::post('/owner/login', [OwnerLoginController::class, 'login'])->name('owner.login.post');

// Rute untuk dashboard owner dengan middleware auth
Route::middleware('auth')->group(function () {
    Route::get('/owner/dashboard', [OwnerDashboardController::class, 'index'])->name('owner.dashboard');
    Route::get('/owner/laporan', [LaporanControllerOwner::class, 'index'])->name('owner.laporan.index');
});

//forgot passwaord
// Route untuk menampilkan form reset password
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');

// Route untuk mengirimkan link reset password
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');