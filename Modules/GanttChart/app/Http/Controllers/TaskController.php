<?php

namespace Modules\GanttChart\App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\GanttChart\app\Models\Task;

class TaskController extends Controller
{
    public static function getTasksByProject($project_id): Collection 
    {
        return Task::where('project', $project_id)->get();
    }

    public function updateTaskDates(Request $request): JsonResponse
    {
        $task = Task::findOrFail($request->task_id);
        $task->start = $request->start;
        $task->end = $request->end;
        $task->save();

        return response()->json($task);
    }

    public function updateTaskProgress(Request $request): JsonResponse
    {
        $task = Task::findOrFail($request->task_id);
        $task->progress = $request->progress;
        $task->save();

        return response()->json($task);
    }

    public function addDependency(Request $request): JsonResponse
    {
        $task = Task::findOrFail($request->task_id);

        if (str_contains($task->dependencies, $request->dependency . ', ')) {
            return response()->json('Dependency already exists');
        } else {
            $task->dependencies = $task->dependencies . $request->dependency . ', ';
            $task->save();

            return response()->json($task);
        }
    }

    public function removeDependency(Request $request): JsonResponse
    {
        $task = Task::findOrFail($request->task_id);

        if (str_contains($task->dependencies, $request->dependency . ', ')) {
            $task->dependencies = str_replace($request->dependency . ', ', '', $task->dependencies);
            $task->save();

            return response()->json($task);
        } else {
            return response()->json('Dependency does not exist');
        }
    }
}