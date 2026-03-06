<?php

use App\Http\Controllers\BlogDisplayPageController;
use App\Http\Controllers\BlogHomePageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogHomePageController::class, 'index'])->name('blog.index');;
Route::get('/blog/{slug}', [BlogDisplayPageController::class, 'show'])->name('blog.show');
