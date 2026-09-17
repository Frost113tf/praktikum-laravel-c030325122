<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('welcome');
});

// Tambahkan route ini:
Route::resource('mahasiswa', MahasiswaController::class);