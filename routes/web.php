<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('barang', BarangController::class);
});

Route::middleware(['auth', 'role:kasir'])->group(function () {
    Route::get('barang', [BarangController::class, 'index'])->name('barang.index');
});

