$(document).ready(function() {
    
    $("#add-button-calendario").click(function() {
        $(".container-aggiungi-impegno").fadeIn(500);
        $(".container-aggiungi-impegno-background").fadeIn(500);
    });

    $(".container-aggiungi-impegno-background").click(function() {
        $(".container-aggiungi-impegno").hide();
        $(".container-aggiungi-impegno-background").hide();
    });

    $(".annulla-button").click(function() {
        $(".container-aggiungi-lezione").fadeOut(500);
        $(".container-aggiungi-impegno").fadeOut(500);
        $(".container-aggiungi-impegno-background").fadeOut(500);
        /*
            da aggiungere
        */
    });

    $(".container-aggiungi-impegno-background").click(function() {
        $(".container-aggiungi-lezione").fadeOut(500);
        $(".container-aggiungi-impegno").fadeOut(500);
        $(".container-aggiungi-impegno-background").fadeOut(500);
    });

    $(".td-orario").click(function() {
        $(".container-aggiungi-lezione").fadeIn(500);
        $(".container-aggiungi-impegno-background").fadeIn(500);

        const giorni = {
            "1": "Lunedì",
            "2": "Martedì",
            "3": "Mercoledì",
            "4": "Giovedì",
            "5": "Venerdì",
            "6": "Sabato"
        }

        const giorno = giorni[$(this).index()];
    
        let firstChar = $(this).closest('tr').find('td:first').text().charAt(0);

        $(".aggiungi-lezione-giorno").val(giorno);
        $(".aggiungi-lezione-ora").val(firstChar);

        if($(this).html() != "") {
            $("#aggiungi-lezione-button").val("Modifica");
            $("#inputBoxNomeLezione").val($(this).html());
        } else {
            $("#aggiungi-lezione-button").val("Aggiungi");
            $("#inputBoxNomeLezione").val("");
        }
    });
});