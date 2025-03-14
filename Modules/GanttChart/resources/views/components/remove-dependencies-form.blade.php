@props(['tasks'])

<div id="controls-container" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md md:w-1/4">
    <form action="{{ route('task.dependency.remove') }}" id="add-task" method="POST" class="space-y-4">
        @csrf
        <h2 class="text-xl font-semibold text-gray-800">Remove dependency</h2>

        <!-- Task Name -->
        <div>
            <label for="task_id" class="block text-sm font-medium text-gray-700">Make this task...</label>
            <select name="task_id" id="remove-dependency-task-name">
                @foreach ($tasks as $task)
                    <option value="{{ $task->id }}">
                        {{ $task->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Description -->
        <div>
            <label for="task_dependency" class="block text-sm font-medium text-gray-700">...independent from this one:</label>
            <select name="task_dependency" id="remove-dependent-task-name">
            </select>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit"
                class="w-full bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Confirm
            </button>
        </div>
    </form>
</div>