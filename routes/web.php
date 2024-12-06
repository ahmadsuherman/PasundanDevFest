<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontPage\HomeController;
use App\Http\Controllers\FrontPage\AboutController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);