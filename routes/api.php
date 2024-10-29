<?php

use App\Http\Controllers\PemesananKamarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->get('/example', function () {
    return response()->json(['message' => 'API route is working']);
});

Route::post('/midtrans-callback', [PemesananKamarController::class, 'callback']);
