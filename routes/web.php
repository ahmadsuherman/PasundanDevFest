<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontPage\HomeController;
use App\Http\Controllers\FrontPage\AboutController;
use App\Http\Controllers\FrontPage\EventsController;
use App\Http\Controllers\FrontPage\RegisterEventController;
use App\Http\Controllers\FrontPage\MembersController;

use App\Http\Controllers\FrontPage\LoginController;
use App\Http\Controllers\FrontPage\RegisterController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/events', [EventsController::class, 'showEvents']);
Route::get('/events/{slug}', [EventsController::class, 'showDetailEvents']);
Route::get('/registerevent}', [EventsController::class, 'showRegisterEvent']);
Route::get('/members', [MembersController::class, 'showMembers']);


Route::get('/login', [LoginController::class, 'showLogin']);
Route::get('/register', [RegisterController::class, 'showRegister']);