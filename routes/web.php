<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Halaman utama langsung ke daftar post
Route::get('/', [PostController::class, 'index'])->name('home');

// Dashboard juga diarahkan ke index post
Route::get('/dashboard', [PostController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Profile (hanya untuk user login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route auth (login, register, logout)
require __DIR__.'/auth.php';

Route::resource('posts', PostController::class);
Route::get('/posts/mine', [PostController::class, 'myPosts'])
    ->name('posts.mine')
    ->middleware('auth');

