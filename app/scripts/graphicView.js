let myChart, ultimoVoto;
graficoVoti();

$(".elemento-lista-materie").click(function () {
    const datiPerGrafico = [];
    $(".elemento-lista-materie.activeSubject").removeClass("activeSubject");
    $(this).addClass("activeSubject");

    graficoVoti();

    let media = Number($(this).find('div.media-materia').html());
    
    let idMateria = $(this).find('span.id-materia').text().trim();
    let nomeMateria = $(this).find('p.nome-materia').text().trim();
    $('#fk_id_materia').val(idMateria);
    $('#materia-nome-obiettivo').html(nomeMateria);
    $('#materia-valore-obiettivo').html($(this).find('div.media-materia').text().trim());
    $('#div-title-materia-voto').html(nomeMateria + '<hr class="hr-calendario">');

    let RequestAJAX = new XMLHttpRequest();
    RequestAJAX.open("GET", "scripts/getVotiMaterie.php?fk_id_materia=" + idMateria);
    RequestAJAX.send();

    RequestAJAX.onload = function() {
        const response = JSON.parse(RequestAJAX.responseText);

        const scrollBar = document.querySelector('#scroll-bar-voti');

        scrollBar.innerHTML = '<div class="filler"></div>';

        response.forEach(verifica => {
            const votoElem = document.createElement('div');
            votoElem.className = 'elemento-lista-voti';
            dataVerifica = formattaData(verifica.dataVerifica);

            votoElem.innerHTML = `
                <span class="id-voto">${verifica.ID}</span>
                <p class="nome-voto">${verifica.nome}</p>
                <div class="voto">${verifica.voto}</div>
                <p class="data-voto">${dataVerifica}</p>
                <div>${verifica.peso}%</div>
            `;

            scrollBar.insertBefore(votoElem, scrollBar.querySelector('.filler'));

            datiPerGrafico.push({
                data: dataVerifica,
                voto: verifica.voto
            });
            
            ultimoVoto = $('.elemento-lista-voti').last().find('.voto').html();
        });

        graficoVoti(datiPerGrafico);

        if(ultimoVoto > media){
            $('#andamento-materia-crescita').html("In crescita");
        } else if(ultimoVoto < media){
            $('#andamento-materia-crescita').html("In decrescita");
        } else {
            $('#andamento-materia-crescita').html("Stabile");
        }
    }
});

$(document).on('click', '.elemento-lista-voti', function () {
    const nome = $(this).find('p.nome-voto').text().trim();
    const data = $(this).find('p.data-voto').text().trim();
    const voto = $(this).find('div.voto').text().trim();
    const peso = $(this).find('div').last().text().trim().replace("%", "");
    const idVoto = $(this).find('span.id-voto').text().trim();

    $(".container-aggiungi-voto").fadeIn(500);
    $(".container-aggiungi-impegno-background").fadeIn(500);
    $("#inputBoxVoto").val(voto);
    $("#inputBoxPeso").val(peso);
    $("#inputBoxDataLezione").val(formattaDataInverse(data));
    $("#inputBoxNomeVoto").val(nome);
    $("#idVoto").val(idVoto);
    $("#aggiungi-voto-button").val("Modifica");
});

$("#elimina-voto-button").click(function() {
    const idVoto = $("#idVoto").val();
    const RequestAJAX = new XMLHttpRequest();
    RequestAJAX.open("GET", "scripts/deleteVoto.php?idVoto=" + idVoto);
    RequestAJAX.send();
    RequestAJAX.onload = function() {
        location.reload();
    }
});

function formattaData(dataISO) {
    const [anno, mese, giorno] = dataISO.split("-");
    return `${giorno}/${mese}/${anno}`;
}

function formattaDataInverse(dataISO) {
    const [giorno, mese, anno] = dataISO.split("/");
    return `${anno}-${mese}-${giorno}`;
}

function graficoVoti(oggettiVoti) {
    if(oggettiVoti){
        const labels = oggettiVoti.map(v => v.data); // array di date
        const arrayVoti = oggettiVoti.map(v => v.voto); // array di voti

        const ctx = document.getElementById('lineChart').getContext('2d');

        if (myChart) {
            myChart.destroy();
        }

        myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Voti',
                    data: arrayVoti,
                    fill: false,
                    borderColor: '#185ee0',
                    tension: 0,
                    pointBackgroundColor: '#185ee0',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: false
                    }
                }
            }
        });
    }
}