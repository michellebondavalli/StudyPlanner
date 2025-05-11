let myChart;
graficoVoti();

$(".elemento-lista-materie").click(function () {
    const datiPerGrafico = [];
    $(".elemento-lista-materie.activeSubject").removeClass("activeSubject");
    $(this).addClass("activeSubject");

    graficoVoti();

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
                <p class="nome-voto">${verifica.nome}</p>
                <div class="voto">${verifica.voto}</div>
                <p class="data-voto">${dataVerifica}</p>
            `;

            scrollBar.insertBefore(votoElem, scrollBar.querySelector('.filler'));

            datiPerGrafico.push({
                data: dataVerifica,
                voto: verifica.voto
            });
        });

        graficoVoti(datiPerGrafico);
    }
});

function formattaData(dataISO) {
    const [anno, mese, giorno] = dataISO.split("-");
    return `${giorno}/${mese}/${anno}`;
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