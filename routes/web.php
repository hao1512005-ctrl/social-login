<?php

use App\Http\Controllers\Auth\SocialController;

Route::get('/auth/{provider}', [SocialController::class, 'redirect'])->name('auth.redirect');
Route::get('/auth/{provider}/callback', [SocialController::class, 'callback'])->name('auth.callback');

Route::get('/logout', [SocialController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});