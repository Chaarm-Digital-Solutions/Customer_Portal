<?php

use Illuminate\Support\Facades\Route;
use Modules\Dashboard2\Http\Controllers\Dashboard2Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([], function () {
    Route::resource('dashboard2', Dashboard2Controller::class)->names('dashboard2');
});
