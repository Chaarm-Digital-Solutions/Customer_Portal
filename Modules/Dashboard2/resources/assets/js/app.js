import { GridStack } from 'gridstack';
import 'gridstack/dist/gridstack.min.css';

document.addEventListener('DOMContentLoaded', function() {
    const grid = GridStack.init({
        column: 12,
        float: true,
        removable: true,
        removeTimeout: 100,
        acceptWidgets: true,
        animate: true
    });

    // Example of saving grid layout
    document.querySelector('.save-grid').addEventListener('click', function() {
        const serializedData = grid.save();
        axios.post('/dashboard2/save-layout', {
            layout: serializedData
        });
    });
});

function removeWidget(button) {
    var widgetElement = button.closest('.grid-stack-item');
    var widget = dashboardGrid.getGridItems().find(item => item === widgetElement);
    dashboardGrid.removeWidget(widget);
}

function saveGridConfig () {

    // Select items present on the grid
    var gridItems = dashboardGrid.engine.nodes;

    // get specific atrributes of those items
    var simplifiedData = gridItems.map(function (item) {
        return {
            x: item.x,
            y: item.y,
            w: item.w,
            h: item.h,
            widgetType: item.widgetType
        };
    });
    var serializedData = JSON.stringify(simplifiedData);

    // Send the serialized configuration to the server
    $.ajax({
        url: "{{ route('dashboard.save') }}",
        type: 'POST',
        data: { 
                _token: '{{ csrf_token() }}',
                user_id: userId,
                user_config: serializedData 
        },
    });
};

// Whenever grid items is manipulated, save the grid state
dashboardGrid.on('change', function(event, items) {
    saveGridConfig();
});

// Save the grid config after an item has been removed
dashboardGrid.on('removed', function(event, items) {
    saveGridConfig();
});