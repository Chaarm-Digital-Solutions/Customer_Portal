<?php

namespace Modules\GanttChart\App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Modules\GanttChart\app\Models\Task;

class TaskController extends Controller
{
    public static function getTasksByProject($project_id) : Collection {
        return Task::where('project', $project_id)->get();
    }
}
