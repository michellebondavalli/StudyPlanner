var oraOrario = 0;
var giornoOrario = 0;
var sidebarButtonPrecedente = "";

$(document).ready(function() {

    
    $("#add-button-calendario").click(function() {
        $(".container-aggiungi-impegno").fadeIn(500);
        $(".container-aggiungi-impegno-background").fadeIn(500);
        document.querySelector('input[type="submit"]').value = "Aggiungi";
        $("#idImpegno").val(0);
    });



    $(".container-aggiungi-impegno-background").click(function() {
        $(".container-aggiungi-impegno").hide();
        $(".container-aggiungi-materia").hide();
        $(".container-aggiungi-voto").hide();
        $(".container-aggiungi-impegno-background").hide();
    });



    $(".annulla-button").click(function() {
        $(".container-aggiungi-lezione").fadeOut(500);
        $(".container-aggiungi-impegno").fadeOut(500);
        $(".container-aggiungi-materia").fadeOut(500);
        $(".container-aggiungi-voto").fadeOut(500);
        $(".container-aggiungi-impegno-background").fadeOut(500);
        /*
            da aggiungere   add-button-obiettivo
        */
    });


    $(".container-aggiungi-impegno-background").click(function() {
        $(".container-aggiungi-lezione").fadeOut(500);
        $(".container-aggiungi-impegno").fadeOut(500);
        $(".container-aggiungi-materia").fadeOut(500);
        $(".container-aggiungi-voto").fadeOut(500);
        $(".container-aggiungi-impegno-background").fadeOut(500);
    });

    $("#add-button-materia").click(function() {
        $(".container-aggiungi-materia").fadeIn(500);
        $(".container-aggiungi-impegno-background").fadeIn(500);
    });

    $("#add-button-voto").click(function() {
        $(".container-aggiungi-voto").fadeIn(500);
        $(".container-aggiungi-impegno-background").fadeIn(500);
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
        giornoOrario = giorno;
    
        let firstChar = $(this).closest('tr').find('td:first').text().charAt(0);
        oraOrario = firstChar;

        $(".aggiungi-lezione-giorno").val(giorno);
        $(".aggiungi-lezione-ora").val(firstChar);

        if($(this).html() != "") {
            $("#aggiungi-lezione-button").val("Modifica");
            $("#inputBoxNomeLezione").val($(this).html());
            
            let colore = $(this).css("background-color");
            result = colore.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);

            // Converti i valori R, G, B in esadecimale e restituisci la stringa
            var r = parseInt(result[1]).toString(16);
            var g = parseInt(result[2]).toString(16);
            var b = parseInt(result[3]).toString(16);
            let exadecimal = "#" + (r.length == 1 ? "0" + r : r) + (g.length == 1 ? "0" + g : g) + (b.length == 1 ? "0" + b : b);
            
            const colors = {
                "#fffcf8": "bianco",
                "#d6e8f7": "azzurro-hover",
                "#98bee2": "azzurro-sfondo",
                "#d6e8f7": "azzurro-sfondo-form",
                "#185ee0": "blu-icona-hover",
                "#185ee04d": "blu-ombra-item",
                "#98e2e0": "verde-acqua",
                "#f5a9b4": "rosino",
                "#bde0b9": "verdino",
                "#ddb4e1": "lilla",
                "#f2a252": "albicocca",
                "#ffdb63": "giallino",
                "#dd4d4a": "corallo"
            };

            $('.colors-box input[type="radio"][value="--azzurro-sfondo"]').prop('checked', false);
            $('.colors-box input[type="radio"][value="--' + colors[exadecimal] + '"]').prop('checked', true);
        } else {
            $('.colors-box input[type="radio"][value="--azzurro-sfondo"]').prop('checked', true);
            $("#aggiungi-lezione-button").val("Aggiungi");
            $("#inputBoxNomeLezione").val("");
        }
    });

    // ------------------------Bottone "Logout"
    $("#sidebar-logout").click(function() {
        // Mostra l'alert
        $("#alertOverlay").fadeIn();
    });

    // Bottone "Conferma"
    $("#confirmBtn").click(function() {
        $("#alertOverlay").fadeOut();
    });

    // Bottone "Annulla"
    $("#cancelBtn").click(function() {
        $("#alertOverlay").fadeOut();
    });

    // ------------------ Bottone "Elimina Account"
    $("#elimina-account-button").click(function() {
        // Mostra l'alert
        $("#alertOverlay-account").fadeIn();
    });

    // Bottone "Conferma"
    $("#confirmBtn-account").click(function() {
        $("#alertOverlay-account").fadeOut();
    });

    // Bottone "Annulla"
    $("#cancelBtn-account").click(function() {
        $("#alertOverlay-account").fadeOut();
    });
});