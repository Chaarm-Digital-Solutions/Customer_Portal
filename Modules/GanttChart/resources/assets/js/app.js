import('google-charts').then(({ GoogleCharts }) => {
    GoogleCharts.load(drawChart, { packages: ['gantt'] });
});

function drawChart() {

    // If no tasks are found, throw an error in the console
    if (!window.tasks || window.tasks.length === 0) {
        console.error("No task data available or tasks are empty.");
        return;
    }

    // For debugging purposes
    console.log("Raw window.tasks:", window.tasks); 

    // Initialise the chart
    const data = new google.visualization.DataTable();
    data.addColumn('string', 'Task ID');
    data.addColumn('string', 'Task Name');
    data.addColumn('date', 'Start Date');
    data.addColumn('date', 'End Date');
    data.addColumn('number', 'Duration');
    data.addColumn('number', 'Percent Complete');
    data.addColumn('string', 'Dependencies');

    // Format the data to be displayed in the chart
    const formattedTasks = window.tasks.map(task => {

        // Convert "YYYY-MM-DD HH:MM:SS" to Datetime
        const startDate = new Date(task.start.replace(" ", "T")); // Fixes parsing
        const endDate = new Date(task.end.replace(" ", "T"));

        const duration = endDate - startDate; // Calculate duration in milliseconds

        return [
            task.id.toString(),  // Task ID (string)
            task.name,           // Task Name (string)
            startDate,           // Start Date (Date object)
            endDate,             // End Date (Date object)
            duration,            // Duration in milliseconds
            task.progress || 0,  // Percent Complete (integer)
            task.dependencies || null  // Dependencies (string of either IDs or task names, comma delimited)
        ];
    }).filter(Boolean); // Remove null entries

    // For debugging purposes
    console.log("Formatted Data:", formattedTasks);

    // Add data to the chart
    data.addRows(formattedTasks);

    // Options object, refer to the API documentation as for what's available
    const options = { height: 275 };

    // Insert the chart to the specified div and draw it
    const chart = new google.visualization.Gantt(document.getElementById('gantt'));
    chart.draw(data, options);
}
