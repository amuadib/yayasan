<?php

use App\Http\Controllers\PresensiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/rekap-presensi/cetak', [PresensiController::class, 'cetak']);
