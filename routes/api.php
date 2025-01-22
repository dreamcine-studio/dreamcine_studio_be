<?php

use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\PaymentMethodController;
use App\Http\Controllers\Api\SeatController;
use App\Http\Controllers\Api\StudioController;
use App\Http\Controllers\Api\ScheduleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/genres', GenreController::class);
Route::apiResource('/payment_methods',PaymentMethodController::class);
Route::apiResource('/studios',StudioController::class);
Route::apiResource('/seats',SeatController::class);
Route::apiResource('/movies', MovieController::class);
Route::apiResource('/schedules', ScheduleController::class);
Route::apiResource('/payments', PaymentController::class);
