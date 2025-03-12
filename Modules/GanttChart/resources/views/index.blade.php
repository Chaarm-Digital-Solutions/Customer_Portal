@vite([
    'resources/js/app.js',  // Main app.js
    'modules/GanttChart/resources/assets/js/app.js', // Your GanttChart module JS
])

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ganttchart::dictionary.main.title') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" id="gantt">
            </div>
            <div class="mt-4 flex justify-center">
                <div class="flex flex-wrap gap-x-1 w-full">
                    <x-ganttchart::create-task-form />
                    <x-ganttchart::add-dependencies-form />
                    <x-ganttchart::remove-dependencies-form />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    // Injecting the tasks data as a global JavaScript variable
    window.tasks = @json($tasks); // This will pass the tasks from the controller to the JavaScript
    $(document).ready(function () {
        $('.side-header').append(
            `<select>
                <option>Actions</option>
                <option>Create task</option>
                <option>Add relationship</option>
                <option>Remove relationship</option>
            </select>`
        );
    });
</script>