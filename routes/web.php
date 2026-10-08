<?php

use App\Http\Controllers\PublikasiController;

Route::get('/publikasi', [PublikasiController::class, 'index'])->name('publikasi.index');
Route::get('/publikasi/create', [PublikasiController::class, 'create'])->name('publikasi.create');
Route::post('/publikasi', [PublikasiController::class, 'store'])->name('publikasi.store');
