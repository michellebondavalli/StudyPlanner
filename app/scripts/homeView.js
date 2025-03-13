var orarioJSONdownload = '';
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

                    jsonToOrario(e.target.result);
                    
                    // Puoi anche utilizzare jsonData come desideri
                    console.log(e.target.result);
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
});

function orarioHTTPRequest() {
    let RequestAJAX = new XMLHttpRequest();

    RequestAJAX.onload = function() {
        jsonToOrario(this.responseText);
    }
    
    RequestAJAX.open("GET", "scripts/getOrario.php");
    RequestAJAX.send();
}

function jsonToOrario(jsonText) {
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
            $(this).css("background-color", "none");
            $(this).html("");
        }
    });
}

function orarioDELETE(ora, giorno) {
    let RequestAJAX = new XMLHttpRequest();
    console.log("scripts/deleteOrario.php?giorno=" + giorno + "&ora=" + ora);
    
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

function importaOrario(){
    
}