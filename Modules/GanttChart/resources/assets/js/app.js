import '/node_modules/frappe-gantt/dist/frappe-gantt.umd.js';
import '/node_modules/frappe-gantt/dist/frappe-gantt.css';

document.addEventListener('DOMContentLoaded', () => {
    // Example tasks for the Gantt chart
    const tasks = [
        {
            id: '1',
            name: 'Task 1',
            start: '2025-03-01',
            end: '2025-03-15',
            progress: 30
        },
        {
            id: '2',
            name: 'Task 2',
            start: '2025-03-08',
            end: '2025-03-20',
            progress: 50,
            dependencies: '1'
        },
        {
            id: '3',
            name: 'Task 3',
            start: '2025-03-09',
            end: '2025-03-25',
            progress: 70,
            dependencies: '2',
        }
    ];

    const options = {
        view_mode: "Day",
        date_format: "YYYY-MM-DD",
        custom_popup_html: null,
        /* task => `
            <div class="custom-popup">
                <h5>${task.name}</h5>
                <p>Progress: ${task.progress}%</p>
            </div> */
        bar_height: 20, // default: 20
        padding: 18, // default: 18
        column_width: 30, // default: 30
        step: 24, // default: 24 (in hours)
        header_height: 50, // default: 50
        language: "en",
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
        // Make sure Gantt is defined and create the chart
        if (typeof Gantt !== 'undefined') {
            const gantt = new Gantt("#gantt", tasks, options);
            console.log('Gantt chart created successfully');
        } else {
            console.error('Gantt is not defined. Make sure the library is loaded correctly.');
        }
    } catch (error) {
        console.error('Error creating Gantt chart:', error);
    }

    gantt.on("click", (task) => {
        console.log("Task clicked:", task);
    });
});
