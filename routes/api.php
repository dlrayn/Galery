<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PetugasController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\GaleryController;
use App\Http\Controllers\Api\FotoController;
use App\Http\Controllers\Api\ApiController;

Route::post('/login', [LoginController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::get('/galery', [GaleryController::class, 'index']);
    Route::post('/galery', [GaleryController::class, 'store']);
    Route::get('/galery/{id}', [GaleryController::class, 'show']);
    Route::put('/galery/{id}', [GaleryController::class, 'update']);
    Route::delete('/galery/{id}', [GaleryController::class, 'destroy']);
});
Route::get('/login-test', function () {
    return view('auth.login-test');
});

Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/galery', [GaleryController::class, 'index']);
Route::get('/foto', [FotoController::class, 'index']);
Route::get('/posts/{post}/gallery', [PostController::class, 'getGallery']);

Route::prefix('profile')->group(function () {
    Route::get('/', [ProfileController::class, 'index']);
    Route::post('/', [ProfileController::class, 'store']);
    Route::get('/{id}', [ProfileController::class, 'show']);
    Route::put('/{id}', [ProfileController::class, 'update']);
    Route::delete('/{id}', [ProfileController::class, 'destroy']);
});

Route::prefix('v1')->group(function () {
    Route::get('/profiles', [ApiController::class, 'getProfiles']);
    Route::get('/kategoris', [ApiController::class, 'getKategoris']);
    Route::get('/posts', [ApiController::class, 'getPosts']);
    Route::get('/galeries', [ApiController::class, 'getGaleries']);
    Route::get('/fotos', [ApiController::class, 'getFotos']);
    Route::get('/all', [ApiController::class, 'getAllData']);
});
