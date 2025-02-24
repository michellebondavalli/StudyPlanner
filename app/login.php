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
        <title>Login</title>

        <link rel="stylesheet" href="styles/forms.css">
        <link rel="stylesheet" href="styles/globalvariables.css">
        <link rel="stylesheet" href="styles/generalstyle.css">

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
            <form action="scripts/loginAuth.php" method="POST">
                <div class="inputBox">
                    <input type="email" name="email" required onkeyup="this.setAttribute('value', this.value);" value="">
                    <label>Email</label>
                </div>

                <div class="inputBox">
                    <input type="password" name="pwd" required onkeyup="this.setAttribute('value', this.value);" value="">
                    <label>Password</label>
                </div>

                <div class="form-error"><?php
                    if(isset($_SESSION["errorLoginAuth"])) {
                        echo $_SESSION["errorLoginAuth"];
                        unset($_SESSION["errorLoginAuth"]);
                    }
                ?></div>

                <div class="form-success"><?php
                    if(isset($_SESSION["successRegistration"])) {
                        echo $_SESSION["successRegistration"];
                        unset($_SESSION["successRegistration"]);
                    }
                ?></div>
                
                <input type="submit" name="accedi" value="Accedi">
            </form>

            <p>Password dimenticata? <a href="ripristinoPassword.php">Ripristina</a></p>
            <p>Non hai ancora un account? <a href="registrazione.php">Registrati</a></p>
        </div>
    </body>
</html>