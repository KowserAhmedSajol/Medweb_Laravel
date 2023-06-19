
var DragAndDrop = function() {


    // Dragula examples
    var _componentDragula = function() {
        if (typeof dragula == 'undefined') {
            console.warn('Warning - dragula.min.js is not loaded.');
            return;
        }

        // Draggable cards
        dragula([document.getElementById('cards-target-left'), document.getElementById('cards-target-right')]);

        // Draggable forms
        dragula([document.getElementById('forms-target-left'), document.getElementById('forms-target-right')]);


        
    };

    return {
        init: function() {
            _componentDragula();

        }
    }
}();


document.addEventListener('DOMContentLoaded', function() {
    DragAndDrop.init();
});
