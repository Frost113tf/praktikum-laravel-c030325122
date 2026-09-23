<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\MatakuliahController;
Route::get('/', function () {
    return view('welcome');
});

// Tambahkan route ini:
Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('artikel', ArtikelController::class);
Route::get('/matakuliah', [MatakuliahController::class, 'index'])->name('matakuliah.index');
Route::get('/matakuliah/create', [MatakuliahController::class, 'create'])->name('matakuliah.create');
Route::post('/matakuliah', [MatakuliahController::class, 'store'])->name('matakuliah.store');