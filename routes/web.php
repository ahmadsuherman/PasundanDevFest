<?php

use Illuminate\Support\Facades\Route;

use App\http\Controllers\BackPage\AccountController;
use App\http\Controllers\BackPage\CategoryController;
use App\http\Controllers\BackPage\MemberController;
use App\http\Controllers\BackPage\SpeakerController;
use App\http\Controllers\BackPage\EventController;

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
    Route::get('members/create', [MemberController::class, 'create'])->name('admin.members.create');
    Route::post('admin/members', [MemberController::class, 'store'])->name('admin.members.store');
    Route::get('members/{username}/edit', [MemberController::class, 'edit'])->name('members.edit');
    Route::patch('members/{username}/edit', [MemberController::class, 'update'])->name('members.update');
    Route::get('members/{username}', [MemberController::class, 'show'])->name('members.show');

    Route::get('speakers', [SpeakerController::class, 'index'])->name('speakers.index');
    Route::get('speakers/create', [SpeakerController::class, 'create'])->name('speakers.create');
    Route::post('speakers/create', [SpeakerController::class, 'store'])->name('speakers.store');
    Route::get('speakers/{username}/edit', [SpeakerController::class, 'edit'])->name('speakers.edit');
    Route::patch('speakers/{username}/edit', [SpeakerController::class, 'update'])->name('speakers.update');
    Route::delete('speakers/{id}', [SpeakerController::class, 'destroy'])->name('speakers.destroy');
    Route::get('speakers/{username}', [SpeakerController::class, 'show'])->name('speakers.show');

    Route::get('events', [EventController::class, 'index'])->name('events.index');
    Route::get('events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('events/create', [EventController::class, 'store'])->name('events.store');
    Route::get('events/{slug}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::patch('events/{slug}/edit', [EventController::class, 'update'])->name('events.update');
    Route::get('events/{username}', [EventController::class, 'show'])->name('events.show');
});

