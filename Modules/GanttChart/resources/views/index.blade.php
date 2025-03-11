@vite([
    'resources/js/app.js',  // Main app.js
    'modules/GanttChart/resources/assets/js/app.js', // Your GanttChart module JS
    'node_modules/frappe-gantt/dist/frappe-gantt.css' // External CSS file
])

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ganttchart::dictionary.main.title') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <svg id="gantt"></svg>
            </div>
            <div id="controls-container">
                <form action="{{ route('task.create') }}" id="add-task" method="POST">
                    @csrf
                    <h2>Add task</h2>
                    <label for="task-name">Task name</label>
                    <input id="task-name" name="task-name" required />
                    <label for="description">Description</label>
                    <input type="text" name="task-description" id="task-description">
                    <label for="start-date">Start date</label>
                    <input
                        type="date"
                        id="start-date"
                        name="start-date"
                        required
                    />
                    <label for="end-date">End date</label>
                    <input
                        type="date"
                        id="end-date"
                        name="end-date"
                        required
                    />
                    <label for="progress">Progress (%)</label>
                    <input
                        type="number"
                        id="progress"
                        name="progress"
                        value="0"
                        step="1"
                        min="0"
                        max="100"
                        required
                    />
                    <input type="submit" value="add">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    // Injecting the tasks data as a global JavaScript variable
    window.tasks = @json($tasks); // This will pass the tasks from the controller to the JavaScript
</script>