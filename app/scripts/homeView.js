$(document).ready(function() {
    orarioHTTPRequest();

    $('ul li').click(function() {
        if($(this).attr('id') == 'sidebar-home') {
            orarioHTTPRequest();
        }
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
        
        for(let i = 0; i < orarioJSON.length; i++){
            let cella = $("tr").eq(orarioJSON[i].ora).find("td").eq(giorniMappa[orarioJSON[i].giorno] + 1);

            let colore = orarioJSON[i].colore;
            cella.css("background-color", "var(" + colore + ")");
            cella.html(orarioJSON[i].nome);
        }
    }
    
    RequestAJAX.open("GET", "scripts/getOrario.php");
    RequestAJAX.send();
}