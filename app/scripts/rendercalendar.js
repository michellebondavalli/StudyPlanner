$(document).ready(function() {
    impegniRequest();

    var calendarEl = document.getElementById('div-fullcalendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridDay',
        fixedWeekCount: false,
        dayHeaders: false,
        allDaySlot: false,
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

    calendar.render();

    $("#selectedDay").html(calendar.view.title);

    $("#sidebar-impegni").click(function() {
        setTimeout(function() { calendar.render(); }, 10);
    });

    $(".tabs input").click(function() {
        calendar.today();
    });

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

    /*caricamento impegni nel calendario*/

    $('ul li').click(function() {
        if($(this).attr('id') == 'sidebar-impegni') {
            impegniRequest();
        }
    });

    function impegniRequest() {
        let RequestAJAX = new XMLHttpRequest();
    
        RequestAJAX.onload = function() {
            let impegniJSON = JSON.parse(this.responseText);
    
            calendar.removeAllEvents();
    
            const colorsInverted = {
                "--bianco": "#fffcf8",
                "--azzurro-hover": "#d6e8f7",
                "--azzurro-sfondo": "#98bee2",
                "--azzurro-sfondo-form": "#d6e8f7",
                "--blu-icona-hover": "#185ee0",
                "--blu-ombra-item": "#185ee04d",
                "--verde-acqua": "#98e2e0",
                "--rosino": "#f5a9b4",
                "--verdino": "#bde0b9",
                "--lilla": "#ddb4e1",
                "--albicocca": "#f2a252",
                "--giallino": "#ffdb63",
                "--corallo": "#dd4d4a"
            };
    
            impegniJSON.forEach(evento => {
                calendar.addEvent({
                    title: evento.nome,
                    description: evento.descrizione,
                    backgroundColor: colorsInverted[evento.colore],
                    start: evento.dataImpegno + "T" + evento.oraInizio,
                    end: evento.dataImpegno + "T" + evento.oraFine
                });
            });
    
        }
        
        RequestAJAX.open("GET", "scripts/getImpegni.php");
        RequestAJAX.send();
    }
});