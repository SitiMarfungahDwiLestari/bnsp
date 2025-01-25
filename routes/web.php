<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\RegistrasiController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('penulis', PenulisController::class);
Route::resource('/buku', BukuController::class);
Route::get('/registrasi/cetak/{id}', [RegistrasiController::class, 'cetak'])->name('registrasi.cetak');
Route::get('/registrasi/cetak/{id}/download', [RegistrasiController::class, 'cetak'])->name('registrasi.cetak.download');
Route::resource('registrasi', RegistrasiController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
