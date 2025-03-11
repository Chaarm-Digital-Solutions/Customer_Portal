import '/node_modules/frappe-gantt/dist/frappe-gantt.umd.js';
import '/node_modules/frappe-gantt/dist/frappe-gantt.css';

document.addEventListener('DOMContentLoaded', () => {
    // Make sure tasks are passed correctly from PHP to JS using @json
    const tasks = window.tasks.map(task => {
        return {
            id: task.id,
            name: task.name,
            start: task.start,  // Ensure the model has start_date
            end: task.end,      // Ensure the model has end_date
            progress: task.progress, // Ensure the model has progress
            dependencies: task.dependencies || [], // Handle dependencies
        };
    });

    console.log(tasks); // Check the output of tasks for debugging

    const options = {
        infinite_padding: true,
        view_mode_select: true,
        on_click: (task) => {
            console.log("Task clicked:", task);
        },
        on_date_change: (task, start, end) => {
            console.log(`Task ${task.name} changed dates: ${start} to ${end}`);
        },
        on_progress_change: (task, progress) => {
            console.log(`Task ${task.name} progress changed to: ${progress}`);
        },
        on_dependency_create: (task1, task2) => {
            console.log(`Dependency created between ${task1.name} and ${task2.name}`);
        },
        on_dependency_remove: (task1, task2) => {
            console.log(`Dependency removed between ${task1.name} and ${task2.name}`);
        },
        on_task_create: (task) => {
            console.log(`Task created: ${task.name}`);
        },
        on_task_delete: (task) => {
            console.log(`Task deleted: ${task.name}`);
        },
        on_view_change: (viewMode) => {
            console.log(`View mode changed to: ${viewMode}`);
        },
        on_zoom_out: () => {
            console.log("Zoomed out");
        }
    };

    try {
        if (typeof Gantt !== 'undefined') {
            const gantt = new Gantt("#gantt", tasks, options);
            console.log('Gantt chart created successfully');
        } else {
            console.error('Gantt is not defined. Make sure the library is loaded correctly.');
        }
    } catch (error) {
        console.error('Error creating Gantt chart:', error);
    }
});
