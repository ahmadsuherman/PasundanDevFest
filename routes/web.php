<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\BackPage\AccountController;
use App\http\Controllers\BackPage\CategoryController;
use App\http\Controllers\BackPage\MemberController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('logout', function(){
    return redirect('/');
});


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

    Route::get('members', [MemberController::class, 'index'])->name('members.index');
    Route::get('members/create', [MemberController::class, 'create'])->name('members.create');
    Route::get('members/{username}/edit', [MemberController::class, 'edit'])->name('members.edit');
    Route::patch('members/{username}/edit', [MemberController::class, 'update'])->name('members.update');
    Route::get('members/{username}', [MemberController::class, 'show'])->name('members.show');

});
