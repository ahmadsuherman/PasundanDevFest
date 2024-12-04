<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\BackPage\AccountController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function(){
        return view('back-page.dashboard', ['title' => 'Dashboard']);
    });

    Route::get('accounts', [AccountController::class, 'index'])->name('accounts.index');
    Route::patch('accounts', [AccountController::class, 'update'])->name('accounts.update');
});
