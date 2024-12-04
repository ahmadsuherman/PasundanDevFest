<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontPage\HomeController;

use App\http\Controllers\BackPage\AccountController;
use App\http\Controllers\BackPage\CategoryController;

Route::post('logout', function(){
    return redirect('/');
});

Route::get('/', [HomeController::class, 'index']);

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function(){
        return view('back-page.dashboard', ['title' => 'Dashboard']);
    });

    Route::get('accounts', [AccountController::class, 'index'])->name('accounts.index');
    Route::patch('accounts', [AccountController::class, 'update'])->name('accounts.update');

    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/checkSlug', [CategoryController::class, 'checkSlug']);
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('categories/create', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/{slug}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::patch('categories/{slug}/edit', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/{slug}', [CategoryController::class, 'destroy'])->name('categories.destroy');

});
