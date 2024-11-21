<?php

use App\Http\Controllers\BillingTransactionController;
use App\Http\Controllers\GanttChartController;
use App\Http\Controllers\ReadController;
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

    Route::get('/bills', [BillingTransactionController::class, 'viewBills'])->name('bills');
    Route::get('/payments', [BillingTransactionController::class, 'viewPayments'])->name('payments');
    Route::get('/reads', [ReadController::class, 'view'])->name('reads');
    Route::get('/gantt-chart', [GanttChartController::class, 'view'])->name('gantt_chart');
});
