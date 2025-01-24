<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\PaymentMethodController;
use App\Http\Controllers\Api\SeatController;
use App\Http\Controllers\Api\StudioController;
use App\Http\Controllers\Api\ScheduleController;
use App\Http\Controllers\Api\BookingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Tymon\JWTAuth\Facades\JWTAuth;


Route::apiResource('/genres', GenreController::class);
Route::apiResource('/payment_methods',PaymentMethodController::class);
Route::apiResource('/studios',StudioController::class);
Route::apiResource('/seats',SeatController::class);
Route::apiResource('/movies', MovieController::class);
Route::apiResource('/schedules', ScheduleController::class);
Route::apiResource('/payments', PaymentController::class);
Route::apiResource('/booking', BookingController::class);
