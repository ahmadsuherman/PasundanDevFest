<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontPage\HomeController;
use App\Http\Controllers\FrontPage\AboutController;

use App\Http\Controllers\FrontPage\LoginController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);

Route::get('/login', [LoginController::class, 'showLogin']);
