<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('throttle:5,1')->group(function () {
    Route::get('/verificacion', [\App\Http\Controllers\CertificateController::class, 'index'])->name('certificates.index');
    Route::post('/verificacion', [\App\Http\Controllers\CertificateController::class, 'search'])->name('certificates.search');
});

Route::view('/nosotros', 'nosotros')->name('nosotros');
Route::view('/sectores', 'sectores')->name('sectores');
Route::view('/servicios', 'servicios')->name('servicios');

Route::post('/diagnostico/pdf', [\App\Http\Controllers\ReportController::class, 'generatePdf'])->name('diagnostico.pdf');
