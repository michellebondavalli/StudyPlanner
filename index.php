<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="app/images/main%20icons/logo/Logo2.png" type="">

  <title>StudyPlanner</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css?v=<?php echo time(); ?>" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css?v=<?php echo time(); ?>" rel="stylesheet" />
  <!-- scrollbar custom -->
  <link rel="stylesheet" href="app/styles/scrollbar.css">
  
  <!--jQuery-->
  <script src = "
      https://code.jquery.com/jquery-3.7.1.js
  " integrity = "
      sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=
  " crossorigin = "anonymous"></script>
</head>

<body>

  <div class="hero_area" id="titolo-reference">

    <div class="hero_bg_box">
      <div class="bg_img_box">
        <img src="images/hero-bg.png" alt="">
      </div>
    </div>

    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <img src="app/images/main%20icons/logo/Logo2.png" class="logo" height="60px" alt="logo">
          <a class="navbar-brand" href="index.php">
            <span>
              StudyPlanner
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item active" id="home-reference">
                <a class="nav-link" href="#titolo-reference">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item" id="aboutus-reference">
                <a class="nav-link" href="#aboutusTitle-reference"> About</a>
              </li>
              <li class="nav-item logo" id="MethodMind-reference">
                <a class="nav-link" id="logoLink" href="https://methodmind.altervista.org/MethodMind.php">Method<span class="highlight">Mind</span> <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="app/login.php"> <i class="fa fa-user" aria-hidden="true"></i> Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="app/registrazione.php"> <i class="fa fa-user" aria-hidden="true"></i> Registrazione</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-6 ">
                  <div class="detail-box">
                    <h1>
                      Benvenuto <br>
                      nella tua <br>
                      <span>agenda digitale!</span> <br>
                    </h1>
                    <p>
                    Con StudyPlanner non ti perderai più niente! Dai una marcia in più al tuo studio, mantieni il focus sui tuoi obiettivi e trasforma il tuo percorso scolastico in un successo.
                    </p>
                    <div class="btn-box">
                      <a href="app/registrazione.php" class="btn1">
                        Inizia subito!
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/slider-img.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- end slider section -->
  </div>


  <!-- service section -->

  <section class="service_section layout_padding">
    <div class="service_container">
      <div class="container ">
        <div class="heading_container heading_center">
          <h2>
            Con StudyPlanner puoi:
          </h2>
          <p>
            
          </p>
        </div>
        <div class="row">
          <div class="col-md-4 ">
            <div class="box ">
              <div class="img-box">
                <img src="images/s1.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                Pianificare
                </h5>
                <p>
                I tuoi impegni e gestisci le tue giornate con orari sempre sotto controllo
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4 ">
            <div class="box ">
              <div class="img-box">
                <img src="images/s2.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                Memorizzare
                </h5>
                <p>
                Scadenze, verifiche e impegni in pochi click
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4 ">
            <div class="box ">
              <div class="img-box">
                <img src="images/s3.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                Ottenere statistiche
                </h5>
                <p>
                Sui tuoi voti e monitora i tuoi progressi per migliorare costantemente
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end service section -->


  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container  ">
      <div class="heading_container heading_center">
        <h2 id="aboutusTitle-reference">
          About <span>Us</span>
        </h2>
        
      </div>
      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="images/imgBellissima.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <h3>
               Chi siamo
            </h3>
            <p>
            Noi di StudyPlanner crediamo che l'organizzazione sia la chiave per il successo nello studio. La nostra missione è offrire agli studenti uno strumento semplice, intuitivo e completo per pianificare il loro percorso accademico in modo efficace.

Abbiamo creato StudyPlanner per aiutarti a tenere sotto controllo impegni, lezioni e voti, offrendoti una visione chiara dei tuoi progressi. Che tu sia uno studente delle superiori o all'università, il nostro obiettivo è semplificarti la vita e darti il controllo del tuo tempo.

Unisciti a noi e trasforma il tuo modo di studiare: più organizzazione, meno stress, migliori risultati!
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->
  <br><br><br>
  <!-- MethodMind section -->

  <section class="about_section layout_padding" id="methodmindSection">
    <div class="container  ">
      <div class="heading_container heading_center">
        <h2 class="logo" id="aboutusTitle-reference">
          <a class="nav-link" id="logoLink" href="https://methodmind.altervista.org/MethodMind.php">Method<span class="highlight">Mind</span></a>
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="images/about-img.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <h3>
               Cos'è
            </h3>
            <p>
              MethodMind è il risultato del nostro impegno come studenti di quinta superiore.
              Questo progetto finale, (realizzato da Samuele Bertelè e Alessandro Bosco) pensato per il nostro esame, nasce dalla passione per l'apprendimento
              e il desiderio di aiutare gli altri a ottimizzare il proprio tempo di studio.
              Con MethodMind, vogliamo dimostrare come le migliori tecniche psicologiche possano essere applicate in modo pratico per raggiungere grandi risultati.
              Il progetto MethodMind è una piattaforma web innovativa progettata per aiutare gli utenti nella gestione
              e nell'ottimizzazione della concentrazione e delle tecniche di studio, consentendo di raggiungere risultati concreti
              e misurabili sia nel percorso professionale che in quello accademico.
              L'applicazione fornisce un approccio strutturato e intuitivo che permette di selezionare metodologie specifiche,
              monitorare i progressi nel tempo e migliorare l'efficacia complessiva del proprio lavoro o studio.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end MethodMind section -->

  <!-- footer section -->
  <section class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved To
        <a href="#">StudyPlanner</a>
      </p>
    </div>
  </section>
  <!-- footer section -->

  <!-- bootstrap js -->
  <script type="text/javascript" src="js/bootstrap.js"></script>

</body>
<script>
  $(window).scroll(function () {
    let heigthTrigger = 0;
    console.log($(this).scrollTop());
    if($(window).width() > 992){
      heigthTrigger = 1358;
    } else if ($(window).width() > 768){
      heigthTrigger = 1106;
    } else if ($(window).width() > 576){
      heigthTrigger = 2110;
    } else if ($(window).width() > 480){
      heigthTrigger = 2101;
    } else {
      heigthTrigger = 1928;
    }

    if ($(this).scrollTop() > heigthTrigger) {
      $('#home-reference').removeClass('active');
      $('#aboutus-reference').addClass('active');
    } else {
      $('#aboutus-reference').removeClass('active');
      $('#home-reference').addClass('active');
    }
  });
</script>

</html>