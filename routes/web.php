<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/produk', [App\Http\Controllers\HomeController::class, 'produk'])->name('produk');
Route::get('/tambah', [App\Http\Controllers\HomeController::class, 'tambah'])->name('tambah');
Route::post('/simpan', [App\Http\Controllers\HomeController::class, 'simpan'])->name('simpan');
Route::get('/produk/{id}/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('produk.edit');
Route::delete('/produk/{id}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('produk.destroy');
Route::put('/produk/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('produk.update');

