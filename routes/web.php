<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/bills', function () {
        return view('bills');
    })->name('bills');

    Route::get('/payments', function () {
        return view('payments');
    })->name('payments');

    Route::get('/reads', function () {
        return view('reads');
    })->name('reads');
});
