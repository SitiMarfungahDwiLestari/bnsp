<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('penulis', PenulisController::class);
Route::resource('/buku', BukuController::class);
Route::get('/peminjaman/cetak/{id}', [PeminjamanController::class, 'cetak'])->name('peminjaman.cetak');
Route::get('/peminjaman/cetak/{id}/download', [PeminjamanController::class, 'cetak'])->name('peminjaman.cetak.download');
Route::resource('registrasi', RegistrasiController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::get('/peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
    Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
    Route::put('/peminjaman/{id}/kembalikan', [PeminjamanController::class, 'kembalikan'])
        ->name('peminjaman.kembalikan');
});

