<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//register
Route::post('create', [App\Http\Controllers\AuthController::class, 'create']);
Route::post('create', [AuthController::class, 'create']);
//login
Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);


Route::apiResource('posts','App\Http\Controllers\PostController');
// ->middleware('auth:api');


