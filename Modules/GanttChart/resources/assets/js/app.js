import('google-charts').then(({ GoogleCharts }) => {
    GoogleCharts.load(drawChart, { packages: ['gantt'] });
});

function daysToMilliseconds(days) {
    return days * 24 * 60 * 60 * 1000;
}

function drawChart() {
    if (!window.tasks || window.tasks.length === 0) {
        console.error("No task data available or tasks are empty.");
        return;
    }

    console.log("Raw window.tasks:", window.tasks); // Debugging

    const data = new google.visualization.DataTable();
    data.addColumn('string', 'Task ID');
    data.addColumn('string', 'Task Name');
    data.addColumn('date', 'Start Date');
    data.addColumn('date', 'End Date');
    data.addColumn('number', 'Duration');
    data.addColumn('number', 'Percent Complete');
    data.addColumn('string', 'Dependencies');

    const formattedTasks = window.tasks.map(task => {
        if (!task.start || !task.end) {
            console.warn("Skipping task due to missing dates:", task);
            return null;
        }

        // Convert "YYYY-MM-DD HH:MM:SS" to Date object
        const startDate = new Date(task.start.replace(" ", "T")); // Fixes parsing
        const endDate = new Date(task.end.replace(" ", "T"));

        // Check if parsing was successful
        if (isNaN(startDate) || isNaN(endDate)) {
            console.warn("Invalid date detected, skipping task:", task);
            return null;
        }

        const duration = endDate - startDate; // Calculate duration in milliseconds

        return [
            task.id.toString(),  // Task ID (string)
            task.name,           // Task Name (string)
            startDate,           // Start Date (Date object)
            endDate,             // End Date (Date object)
            duration,            // Duration in milliseconds
            task.progress || 0,  // Percent Complete (number)
            task.dependencies || null  // Dependencies (string)
        ];
    }).filter(Boolean); // Remove null entries

    console.log("Formatted Data:", formattedTasks); // Debugging

    data.addRows(formattedTasks);

    const options = { height: 275 };
    const chart = new google.visualization.Gantt(document.getElementById('gantt'));
    chart.draw(data, options);
}
