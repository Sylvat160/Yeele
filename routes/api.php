<?php

use App\Http\Controllers\API\HomeController;
use Illuminate\Support\Facades\Route;

Route::post('auth', [App\Http\Controllers\API\AuthController::class, 'authenticate']);

Route::middleware('auth:sanctum')->group(function() {
    Route::get('events', [HomeController::class, 'events']);
    Route::get('event_participants/{eventId}', [HomeController::class, 'eventParticipants']);
    Route::post('set_attendance', [HomeController::class, 'setAttendance']);
});
