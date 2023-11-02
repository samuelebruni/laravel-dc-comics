<?php

use App\Http\Controllers\Admin\ComicController;
use App\Http\Controllers\Guests\PageController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/comics', [PageController::class, 'comics'])->name('comics');
Route::get('/about', [PageController::class, 'about'])->name('about');


Route::resource('admin/comics', ComicController::class);