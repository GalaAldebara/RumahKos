<?php

use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\KamarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PemesananKamarController;
use App\Http\Controllers\PembayaranKamarController;
use App\Http\Controllers\PerpanjanganKontrakController;
use App\Http\Controllers\PengunduranDiriController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;

Route::get('/nyoba', function () {
    return view('penghuni/edit');
});

// Route::get('/', function () {
//     return view('login/index2');
// });

Route::get('/register', function () {
    return view('login/index2');
});
Route::get('/dashboard', function () {
    return view('dashboard/index');
});
Route::get('/contract', function () {
    return view('contract/index');
});

Route::get('/kamar', [KamarController::class, 'index']);
Route::get('/kamar/create', [KamarController::class, 'create']);
Route::post('/kamar/create', [KamarController::class, 'store']);
Route::get('/kamar/{id}/edit', [KamarController::class, 'edit']);
Route::put('/kamar/{id}', [KamarController::class, 'update']);
Route::delete('/kamar/{id}', [KamarController::class, 'destroy']);



Route::get('/penghuni', [UserController::class, 'index']);

Route::get('/penghuni/{id}/edit', [UserController::class, 'edit']);
// Route::resource('penghuni', UserController::class);




Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/income', function () {
    return view('income/index');
});

Route::get('/pemesanan-kamar', [PemesananKamarController::class, 'index']);
Route::get('/pembayaran-kamar', [PembayaranKamarController::class, 'index']);
Route::get('/perpanjangan-kontrak', [PerpanjanganKontrakController::class, 'index']);
Route::get('/pengunduran-diri', [PengunduranDiriController::class, 'index']);


Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);
