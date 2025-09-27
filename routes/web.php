<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\AbsensiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Student Management
    Route::resource('siswa', SiswaController::class);
    
    // Class Management
    Route::resource('kelas', KelasController::class);
    
    // Major Management
    Route::resource('jurusan', JurusanController::class);
    
    // Academic Records
    Route::resource('nilai', NilaiController::class);
    Route::resource('absensi', AbsensiController::class);
});

require __DIR__.'/auth.php';
