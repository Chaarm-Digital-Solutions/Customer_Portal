<?php

namespace Modules\GanttChart\App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\GanttChart\app\Models\Task;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function createTask(Request $request): RedirectResponse
    {
        $data = [
            'name' => request('task-name'),
            'description' => request('task-description'),
            'start' => request('start-date'),
            'end' => request('end-date'),
            'progress' => request('progress'),
        ];
        Task::create($data);

        return redirect()->back();
    }

    public function updateDatesBatch(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'tasks' => 'required|array',
            'tasks.*.task_id' => 'required|integer|exists:tasks,id',
            'tasks.*.start' => 'required|date_format:Y-m-d H:i:s',
            'tasks.*.end' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $tasksToUpdate = collect($validated['tasks']);

        try {
            // Use DB transaction for safe updates
            DB::transaction(function () use ($tasksToUpdate) {
                foreach ($tasksToUpdate as $taskData) {
                    Task::where('id', $taskData['task_id'])->update([
                        'start' => $taskData['start'],
                        'end' => $taskData['end'],
                        'updated_at' => now(),
                    ]);
                }
            });

            return response()->json([
                'message' => 'Tasks updated successfully',
                'updated_tasks' => $tasksToUpdate,
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update tasks'], 500);
        }
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