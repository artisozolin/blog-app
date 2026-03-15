<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogDisplayPageController;
use App\Http\Controllers\BlogHomePageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogHomePageController::class, 'index'])->name('blog.index');;
Route::get('/blog/{slug}', [BlogDisplayPageController::class, 'show'])->name('blog.show');
Route::post('/login', [AuthController::class, 'store'])->name('login');
Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth');
Route::put('/posts/{post}', [PostController::class, 'update']);
Route::delete('/posts/{post}', [PostController::class, 'destroy']);
