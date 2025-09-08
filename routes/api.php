<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('auth/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('auth/logout', [AuthController::class, 'logout']);

    Route::get('posts/{id}/applicants', [PostController::class, 'getApplicants']);
    Route::apiResource('posts', PostController::class);
});
