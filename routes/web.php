<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

// Rute yang memerlukan login (simulasi)
Route::get('/posts', function () {
    session()->flash('message', 'Please login or register to view posts.');
    return redirect()->route('login');
})->name('posts.index');

Route::get('/posts/create', function () {
    session()->flash('message', 'Please login or register to create a post.');
    return redirect()->route('login');
})->name('posts.create');

Route::get('/posts/{id}', function ($id) {
    session()->flash('message', 'Please login or register to view this post.');
    return redirect()->route('login');
})->name('posts.show');

Route::get('/posts/{id}/edit', function ($id) {
    session()->flash('message', 'Please login or register to edit this post.');
    return redirect()->route('login');
})->name('posts.edit');

// Rute dummy untuk posts.destroy (simulasi)
Route::post('/posts/{id}', function ($id) {
    session()->flash('message', 'Please login or register to delete a post.');
    return redirect()->route('login');
})->name('posts.destroy');