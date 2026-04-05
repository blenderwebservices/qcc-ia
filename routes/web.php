<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('throttle:5,1')->group(function () {
    Route::get('/consulta', [\App\Http\Controllers\CertificateController::class, 'index'])->name('certificates.index');
    Route::post('/consulta', [\App\Http\Controllers\CertificateController::class, 'search'])->name('certificates.search');
    Route::post('/consulta/recordar', [\App\Http\Controllers\CertificateController::class, 'forgotPassword'])->name('certificates.forgot-password');
});
