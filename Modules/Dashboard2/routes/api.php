<?php

use Illuminate\Support\Facades\Route;
use Modules\Dashboard2\App\Http\Controllers\Dashboard2Controller;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
*/

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('dashboard2', Dashboard2Controller::class)->names('dashboard2');
});
