<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('artikel', ArtikelController::class);