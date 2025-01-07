$(document).ready(function() {
    var calendarEl = document.getElementById('div-fullcalendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridDay',
        fixedWeekCount: false,
        dayHeaders: false,
        height: '100%',
        locale: 'it',
        firstDay: 1,
        showNonCurrentDates: false,
        headerToolbar: false,
        titleFormat: {
            month: 'long',
            year: 'numeric',
            day: 'numeric',
            weekday: 'long'
        }
    });

    $("#selectedDay").html(calendar.view.title);
    calendar.render();
    calendar.updateSize();

    $(window).resize(function() {
        calendar.updateSize();
    });

    $("#radio-1").click(function() {
        calendar.changeView('timeGridDay');
        calendar.setOption('dayHeaders', false);
        $("#selectedDay").html(calendar.view.title);
    });

    $("#radio-2").click(function() {
        calendar.changeView('dayGridWeek');
        calendar.setOption('dayHeaders', true);
        $("#selectedDay").html(calendar.view.title);
    });

    $("#radio-3").click(function() {
        calendar.changeView('dayGridMonth');
        calendar.setOption('dayHeaders', true);
        $("#selectedDay").html(calendar.view.title);
    });

    //arretrare di 1 giorno
    $(".day-selector-leftarrow").click(function() {
        calendar.prev();
        $("#selectedDay").html(calendar.view.title);
    });

    //avanzare di 1 giorno
    $(".day-selector-rightarrow").click(function() {
        calendar.next();
        $("#selectedDay").html(calendar.view.title);
    });
});