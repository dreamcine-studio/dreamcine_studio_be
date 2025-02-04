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
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Tymon\JWTAuth\Facades\JWTAuth;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');


Route::apiResource('/movies', MovieController::class)->only(['index', 'show']);
Route::apiResource('/genres', GenreController::class)->only(['index', 'show']);
Route::apiResource('/studios',StudioController::class)->only(['index', 'show']);
Route::apiResource('/payments',PaymentController::class)->only(['index', 'show']);
Route::apiResource('/schedules',ScheduleController::class)->only(['index', 'show']);
Route::apiResource('/payment_methods',PaymentMethodController::class)->only(['index', 'show']);
Route::apiResource('/schedules', ScheduleController::class)->only(['index', 'show' ]);
Route::apiResource('/seats',SeatController::class)->only(['index', 'show' ]);
Route::apiResource('/schedules', ScheduleController::class)->only(['index', 'show']);

Route::middleware(['auth:api'])->group(function () {
    Route::get('/user', fn(Request $request) => $request->user());

            // Route::apiResource('/genres', GenreController::class);
            // Route::apiResource('/payment_methods',PaymentMethodController::class);
            // Route::apiResource('/studios',StudioController::class);
            Route::apiResource('/bookings', BookingController::class)->only(['index', 'show', 'store']);


            Route::apiResource('/schedules', ScheduleController::class)->only(['store', 'update', 'destroy']);
            Route::apiResource('/bookings', BookingController::class)->only(['index', 'show', 'store']);
            Route::apiResource('/payments', PaymentController::class)->only(['index', 'store']);
            Route::apiResource('/seats', SeatController::class)->only(['store']);



            Route::middleware(['role:admin'])->group(function () {
                Route::apiResource('/seats',SeatController::class)->only(['update', 'destroy']);
                Route::apiResource('/movies', MovieController::class)->only(['store', 'update', 'destroy']);
                Route::apiResource('/payments', PaymentController::class)->only(['update', 'destroy']);
                Route::apiResource('/payment_methods',PaymentMethodController::class)->only(['store', 'update', 'destroy']);
                Route::apiResource('/genres',GenreController::class)->only(['store', 'update', 'destroy']);
                Route::apiResource('/studios',StudioController::class)->only(['store', 'update', 'destroy']);
                Route::apiResource('/schedules', ScheduleController::class)->only(['store', 'update', 'destroy']);
                Route::apiResource('/bookings', BookingController::class)->only(['update', 'destroy']);

            });

});
