$(document).ready(function() {
    orarioHTTPRequest();

    $('ul li').click(function() {
        if($(this).attr('id') == 'sidebar-home') {
            orarioHTTPRequest();
        }
    });
    
    $('.elimina-button').click(function() {
        orarioDELETE(oraOrario, giornoOrario);
        $(".container-aggiungi-lezione").fadeOut(500);
        $(".container-aggiungi-impegno-background").fadeOut(500);
        setInterval(function() { orarioHTTPRequest(); }, 500);
    });
});

function orarioHTTPRequest() {
    let RequestAJAX = new XMLHttpRequest();

    RequestAJAX.onload = function() {
        let orarioJSON = JSON.parse(this.responseText);
        const giorniMappa = {
            "Lunedì": 0,
            "Martedì": 1,
            "Mercoledì": 2,
            "Giovedì": 3,
            "Venerdì": 4,
            "Sabato": 5
        };

        let celleModificate = new Set();
        
        for(let i = 0; i < orarioJSON.length; i++){
            let cella = $("tr").eq(orarioJSON[i].ora).find("td").eq(giorniMappa[orarioJSON[i].giorno] + 1);

            let colore = orarioJSON[i].colore;
            cella.css("background-color", "var(" + colore + ")");
            cella.html(orarioJSON[i].nome);

            celleModificate.add(cella[0]);
        }

        // Ora impostiamo le celle non modificate a bianco con contenuto vuoto
        $(".td-orario").each(function() {
            if (!celleModificate.has(this)) {
                $(this).css("background-color", "white");
                $(this).html("");
            }
        });
    }
    
    RequestAJAX.open("GET", "scripts/getOrario.php");
    RequestAJAX.send();
}

function orarioDELETE(ora, giorno) {
    let RequestAJAX = new XMLHttpRequest();
    console.log("scripts/deleteOrario.php?giorno=" + giorno + "&ora=" + ora);
    
    RequestAJAX.open("GET", "scripts/deleteOrario.php?giorno=" + giorno + "&ora=" + ora);
    RequestAJAX.send();
}