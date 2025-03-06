import 'frappe-gantt';  // Just import the package name as the alias will handle the correct resolution
import 'frappe-gantt/dist/frappe-gantt.css'; // Include the CSS for styling

document.addEventListener('DOMContentLoaded', () => {
    // Example tasks for the Gantt chart
    const tasks = [
        {
            id: '1',
            name: 'Task 1',
            start: '2024-11-01',
            end: '2024-11-10',
            progress: 30
        },
        {
            id: '2',
            name: 'Task 2',
            start: '2024-11-05',
            end: '2024-11-20',
            progress: 50
        }
    ];

    try {
        // Make sure Gantt is defined and create the chart
        if (typeof Gantt !== 'undefined') {
            const gantt = new Gantt("#gantt", tasks);
            console.log('Gantt chart created successfully');
        } else {
            console.error('Gantt is not defined. Make sure the library is loaded correctly.');
        }
    } catch (error) {
        console.error('Error creating Gantt chart:', error);
    }
});
