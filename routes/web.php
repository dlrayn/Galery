<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login/authenticate', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Routes for admin only
//Route::resource('categories', CategoryController::class);
//Route::resource('gallery', GalleryController::class);
//Route::resource('profile', ProfileController::class);

// ... imports tetap sama ...

Route::get('/', [HomeController::class, 'index'])->name('home');

// Autentikasi
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Grup route yang memerlukan autentikasi
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    
    // Profile
    Route::resource('profile', ProfileController::class);
    
    // Kategori
    Route::resource('kategori', KategoriController::class);
    
    // Galeri
    Route::resource('galery', GaleryController::class);
    
    // Foto
    Route::resource('foto', FotoController::class);
    
    // Posts (perbaiki nama route menjadi singular)
    Route::resource('post', PostController::class);
    
    // Petugas
    Route::resource('petugas', PetugasController::class);
});

// Route publik untuk menampilkan konten
Route::get('/kategori/{id}/show', [KategoriController::class, 'show'])->name('kategori.show');
Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');
Route::get('/galery/{id}', [GaleryController::class, 'show'])->name('galery.show');

// Rute untuk menampilkan profil sekolah
Route::resource('profile', ProfileController::class);
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/{profile}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{profile}', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile/{profile}', [ProfileController::class, 'destroy'])->name('profile.destroy');

// Rute untuk menampilkan kategori
Route::resource('kategori', KategoriController::class);
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
Route::get('/kategori/{id}/show', [KategoriController::class, 'show'])->name('kategori.show');

// Rute untuk menampilkan Galery
Route::resource('galery', GaleryController::class);
Route::get('/galery', [GaleryController::class, 'index'])->name('galery.index');
Route::get('/galery/{galery}/edit', [GaleryController::class, 'edit'])->name('galery.edit');
Route::put('/galery/{galery}/update', [GaleryController::class, 'update'])->name('galery.update');

// Rute untuk menampilkan Foto
Route::resource('foto', FotoController::class);
Route::get('/foto', [FotoController::class, 'index'])->name('foto.index');
Route::get('/foto/{foto}/edit', [FotoController::class, 'edit'])->name('foto.edit');
Route::put('/foto/{foto}/update', [FotoController::class, 'update'])->name('foto.update');

// Rute untuk menampilkan Post
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

// Rute untuk menampilkan Management Petugas
Route::resource('petugas', PetugasController::class);
Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas.index');
Route::get('/petugas/{petugas}/edit', [PetugasController::class, 'edit'])->name('petugas.edit');    
Route::put('/petugas/{petugas}/update', [PetugasController::class, 'update'])->name('petugas.update');
Route::delete('/petugas/{petugas}', [PetugasController::class, 'destroy'])->name('petugas.destroy');

Route::get('/programs/detail', function () {
    return view('programs.detail');
})->name('programs.detail');


Route::get('/storage/{path}', function($path) {
    $path = storage_path('app/public/' . $path);
    
    if (!File::exists($path)) {
        return response()->json(['error' => 'File not found'], 404);
    }
    
    $file = File::get($path);
    $type = File::mimeType($path);
    
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    $response->header("Access-Control-Allow-Origin", "*");
    $response->header("Cache-Control", "public, max-age=31536000");
    
    return $response;
})->where('path', '.*');