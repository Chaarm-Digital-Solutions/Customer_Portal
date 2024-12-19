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