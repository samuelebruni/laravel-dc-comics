<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\PageController;

Route::get('/', function () {
    return view('welcome');
});
