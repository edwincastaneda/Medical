
// mobile header 

YUI().use('node-base', 'node-event-delegate', function (Y) {
    var menuButton = Y.one('.nav-menu-button'),
        nav = Y.one('#nav');
    // Setting the active class name expands the menu vertically on small screens.
    menuButton.on('click', function (e) {
        nav.toggleClass('active');
    });

    // Your application code goes here...

});


// controles fecha y hora
function dateTimeControls(){ 
    $('#datetimepicker').datetimepicker({
        dayOfWeekStart : 1,
        lang:'es',
        startDate: new Date()
    });
}
