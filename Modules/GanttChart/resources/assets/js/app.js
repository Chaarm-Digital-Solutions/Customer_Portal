import('google-charts').then(({ GoogleCharts }) => {
    GoogleCharts.load(drawChart, { packages: ['gantt'] });
});

function daysToMilliseconds(days) {
    return days * 24 * 60 * 60 * 1000;
}

function drawChart() {
    if (!window.tasks || window.tasks.length === 0) {
        console.error("No task data available");
        return;
    }

    const data = new google.visualization.DataTable();
    data.addColumn('string', 'Task ID');
    data.addColumn('string', 'Task Name');
    data.addColumn('date', 'Start Date');
    data.addColumn('date', 'End Date');
    data.addColumn('number', 'Duration');
    data.addColumn('number', 'Percent Complete');
    data.addColumn('string', 'Dependencies');

    const formattedTasks = window.tasks.map(task => [
        task.id.toString(),           // Task ID (string)
        task.name,                    // Task Name (string)
        task.start_date ? new Date(task.start_date) : null, // Start Date (Date object)
        task.end_date ? new Date(task.end_date) : null,     // End Date (Date object)
        task.duration ? daysToMilliseconds(task.duration) : null, // Duration in milliseconds
        task.percent_complete || 0,   // Percent Complete (number)
        task.dependencies || null     // Dependencies (string)
    ]);

    data.addRows(formattedTasks);

    const options = { height: 275 };
    const chart = new google.visualization.Gantt(document.getElementById('gantt'));
    chart.draw(data, options);
}
