<?php

use Illuminate\Support\Facades\Route;
use Modules\GanttChart\App\Http\Controllers\GanttChartController;
use Modules\GanttChart\App\Http\Controllers\TaskController;

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
    Route::get('/ganttchart/{id}', [GanttChartController::class, 'index'])->name('gantt-chart');
    Route::post('/tasks/update-dates', [TaskController::class, 'updateTaskDates'])->name('task.update.dates');
    Route::post('/tasks/update-progress', [TaskController::class, 'updateTaskProgress'])->name('task.update.progress');
    Route::post('/tasks/add-dependency', [TaskController::class, 'addDependency'])->name('task.update.dependency.add');
    Route::post('/tasks/remove-dependency', [TaskController::class, 'removeDependency'])->name('task.update.dependency.remove');
});
