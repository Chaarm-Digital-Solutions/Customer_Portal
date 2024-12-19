<?php

use Illuminate\Support\Facades\Route;
use Modules\Dashboard2\App\Http\Controllers\Dashboard2Controller;

Route::middleware(['web', 'auth'])->group(function() {
    Route::get('/dashboard2', [Dashboard2Controller::class, 'index'])->name('dashboard2.index');
    Route::post('/dashboard2/save-layout', [Dashboard2Controller::class, 'saveLayout'])->name('dashboard2.save-layout');
});
