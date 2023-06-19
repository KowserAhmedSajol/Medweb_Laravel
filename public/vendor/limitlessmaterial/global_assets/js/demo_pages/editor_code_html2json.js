

var Ace = function() {


    // Ace editor
    var _componentAce = function() {
        if (typeof ace == 'undefined') {
            console.warn('Warning - ace.js is not loaded.');
            return;
        }

         // HTML editor
        var html_editor = ace.edit('html_editor');
            html_editor.setTheme('ace/theme/monokai');
            html_editor.getSession().setMode('ace/mode/html');
            html_editor.setShowPrintMargin(false);
            

        // JSON editor
        var json_editor = ace.edit('json_editor');
            json_editor.setTheme('ace/theme/monokai');
            json_editor.getSession().setMode('ace/mode/json');
            json_editor.setShowPrintMargin(false);

       
    };


    //
    // Return objects assigned to module
    //

    return {
        init: function() {
            _componentAce();
        }
    }
}();



document.addEventListener('DOMContentLoaded', function() {
    Ace.init();
   
});