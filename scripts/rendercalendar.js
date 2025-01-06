$(document).ready(function() {
    var calendarEl = document.getElementById('div-fullcalendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridDay',
        height: '100%',
        headerToolbar: false,
        locale: 'it',
        firstDay: 1
    });

    calendar.render();

    $(window).resize(function() {
        calendar.updateSize();
    });

    $("#radio-1").click(function() {
        calendar.changeView('timeGridDay');
    });

    $("#radio-2").click(function() {
        calendar.changeView('dayGridWeek');
    });

    $("#radio-3").click(function() {
        calendar.changeView('dayGridMonth');
    });
});