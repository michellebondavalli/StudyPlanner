<?php
    session_start();
    require_once("scripts/funzioni.php");
    if(!isset($_SESSION["user"])){
        header("Location: login.php");
        return;
    }
    if(!isset($_SESSION["actualPage"])){
        $_SESSION["actualPage"] = "sidebar-home";
    }
?>
<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="images/main icons/logo/Logo2.png" type="image/x-icon">
        <title>StudyPlanner</title>

        <!--Bootstrap
        <link href = "
            https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css
        " rel = "stylesheet"
        integrity = "
            sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH
        " crossorigin = "anonymous">-->

        <!--jQuery-->
        <script src = "
            https://code.jquery.com/jquery-3.7.1.js
        " integrity = "
            sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=
        " crossorigin = "anonymous"></script>

        <!--FullCalendar-->
        <script src="
            https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js
        "></script>

        <!--Style-->
        <link rel="stylesheet" href="styles/globalvariables.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="styles/generalstyle.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="styles/sidebarstyle.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="styles/calendarviewstyle.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="styles/dayselector.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="styles/scrollbar.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="styles/forms.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="styles/alert.css?v=<?php echo time(); ?>">

        <!--Fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href = "
            https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap
        " rel = "stylesheet">

        <link rel="manifest" href="manifest.json">
    </head>

    <body>
        <div class="body-container">

            <!--Sidebar-->
            <nav class="sidebar-navigation">
                <ul>
                    <li <?php if($_SESSION["actualPage"] == "sidebar-home") echo "class='active'";?> id="sidebar-home">
                        <svg xmlns="http://www.w3.org/2000/svg" height="33px" viewBox="0 -960 960 960" width="33px" fill="var(--blu-icona-hover)"><path d="M226.67-186.67h140v-246.66h226.66v246.66h140v-380L480-756.67l-253.33 190v380ZM160-120v-480l320-240 320 240v480H526.67v-246.67h-93.34V-120H160Zm320-352Z"/></svg>
                        <span class="tooltip">Home</span>
                    </li>
                    <li <?php if($_SESSION["actualPage"] == "sidebar-impegni") echo "class='active'";?> id="sidebar-impegni">
                        <svg xmlns="http://www.w3.org/2000/svg" height="33px" viewBox="0 -960 960 960" width="33px" fill="var(--blu-icona-hover)"><path d="M186.67-80q-27 0-46.84-19.83Q120-119.67 120-146.67v-600q0-27 19.83-46.83 19.84-19.83 46.84-19.83h56.66V-880h70v66.67h333.34V-880h70v66.67h56.66q27 0 46.84 19.83Q840-773.67 840-746.67v600q0 27-19.83 46.84Q800.33-80 773.33-80H186.67Zm0-66.67h586.66v-420H186.67v420Zm0-486.66h586.66v-113.34H186.67v113.34Zm0 0v-113.34 113.34Z"/></svg>
                        <span class="tooltip">Impegni</span>
                    </li>
                    <li <?php if($_SESSION["actualPage"] == "sidebar-grafici") echo "class='active'";?> id="sidebar-grafici">
                        <svg xmlns="http://www.w3.org/2000/svg" height="33px" viewBox="0 -960 960 960" width="33px" fill="var(--blu-icona-hover)"><path d="M120-120v-77.33L186.67-264v144H120Zm163.33 0v-237.33L350-424v304h-66.67Zm163.34 0v-304l66.66 67.67V-120h-66.66ZM610-120v-236.33L676.67-423v303H610Zm163.33 0v-397.33L840-584v464h-66.67ZM120-346.33v-94.34l280-278.66 160 160L840-840v94.33L560-465 400-625 120-346.33Z"/></svg>
                        <span class="tooltip">Grafici</span>
                    </li>
                    <li <?php if($_SESSION["actualPage"] == "sidebar-impostazioni") echo "class='active'";?> id="sidebar-impostazioni">
                        <svg xmlns="http://www.w3.org/2000/svg" height="33px" viewBox="0 -960 960 960" width="33px" fill="var(--blu-icona-hover)"><path d="m382-80-18.67-126.67q-17-6.33-34.83-16.66-17.83-10.34-32.17-21.67L178-192.33 79.33-365l106.34-78.67q-1.67-8.33-2-18.16-.34-9.84-.34-18.17 0-8.33.34-18.17.33-9.83 2-18.16L79.33-595 178-767.67 296.33-715q14.34-11.33 32.34-21.67 18-10.33 34.66-16L382-880h196l18.67 126.67q17 6.33 35.16 16.33 18.17 10 31.84 22L782-767.67 880.67-595l-106.34 77.33q1.67 9 2 18.84.34 9.83.34 18.83 0 9-.34 18.5Q776-452 774-443l106.33 78-98.66 172.67-118-52.67q-14.34 11.33-32 22-17.67 10.67-35 16.33L578-80H382Zm55.33-66.67h85l14-110q32.34-8 60.84-24.5T649-321l103.67 44.33 39.66-70.66L701-415q4.33-16 6.67-32.17Q710-463.33 710-480q0-16.67-2-32.83-2-16.17-7-32.17l91.33-67.67-39.66-70.66L649-638.67q-22.67-25-50.83-41.83-28.17-16.83-61.84-22.83l-13.66-110h-85l-14 110q-33 7.33-61.5 23.83T311-639l-103.67-44.33-39.66 70.66L259-545.33Q254.67-529 252.33-513 250-497 250-480q0 16.67 2.33 32.67 2.34 16 6.67 32.33l-91.33 67.67 39.66 70.66L311-321.33q23.33 23.66 51.83 40.16 28.5 16.5 60.84 24.5l13.66 110Zm43.34-200q55.33 0 94.33-39T614-480q0-55.33-39-94.33t-94.33-39q-55.67 0-94.5 39-38.84 39-38.84 94.33t38.84 94.33q38.83 39 94.5 39ZM480-480Z"/></svg>
                        <span class="tooltip">Impostazioni</span>
                    </li>
                    <li id="sidebar-logout">
                        <svg xmlns="http://www.w3.org/2000/svg" height="33px" viewBox="0 -960 960 960" width="33px" fill="var(--blu-icona-hover)"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/></svg>
                        <span class="tooltip">logout</span>
                    </li>
                </ul>
            </nav>

            <!--MainBar-->
            <main class="main-container">

                <!--MainHeader-->
                <div class="main-header">
                    <div class="logo-container">
                        <div class="logo-image">
                            <img src="images/main icons/logo/Logo2.png" class="logo" height="60px" alt="logo">
                        </div>
                        <div class="logo-name">
                            <p>StudyPlanner</p>
                        </div>
                    </div>
                    <div class="user-container">
                        <div class="user-name">
                            <p class="userName"><?php echo $_SESSION["user"]["username"]; ?></p> <!--max 23 caratteri-->
                        </div>
                        <img src="images/usersImg/<?php 
                            if(!isset($_SESSION['user']['imgProfilo'])) {
                                echo "defaultImg.png";
                            } else {
                                echo $_SESSION['user']['id'] . "." . $_SESSION['user']['imgProfilo']; 
                            }
                        ?>" class="user-image" height="60px" alt="user image">
                    </div>
                </div>

                <!--MainContent-->
                <div class="main-content">


                    <!--Inizio Contenitore Home-->
                    <div class="main-content-home">
                        <table class="home-orario">
                            <thead>
                                <th></th>
                                <th>Lunedì</th>
                                <th>Martedi</th>
                                <th>Mercoledì</th>
                                <th>Giovedì</th>
                                <th>Venerdi</th>
                                <th>Sabato</th>
                            </thead>
                            <tbody id="tbody-orario">
                                <?php
                                    for ($i = 1; $i < 7; $i++) {
                                        echo "\t\t\t\t\t\t\t\t<tr> \r";
                                        echo "\t\t\t\t\t\t\t\t\t<td>" . $i . "° ora</td> \n";
                                        for ($j = 0; $j < 6; $j++) {
                                            echo "\t\t\t\t\t\t\t\t\t\t<td class='td-orario'></td> \n";
                                        }
                                        echo "\t\t\t\t\t\t\t\t</tr> \n";
                                    }
                                ?>
                                <!--<tr>
                                    <td>1° ora</td>
                                    <td class="td-orario"></td>
                                    <td class="td-orario"></td>
                                    <td class="td-orario"></td>
                                    <td class="td-orario"></td>
                                    <td class="td-orario"></td>
                                    <td class="td-orario"></td>
                                </tr>
                                <tr>
                                    <td>2° ora</td>
                                    <td class="td-orario"></td>
                                    <td class="td-orario"></td>
                                    <td class="td-orario"></td>
                                    <td class="td-orario"></td>
                                    <td class="td-orario"></td>
                                    <td class="td-orario"></td>
                                </tr>
                                <tr>
                                    <td>3° ora</td>
                                    <td class="td-orario"></td>
                                    <td class="td-orario"></td>
                                    <td class="td-orario"></td>
                                    <td class="td-orario"></td>
                                    <td class="td-orario"></td>
                                    <td class="td-orario"></td>
                                </tr>
                                <tr>
                                    <td>4° ora</td>
                                    <td class="td-orario"></td>
                                    <td class="td-orario"></td>
                                    <td class="td-orario"></td>
                                    <td class="td-orario"></td>
                                    <td class="td-orario"></td>
                                    <td class="td-orario"></td>
                                </tr>
                                <tr>
                                    <td>5° ora</td>
                                    <td class="td-orario"></td>
                                    <td class="td-orario"></td>
                                    <td class="td-orario"></td>
                                    <td class="td-orario"></td>
                                    <td class="td-orario"></td>
                                    <td class="td-orario"></td>
                                </tr>
                                <tr>
                                    <td>6° ora</td>
                                    <td class="td-orario"></td>
                                    <td class="td-orario"></td>
                                    <td class="td-orario"></td>
                                    <td class="td-orario"></td>
                                    <td class="td-orario"></td>
                                    <td class="td-orario"></td>
                                </tr>-->
                            </tbody>
                        </table>
                    </div>
                    <!--Fine Contenitore Home-->


                    <!--Inizio Contenitore Impegni-->
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
                    <!--FineContenitore Impegni-->


                    <!--InizioContenitore Grafici-->
                    <div class="main-content-grafici">
                        <div class="main-content-voti">
                            <div class="main-content-voti-elenco">
                                <div class="div-title">
                                    Materie
                                    <hr class="hr-calendario">
                                </div>
                                <div class="div-add-button">
                                        <button class="add-button" id="add-button-materia">+</button>
                                </div>
                                <div class="scroll-bar">
                                    <div class="elemento-lista-materie">
                                        <p class="nome-materia">Matematica</p>
                                        <div class="media-materia">7.5</div>
                                    </div>
                                    <div class="elemento-lista-materie">
                                        <p class="nome-materia">Matematica</p>
                                        <div class="media-materia"><span>7.5</span></div>
                                    </div>
                                    <div class="elemento-lista-materie">
                                        <p class="nome-materia">Matematica</p>
                                        <div class="media-materia">7.5</div>
                                    </div>
                                    <div class="elemento-lista-materie">
                                        <p class="nome-materia">Matematica</p>
                                        <div class="media-materia"><span>7.5</span></div>
                                    </div>
                                    <div class="elemento-lista-materie">
                                        <p class="nome-materia">Matematica</p>
                                        <div class="media-materia">7.5</div>
                                    </div>
                                    <div class="elemento-lista-materie">
                                        <p class="nome-materia">Matematica</p>
                                        <div class="media-materia"><span>7.5</span></div>
                                    </div>
                                    <div class="elemento-lista-materie">
                                        <p class="nome-materia">Matematica</p>
                                        <div class="media-materia">7.5</div>
                                    </div>
                                    <div class="elemento-lista-materie">
                                        <p class="nome-materia">Matematica</p>
                                        <div class="media-materia"><span>7.5</span></div>
                                    </div>
                                    <div class="elemento-lista-materie">
                                        <p class="nome-materia">Matematica</p>
                                        <div class="media-materia">7.5</div>
                                    </div>
                                    <div class="elemento-lista-materie">
                                        <p class="nome-materia">Matematica</p>
                                        <div class="media-materia"><span>7.5</span></div>
                                    </div>
                                    <div class="elemento-lista-materie">
                                        <p class="nome-materia">Matematica</p>
                                        <div class="media-materia">7.5</div>
                                    </div>
                                    <div class="filler">
                                    </div>

                                </div>
                            </div>
                            
                            <div class="main-content-voti-centro">
                                <div class="main-content-voti-grafico"></div>
                                <div class="main-content-voti-obiettivo">
                                    <div class="andamento">
                                        <div class="andamento-materia">
                                            <p class="nome-materia">Matematica</p>
                                            <div class="media-materia">7.5</div>
                                        </div>
                                        <div>in crescita</div>
                                    </div>
                                    <div class="obiettivo">
                                        <div>
                                            <p id="p-obiettivo">Imposta obiettivo</p>
                                            <div class="div-add-button-obiettivo">
                                                <button class="add-button" id="add-button-obiettivo">+</button>
                                            </div>

                                        </div>
                                        <div>
                                            <button class="dettagli-obiettivo"> Dettagli obiettivo</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-content-voti-corrente">
                                <div class="div-title">
                                    materia da estrarre
                                    <hr class="hr-calendario">
                                </div>
                                <div class="div-add-button">
                                        <button class="add-button" id="add-button-voto">+</button>
                                </div>
                                <div class="scroll-bar">
                                    <div class="elemento-lista-voti">
                                        <p class="nome-voto">Interrogazione</p>
                                        <div class="voto">10-</div>
                                    </div>
                                    <div class="elemento-lista-voti">
                                        <p class="nome-voto">Interrogazione</p>
                                        <div class="voto">10-</div>
                                    </div>
                                    <div class="elemento-lista-voti">
                                        <p class="nome-voto">Interrogazione</p>
                                        <div class="voto">10-</div>
                                    </div>
                                    <div class="elemento-lista-voti">
                                        <p class="nome-voto">Interrogazione</p>
                                        <div class="voto">10-</div>
                                    </div>
                                    <div class="elemento-lista-voti">
                                        <p class="nome-voto">Interrogazione</p>
                                        <div class="voto">10-</div>
                                    </div>
                                    <div class="elemento-lista-voti">
                                        <p class="nome-voto">Interrogazione</p>
                                        <div class="voto">10-</div>
                                    </div>
                                    <div class="elemento-lista-voti">
                                        <p class="nome-voto">Interrogazione</p>
                                        <div class="voto">10-</div>
                                    </div>
                                    <div class="elemento-lista-voti">
                                        <p class="nome-voto">Interrogazione</p>
                                        <div class="voto">10-</div>
                                    </div>
                                    <div class="elemento-lista-voti">
                                        <p class="nome-voto">Interrogazione</p>
                                        <div class="voto">10-</div>
                                    </div>
                                    <div class="elemento-lista-voti">
                                        <p class="nome-voto">Interrogazione</p>
                                        <div class="voto">10-</div>
                                    </div>
                                    <div class="elemento-lista-voti">
                                        <p class="nome-voto">Interrogazione</p>
                                        <div class="voto">10-</div>
                                    </div>

                                    <div class="filler">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <!--FineContenitore Grafici-->


                    <!--InizioContenitore Impostazioni-->
                    <div class="main-content-impostazioni">
                        <div class="impostazioni-account">
                            <div class="div-title">
                                Impostazioni account
                                <hr class="hr-calendario">
                            </div>
                            <div class="content-account">
                                <div><label for="nome-impostazioni">Nome: </label> 
                                    <p><?php echo $_SESSION["user"]["nome"]; ?></p>
                                </div>
                                <div><label for="cognome-impostazioni">Cognome: </label> 
                                    <p> <?php echo $_SESSION["user"]["cognome"]; ?></p>
                                </div>
                                <div><label for="email-impostazioni">Email: </label> 
                                    <p> <?php echo $_SESSION["user"]["email"]; ?></p> 
                                </div>
                                <button id="modifica-account-button" class="default-button" value="Modifica">Modifica</button>
                            </div>
                            <div><button id="elimina-account-button" class="default-button" value="Modifica">Elimina account</button></div>
                        </div>

                        <div class="impostazioni-applicazione">
                            <div class="div-title">
                                Impostazioni applicazione
                                <hr class="hr-calendario">
                            </div>
                            <div class="content-applicazione">
                                <button class="default-button" id="esporta-orario-button">Esporta orario</button>
                                <input type="file" class="default-button" id="fileInput" accept=".json">
                                <button class="default-button" id="importa-orario-button">Importa orario</button>
                                <button class="default-button elimina-button" id="elimina-orario-button">Elimina orario</button>
                            </div>
                        </div>
                    </div>
                    <!--FineContenitore Impostazioni-->

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
                            <input type="radio" class="colors" id="color1" name="color" value="--azzurro-sfondo" checked>
                            <input type="radio" class="colors" id="color2" name="color" value="--verde-acqua">
                            <input type="radio" class="colors" id="color3" name="color" value="--rosino">
                            <input type="radio" class="colors" id="color4" name="color" value="--verdino">
                            <input type="radio" class="colors" id="color5" name="color" value="--lilla">
                            <input type="radio" class="colors" id="color6" name="color" value="--albicocca">
                            <input type="radio" class="colors" id="color7" name="color" value="--giallino">
                            <input type="radio" class="colors" id="color8" name="color" value="--corallo">
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
                        <div class="button-box">
                            <button class="default-button annulla-button" type="reset">Annulla</button>
                            <input class="default-button" type="submit" value="Aggiungi">
                        </div>
                    </div>
                </form>
            </div>
            <!--fine AggiungiImpegno-->

            <!--AggiungiLezione-->
            <div class="container-aggiungi-lezione">
                <div class="div-title">
                    <p>Aggiungi Lezione</p>
                    <hr class="hr-calendario">
                </div>
                <form action="scripts/aggiungiLezione.php" method="POST" class="form-aggiungi-impegno">
                    <div class="content-aggiungi-lezione">

                        <input type="hidden" name="dataLezione" class="aggiungi-lezione-giorno">
                        <input type="hidden" name="oraLezione" class="aggiungi-lezione-ora">

                        <div class="inputBox">
                            <input id="inputBoxNomeLezione" type="text" name="nomeLezione" placeholder="Nome">
                        </div>

                        <div class="colors-box">
                            <span>Colore</span>
                            <input type="radio" class="colors" id="color1" name="color" value="--azzurro-sfondo" checked>
                            <input type="radio" class="colors" id="color2" name="color" value="--verde-acqua">
                            <input type="radio" class="colors" id="color3" name="color" value="--rosino">
                            <input type="radio" class="colors" id="color4" name="color" value="--verdino">
                            <input type="radio" class="colors" id="color5" name="color" value="--lilla">
                            <input type="radio" class="colors" id="color6" name="color" value="--albicocca">
                            <input type="radio" class="colors" id="color7" name="color" value="--giallino">
                            <input type="radio" class="colors" id="color8" name="color" value="--corallo">
                        </div>

                        <div class="button-box">
                            <button type="button" class="default-button elimina-button">Elimina</button>
                            <div class="spacer"></div>
                            <button class="default-button annulla-button" type="reset">Annulla</button>
                            <input class="default-button" id="aggiungi-lezione-button" type="submit" value="Aggiungi">
                        </div>
                    </div>
                </form>
            </div>
            <!--fine AggiungiLezione-->

            
            <!-- Overlay per l'alert -->
            <div class="overlay" id="alertOverlay">
                <div class="custom-alert">
                    <p>Sei sicuro di voler uscire dal tuo account?</p>
                    <form action="scripts/logout.php" method="put">
                        <input class="confirm-btn" id="confirmBtn" value="Conferma" type="submit">
                    </form>
                    <button class="cancel-btn" id="cancelBtn">Annulla</button>
                </div>
            </div>
            <!-- Overlay per l'alert elimina account-->
            <div class="overlay" id="alertOverlay-account">
                <div class="custom-alert">
                    <p>Sei sicuro di voler eliminare il tuo account?</p>
                    <form action="scripts/deleteAccount.php" method="delete">
                        <input class="confirm-btn" id="confirmBtn-account" value="Conferma" type="submit">
                    </form>
                    <button class="cancel-btn" id="cancelBtn-account">Annulla</button>
                </div>
            </div>
        </div>

        <script src="scripts/funzioniJS.js?v=<?php echo time(); ?>"></script>
        <script src="scripts/homeView.js?v=<?php echo time(); ?>"></script>
        <script src="scripts/rendercalendar.js?v=<?php echo time(); ?>"></script>
        <script src="scripts/changingpage.js?v=<?php echo time(); ?>"></script>
        <script src="scripts/impostazioni.js?v=<?php echo time(); ?>"></script>

    </body>
</html>