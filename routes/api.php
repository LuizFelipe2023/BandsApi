<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BandController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthController; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('genres', GenreController::class);
    Route::apiResource('bands', BandController::class);
    Route::apiResource('members', MemberController::class);
    Route::apiResource('albums', AlbumController::class);
});