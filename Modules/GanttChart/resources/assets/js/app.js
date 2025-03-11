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
});
