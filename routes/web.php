<?php

use App\Http\Controllers\BlogDisplayPageController;
use App\Http\Controllers\BlogHomePageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogHomePageController::class, 'index']);
Route::get('/blog', [BlogDisplayPageController::class, 'index']);
