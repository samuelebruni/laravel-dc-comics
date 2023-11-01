<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\PageController;
use Illuminate\Support\Facades\Route;


Route::resource('home', PageController::class);
Route::get('/', [PageController::class, 'index'])->name('home');
Route::resource('admin', AdminController::class);
Route::get('/comics', [PageController::class, 'comics'])->name('comics');

Route::get('/about', function () {
    return view('about');
})->name('about');