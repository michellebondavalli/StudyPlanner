<?php
    session_start();
    if(isset($_SESSION["user"])) {
        header("Location: index.php");
        return;
    }
?>
<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="images/main icons/logo/Logo2.png" type="image/x-icon">
        <title>Ripristino Password</title>

        <link rel="stylesheet" href="styles/forms.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="styles/globalvariables.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="styles/generalstyle.css?v=<?php echo time(); ?>">

         <!--Fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href = "
            https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap
        " rel = "stylesheet">
    </head>

    <body>
        <div class="box">
            <div class="logo-container-form">
                <img src="images/main icons/logo/Logo2.png" height="60px" alt="logo">
                <h1>StudyPlanner</h1>
            </div>
            <form action="scripts/updatePasswordMail.php" method="POST">

                <p>Inserisci la email dell' account di cui vuoi ripristinare la password</p>
                <br>
                <div class="inputBox">
                    <input type="email" name="email" required onkeyup="this.setAttribute('value', this.value);" value="">
                    <label>Email</label>
                </div>

                <div class="form-error"><?php
                    if(isset($_SESSION["errorPasswordUpdate"])) {
                        echo $_SESSION["errorPasswordUpdate"];
                        unset($_SESSION["errorPasswordUpdate"]);
                    }
                ?></div>

                <div class="form-success"><?php
                    if(isset($_SESSION["successPasswordUpdate"])) {
                        echo $_SESSION["successPasswordUpdate"];
                        unset($_SESSION["successPasswordUpdate"]);
                    }
                ?></div>
                
                <input type="submit" name="accedi" value="Invia Mail">
            </form>

            <p><a href="login.php">Torna indietro</a></p>
        </div>
    </body>
</html>