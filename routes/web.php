<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontPage\HomeController;

Route::get('/', [HomeController::class, 'index']);