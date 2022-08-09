<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('auth', [App\Http\Controllers\API\AuthController::class, 'authenticate']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
