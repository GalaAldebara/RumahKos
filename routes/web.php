<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PemesananKamarController;
use App\Http\Controllers\PembayaranKamarController;
use App\Http\Controllers\PerpanjanganKontrakController;
use App\Http\Controllers\PengunduranDiriController;

Route::get('/nyobalogin', function () {
    return view('login/index2');
});

Route::get('/', function () {
    return view('login/index');
});

Route::get('/register', function () {
    return view('login/register');
});
Route::get('/dashboard', function () {
    return view('dashboard/index');
});
Route::get('/contract', function () {
    return view('contract/index');
});


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/income', function () {
    return view('income/index');
});

Route::get('/pemesanan-kamar', [PemesananKamarController::class, 'index']);
Route::get('/pembayaran-kamar', [PembayaranKamarController::class, 'index']);
Route::get('/perpanjangan-kontrak', [PerpanjanganKontrakController::class, 'index']);
Route::get('/pengunduran-diri', [PengunduranDiriController::class, 'index']);
