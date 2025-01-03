$(document).ready(function() {
    const giorni = ['Domenica', 'Lunedì', 'Martedì', 'Mercoledì', 'Giovedì', 'Venerdì', 'Sabato'];
    const mese = ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'];
    let today = new Date();
    let date = giorni[today.getDay()] + ' ' + today.getDate() + ' ' + mese[today.getMonth()];
    document.getElementById("selectedDay").innerHTML = date;
})