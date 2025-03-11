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