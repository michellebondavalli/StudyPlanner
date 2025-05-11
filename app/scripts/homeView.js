var orarioJSONdownload = '';
$(document).ready(function() {
    orarioHTTPRequest();

    $('ul li').click(function() {
        if($(this).attr('id') == 'sidebar-home') {
            orarioHTTPRequest();
        }
    });
    
    $('#elimina-lezione-button').click(function() {
        orarioDELETE(oraOrario, giornoOrario);
        $(".container-aggiungi-lezione").fadeOut(500);
        $(".container-aggiungi-impegno-background").fadeOut(500);
        setTimeout(orarioHTTPRequest, 300);
    });

    $('#esporta-orario-button').click(function() {
        esportaOrario();
    });

    $('#fileInput').change(function(event) {
        var file = event.target.files[0]; // Ottieni il file caricato

        if (file && file.type === 'application/json') {
            // Crea un oggetto FileReader per leggere il file
            var reader = new FileReader();

            // Quando il file è stato letto con successo
            reader.onload = function(e) {
                try {
                    // Parso il contenuto JSON del file
                    var jsonData = JSON.parse(e.target.result);

                    jsonToOrario(e.target.result, true);
                    

                } catch (error) {
                    alert('Errore nel leggere il file JSON: ' + error.message);
                }
            };

            // Leggi il file come stringa
            reader.readAsText(file);
        } else {
            alert('Per favore carica un file JSON valido.');
        }
    });

    $("#elimina-orario-button").click(function() {
        giorniMappa = {
            0: "Lunedì",
            1: "Martedì",
            2: "Mercoledì",
            3: "Giovedì",
            4: "Venerdì",
            5: "Sabato"
        };

        for(var i = 0; i < 6; i++) {
            for(var j = 0; j < 7; j++) {
                orarioDELETE(j, giorniMappa[i]);
            }
        }
    });
});

function orarioHTTPRequest() {
    let RequestAJAX = new XMLHttpRequest();

    RequestAJAX.onload = function() {
        jsonToOrario(this.responseText, false);
    }
    
    RequestAJAX.open("GET", "scripts/getOrario.php");
    RequestAJAX.send();
}

function jsonToOrario(jsonText, fileImport) {
    let orarioJSON = JSON.parse(jsonText);
    orarioJSONdownload = jsonText;
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

    if(fileImport){
        orarioJSON.forEach(element => {
            let ajaxRequest = new XMLHttpRequest();
            ajaxRequest.open("POST", "scripts/aggiungiLezione.php");
            ajaxRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            ajaxRequest.send("dataLezione=" + element.giorno + "&oraLezione=" + element.ora + "&nomeLezione=" + element.nome + "&color=" + element.colore);
        });
    }
}

function orarioDELETE(ora, giorno) {
    let RequestAJAX = new XMLHttpRequest();
    
    RequestAJAX.open("GET", "scripts/deleteOrario.php?giorno=" + giorno + "&ora=" + ora);
    RequestAJAX.send();
}

function esportaOrario() {
    var blob = new Blob([orarioJSONdownload], { type: 'application/json' });
    var url = URL.createObjectURL(blob);
    var link = document.createElement('a');
    link.href = url;
    link.download = 'orario.json';
    link.click();
    URL.revokeObjectURL(url);
}