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

    // Initialize the Gantt chart on the element with id 'gantt'
    const gantt = new Gantt('#gantt', tasks);
});