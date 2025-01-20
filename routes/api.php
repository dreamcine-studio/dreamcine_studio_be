<?php

use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\PaymentMethodController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/genres', GenreController::class);
Route::apiResource('/payment_methods',PaymentMethodController::class);
