<div id="controls-container" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md md:w-1/4">
    <form action="{{ route('task.create') }}" id="add-task" method="POST" class="space-y-4">
        @csrf
        <h2 class="text-xl font-semibold text-gray-800">Add Task</h2>

        <!-- Task Name -->
        <div>
            <label for="task-name" class="block text-sm font-medium text-gray-700">Task Name</label>
            <input id="task-name" name="task-name" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
        </div>

        <!-- Description -->
        <div>
            <label for="task-description" class="block text-sm font-medium text-gray-700">Description</label>
            <input type="text" name="task-description" id="task-description"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
        </div>

        <!-- Start Date -->
        <div>
            <label for="start-date" class="block text-sm font-medium text-gray-700">Start Date</label>
            <input type="date" id="start-date" name="start-date" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
        </div>

        <!-- End Date -->
        <div>
            <label for="end-date" class="block text-sm font-medium text-gray-700">End Date</label>
            <input type="date" id="end-date" name="end-date" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
        </div>

        <!-- Progress -->
        <div>
            <label for="progress" class="block text-sm font-medium text-gray-700">Progress (%)</label>
            <input type="number" id="progress" name="progress" value="0" step="1" min="0" max="100" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit"
                class="w-full bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Add Task
            </button>
        </div>
    </form>
</div>