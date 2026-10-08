<?php

use App\Http\Controllers\PublikasiController;

Route::get('/publikasi', [PublikasiController::class, 'index']);
