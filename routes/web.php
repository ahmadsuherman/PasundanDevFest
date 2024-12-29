<?php

use Illuminate\Support\Facades\Route;

use App\http\Controllers\BackPage\AccountController;
use App\http\Controllers\BackPage\CategoryController;
use App\http\Controllers\BackPage\MemberController;
use App\http\Controllers\BackPage\SpeakerController;
use App\http\Controllers\BackPage\EventController;
use App\http\Controllers\BackPage\DashbaordController;

use App\Http\Controllers\FrontPage\HomeController;
use App\Http\Controllers\FrontPage\AboutController;
use App\Http\Controllers\FrontPage\EventsController;
use App\Http\Controllers\FrontPage\RegisterEventController;
use App\Http\Controllers\FrontPage\MembersController;
use App\Http\Controllers\FrontPage\LoginController;
use App\Http\Controllers\FrontPage\RegisterController;
use App\Http\Controllers\FrontPage\SpeakerController as FrontSpeakerController;
use App\Http\Controllers\FrontPage\PaymentsController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/events', [EventsController::class, 'index'])->name('events');
Route::get('/events/{slug}', [EventsController::class, 'showDetailEvents']);
Route::middleware(['auth', 'role:Members'])->group(function () {
    Route::get('/events/{slug}/register', [EventsController::class, 'showRegisterEvent']);
    Route::post('/events/{slug}/register', [PaymentsController::class, 'store'])->name('payments.store');
    Route::post('/events/{slug}/callback', [PaymentsController::class, 'receiveCallback'])->name('midtrans.callback');    
});
Route::get('/members', [MembersController::class, 'showMembers'])->name('members');
Route::get('/speakers', [FrontSpeakerController::class, 'index'])->name('speakers');

Route::middleware(['guest'])->group(function() {
    Route::get('/login', [LoginController::class, 'showLogin']);
    Route::post('/login', [LoginController::class, 'storeLogin'])->name('login');
    Route::get('/register', [RegisterController::class, 'showRegister']);
    Route::post('/register', [RegisterController::class, 'postRegister'])->name('register');
    
    Route::get('login/google', [LoginController::class, 'redirectToGoogle']);
    Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback']);
});

Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::prefix('admin')->middleware(['auth', 'role:Admin'])->group(function () {
    
    Route::get('/dashboard', [DashbaordController::class, 'dashboardAdmin']);

    Route::get('accounts', [AccountController::class, 'index'])->name('accounts.index');
    Route::patch('accounts', [AccountController::class, 'update'])->name('accounts.update');

    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/checkSlug', [CategoryController::class, 'checkSlug']);
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('categories/create', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/{slug}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::patch('categories/{slug}/edit', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/{slug}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('members', [MemberController::class, 'index'])->name('members.index');
    Route::get('members/create', [MemberController::class, 'create'])->name('members.create');
    Route::post('members/create', [MemberController::class, 'store'])->name('members.store');
    Route::get('members/{username}/edit', [MemberController::class, 'edit'])->name('members.edit');
    Route::patch('members/{username}/edit', [MemberController::class, 'update'])->name('members.update');
    Route::get('members/{username}', [MemberController::class, 'show'])->name('members.show');
    Route::delete('members/{username}', [MemberController::class, 'destroy'])->name('members.destroy');

    Route::get('speakers', [SpeakerController::class, 'index'])->name('speakers.index');
    Route::get('speakers/create', [SpeakerController::class, 'create'])->name('speakers.create');
    Route::post('speakers/create', [SpeakerController::class, 'store'])->name('speakers.store');
    Route::get('speakers/{username}/edit', [SpeakerController::class, 'edit'])->name('speakers.edit');
    Route::patch('speakers/{username}/edit', [SpeakerController::class, 'update'])->name('speakers.update');
    Route::get('speakers/{username}', [SpeakerController::class, 'show'])->name('speakers.show');
    Route::delete('speakers/{username}', [SpeakerController::class, 'destroy'])->name('speakers.destroy');
    Route::patch('speakers/{username}/verified', [SpeakerController::class, 'verified'])->name('speakers.verified');

    Route::get('events', [EventController::class, 'index'])->name('events.index');
    Route::get('events/checkSlug', [EventController::class, 'checkSlug']);
    Route::get('events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('events/create', [EventController::class, 'store'])->name('events.store');
    Route::get('events/{slug}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::patch('events/{slug}/edit', [EventController::class, 'update'])->name('events.update');
    Route::get('events/{slug}', [EventController::class, 'show'])->name('events.show');
    Route::delete('events/{slug}', [EventController::class, 'destroy'])->name('events.destroy');
});

Route::prefix('members')->middleware(['auth', 'role:Members'])->group(function () {
    Route::get('/dashboard', [DashbaordController::class, 'dashboardMember']);
});

Route::prefix('speakers')->middleware(['auth', 'role:Speakers'])->group(function () {
    Route::get('/dashboard', [DashbaordController::class, 'dashboardSpeaker']);
});

Route::get('/events/{slug}/export-ticket', [EventsController::class, 'exportPdf'])->name('exports.ticket');
