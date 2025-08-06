<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Mahasiswa\MataKuliahController as MahasiswaMataKuliahController;
use App\Http\Controllers\Dosen\KRSController as DosenKRSController;
use App\Http\Controllers\Admin\DashboardController;

// =======================
// Halaman Utama & Auth
// =======================
Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

// =======================
// Group Admin
// =======================
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('/admin/mata-kuliah', MataKuliahController::class)->names('admin.mata-kuliah');
    Route::resource('/admin/mahasiswa', MahasiswaController::class)->names('admin.mahasiswa');
});

// =======================
// Group Mahasiswa
// =======================
// routes/web.php
Route::middleware(['auth', 'mahasiswa'])->group(function () {
    Route::get('/mahasiswa/dashboard', function () {
        return view('mahasiswa.dashboard');
    })->name('mahasiswa.dashboard');

    Route::get('/mahasiswa/mata-kuliah', [MahasiswaMataKuliahController::class, 'index'])
        ->name('mahasiswa.mata-kuliah.index');

    Route::post('/mahasiswa/mata-kuliah/ambil/{id}', [MahasiswaMataKuliahController::class, 'ambil'])
        ->name('mahasiswa.mata-kuliah.ambil');
    
    Route::get('/mahasiswa/krs', [MahasiswaMataKuliahController::class, 'krs'])
        ->name('mahasiswa.krs.index');
    
    Route::delete('/mahasiswa/krs/{id}', [MahasiswaMataKuliahController::class, 'hapusKrs'])
       ->name('mahasiswa.krs.hapus');

    Route::get('/mahasiswa/krs/cetak', [MahasiswaMataKuliahController::class, 'cetakKRS'])
        ->name('mahasiswa.krs.cetak');

});

// =======================
// Group Dosen
// =======================
Route::middleware(['auth', 'dosen'])->group(function () {
    Route::get('/dosen/dashboard', function () {
        return view('dosen.dashboard');
    })->name('dosen.dashboard');

    Route::get('/dosen/krs', [DosenKRSController::class, 'index'])->name('dosen.krs.index');
    Route::post('/dosen/krs/{id}/approve', [DosenKRSController::class, 'approve'])->name('dosen.krs.approve');
    Route::post('/dosen/krs/{id}/reject', [DosenKRSController::class, 'reject'])->name('dosen.krs.reject');
});
