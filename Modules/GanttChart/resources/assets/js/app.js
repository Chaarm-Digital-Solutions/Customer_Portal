import '/node_modules/frappe-gantt/dist/frappe-gantt.umd.js';
import '/node_modules/frappe-gantt/dist/frappe-gantt.css';

document.addEventListener('DOMContentLoaded', () => {
    const tasks = window.tasks.map(task => ({
        id: task.id,
        name: task.name,
        description: task.description,
        start: task.start,
        end: task.end,
        progress: task.progress,
        dependencies: task.dependencies || [],
    }));

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
        return d.toISOString().slice(0, 19).replace('T', ' ');
    };

    // Store pending updates
    let pendingUpdates = {};
    let updateTimeout = null;

    // Function to process all pending updates in one batch
    const processPendingUpdates = () => {
        if (Object.keys(pendingUpdates).length === 0) return; // No updates to process

        // Convert pending updates to an array
        const updatesArray = Object.values(pendingUpdates);
        pendingUpdates = {}; // Reset queue after collecting updates

        // Send the batch update request
        fetch(`/tasks/update-dates-batch`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({ tasks: updatesArray }), // Send all updates at once
        })
        .then(response => response.json())
        .catch(error => {
            console.error('Error updating tasks:', error);
        });
    };

    // Debounced update function
    const debouncedUpdate = (task, start, end) => {
        pendingUpdates[task.id] = {
            task_id: task.id,
            start: formatDate(start),
            end: formatDate(end),
        };

        // Clear any previous timeout and set a new one
        clearTimeout(updateTimeout);
        updateTimeout = setTimeout(processPendingUpdates, 1000); // Wait 1s before processing
    };

    // Gantt options
    const options = {
        infinite_padding: true,
        view_mode_select: true,
        on_date_change: (task, start, end) => {
            debouncedUpdate(task, start, end); // Store the latest change and delay sending
        },
        on_progress_change: debounce((task, progress) => {
            console.log(`Task ${task.name} progress changed to: ${progress}`);
            fetch(`/tasks/update-progress`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({ task_id: task.id, progress: progress }),
            })
            .then(response => response.json())
            .then(updatedTask => {
                console.log('Task updated successfully:', updatedTask);
            })
            .catch(error => {
                console.error('Error updating task progress:', error);
            });
        }, 1000), // Delay of 1000ms for progress change
    };

    // Initialize the Gantt chart
    try {
        if (typeof Gantt !== 'undefined') {
            new Gantt("#gantt", tasks, options);
            console.log('Gantt chart created successfully');
        } else {
            console.error('Gantt is not defined. Make sure the library is loaded correctly.');
        }
    } catch (error) {
        console.error('Error creating Gantt chart:', error);
    }
});