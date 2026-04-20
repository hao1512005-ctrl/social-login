<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialController;

Route::get('/auth/{provider}', [SocialController::class, 'redirect'])->name('auth.redirect');

Route::get('/auth/{provider}/callback', [SocialController::class, 'callback'])->name('auth.callback');

Route::get('/logout', [SocialController::class, 'logout'])->name('logout');

Route::get('/', fn() => view('login'));
Route::get('/login', fn() => view('login'));

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'));
});