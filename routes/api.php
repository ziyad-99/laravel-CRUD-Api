<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/all-users', [UserController::class, 'index']);
Route::post('/user-store', [UserController::class, 'store']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::put('/user-update/{id}', [UserController::class, 'update']);
Route::delete('/user-delete/{id}', [UserController::class, 'destroy']);
