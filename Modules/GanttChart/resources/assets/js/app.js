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

    // Create a debounce function
    function debounce(func, delay) {
        let timeoutId;
        return function(...args) {
            clearTimeout(timeoutId);
            timeoutId = setTimeout(() => {
                func(...args);
            }, delay);
        };
    }

    const formatDate = (date) => {
        const d = new Date(date);
        return d.toISOString().slice(0, 19).replace('T', ' '); // Remove 'Z' and get 'YYYY-MM-DD HH:MM:SS'
    };

    const options = {
        infinite_padding: true,
        view_mode_select: true,
        on_click: (task) => {
            // console.log("Task clicked:", task);
        },
        on_date_change: 
        // debounce(
            (task, start, end) => {
            console.log(`Task ${task.name} changed dates: ${start} to ${end}`);
            fetch(`/tasks/update-dates`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({
                    task_id: task.id,
                    start: formatDate(start),
                    end: formatDate(end) 
                }),
            })
            .then(response => response.json())
            .then(updatedTask => {
                console.log('Task updated successfully:', updatedTask);
                // Update local task data if necessary
            })
            .catch(error => {
                console.error('Error updating task dates:', error);
            });
        }, 
        // 1000), // Delay of 1000ms for date change
        on_progress_change: debounce((task, progress) => {
            console.log(`Task ${task.name} progress changed to: ${progress}`);
            fetch(`/tasks/update-progress`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({
                    task_id: task.id,
                    progress: progress
                }),
            })
            .then(response => response.json())
            .then(updatedTask => {
                console.log('Task updated successfully:', updatedTask);
                // Update local task data if necessary
            })
            .catch(error => {
                console.error('Error updating task progress:', error);
            });
        }, 1000), // Delay of 1000ms for progress change
        on_dependency_create: (task1, task2) => {
            console.log(`Dependency created between ${task1.name} and ${task2.name}`);
            fetch(`/tasks/add-dependency`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({
                    task_id: task1.id,
                    dependency: task2.id
                }),
            })
            .then(response => response.json())
            .then(updatedTask => {
                console.log('Dependency added successfully:', updatedTask);
                // Update local task data if necessary
            })
            .catch(error => {
                console.error('Error creating dependency:', error);
            });
        },
        on_dependency_remove: (task1, task2) => {
            console.log(`Dependency removed between ${task1.name} and ${task2.name}`);
            fetch(`/tasks/remove-dependency`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({
                    task_id: task1.id,
                    dependency: task2.id
                }),
            })
            .then(response => response.json())
            .then(updatedTask => {
                console.log('Dependency removed successfully:', updatedTask);
                // Update local task data if necessary
            })
            .catch(error => {
                console.error('Error removing dependency:', error);
            });
        },
        on_task_create: (task) => {
            console.log(`Task created: ${task.name}`);
        },
        on_task_delete: (task) => {
            console.log(`Task deleted: ${task.name}`);
        },
        on_view_change: (viewMode) => {
            // console.log(`View mode changed to: ${viewMode}`);
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