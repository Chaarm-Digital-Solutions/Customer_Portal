document.addEventListener('DOMContentLoaded', function() {
    const grid = GridStack.init({
        // Gridstack configuration
        cellHeight: 80,
        margin: 10,
        float: true
    });

    // Add event listeners for widget interactions
    grid.on('change', function(event, items) {
        // Send updated layout to backend
        fetch('/widget-dashboard/save-layout', {
            method: 'POST',
            body: JSON.stringify(items)
        });
    });
});