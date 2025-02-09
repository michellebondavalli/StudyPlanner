<?php
    session_start();
    require_once("scripts/funzioni.php");
    if(!isset($_SESSION["user"])){
        header("Location: login.php");
        return;
    }
    require_once("pages/intestazione.php");
?>
        <div class="main-content-impegni">
            <div class="main-content-intestazione">
                <div class="calendar-view">
                    <div class="tabs">
                        <input type="radio" id="radio-1" name="tabs" checked="">
                        <label class="tab" for="radio-1">Giorno<!--<span class="notification">2</span>--></label>
                        <input type="radio" id="radio-2" name="tabs">
                        <label class="tab" for="radio-2">Settimana</label>
                        <input type="radio" id="radio-3" name="tabs">
                        <label class="tab" for="radio-3">Mese</label>
                        <span class="glider"></span>
                    </div>
                </div>
                <div class="day-selector">
                    <div class="day-selector-leftarrow">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="var(--blu-icona-hover)"><path d="M400-80 0-480l400-400 71 71-329 329 329 329-71 71Z"/></svg>
                    </div>
                    <div class="day-selector-selectedday">
                        <p id="selectedDay"></p>
                    </div>
                    <div class="day-selector-rightarrow">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="var(--blu-icona-hover)"><path d="m321-80-71-71 329-329-329-329 71-71 400 400L321-80Z"/></svg>
                    </div>
                </div>
            </div>
            <div class="main-content-calendario">
                <div class="main-content-calendario-fullcalendar">
                    <div class="div-title">
                        Calendario
                        <hr class="hr-calendario">
                    </div>
                    <div class="div-container-fullcalendar">
                        <div id="div-fullcalendar">

                        </div>
                    </div>
                    <div class="div-add-button">
                        <button class="add-button" id="add-button-calendario">+</button>
                    </div>
                </div>
                <div class="main-content-calendario-todolist">
                    <div class="div-title">
                        Lista
                        <hr class="hr-calendario">
                    </div>
                    <div id="div-todolist">

                    </div>
                    <div class="div-add-button">
                        <button class="add-button">+</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!--AggiungiImpegno-->
    <div class="container-aggiungi-impegno-background"></div>
    <div class="container-aggiungi-impegno">
        <div class="div-title">
            <p>Aggiungi Impegno</p>
            <hr class="hr-calendario">
        </div>
        <form action="scripts/aggiungiImpegno.php" method="POST" class="form-aggiungi-impegno">
            <div class="content-aggiungi-impegno">

                <div class="inputBox">
                    <input id="inputBoxNomeImpegno" type="text" name="nomeImpegno" placeholder="Nome">
                </div>

                <div class="inputBox">
                    <textarea id="inputBoxDescrizioneImpegno" name="descrizione" placeholder="Descrizione"></textarea>
                </div>

                <div class="colors-box">
                    <span>Colore</span>
                    <input type="radio" class="colors" id="color1" name="color" checked>
                    <input type="radio" class="colors" id="color2" name="color">
                    <input type="radio" class="colors" id="color3" name="color">
                    <input type="radio" class="colors" id="color4" name="color">
                    <input type="radio" class="colors" id="color5" name="color">
                </div>
                
                <div class="day-selector-box">
                    <span>Giorno</span>
                    <input type="date" name="dataImpegno">
                </div>

                <div class="time-selector-box">
                    <span>Dalle ore:</span>
                    <input type="time" name="oraInizio">
                    <span>alle ore:</span>
                    <input type="time" name="oraFine">
                </div>
            </div>
        </form>
    </div>
</div>
        <script src="scripts/rendercalendar.js"></script>
        <script src="scripts/funzioniJS.js"></script>
    </body>
</html>