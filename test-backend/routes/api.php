<?php

use App\Http\Controllers\Api\ArtikelController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\SamarindaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/register', RegisterController::class)->name('register');
Route::post('/login', LoginController::class)->name('login');
Route::apiResource('profile', ProfileController::class);
Route::apiResource('artikels', ArtikelController::class);
Route::get('/berita-luar', [SamarindaController::class, 'semuaBerita']);
Route::get('/berita-luar/{id}', [SamarindaController::class, 'detailBerita']);