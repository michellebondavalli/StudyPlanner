<?php
    session_start();
    require_once("funzioni.php");

    if(!isset($_POST["newPassword"]) || !isset($_POST["confirmNewPassword"])){
        if(!isset($_GET["token"])){
            header("Location: ../ripristinoPassword.php");
            return;
        } else {
            $tokenVerificaPassword = $_GET["token"];
    
            $pdo = pdoConnection();
            if(!$pdo){
                $_SESSION["errorPasswordUpdate"] = "Connessione al DataBase fallita";
                header("Location: ../ripristinoPassword.php");
                return;
            }
        
            $stmt = $pdo->prepare("SELECT * FROM Studente WHERE tokenVerificaPassword = :tokenVerificaPassword");
            $stmt->bindValue(":tokenVerificaPassword", $tokenVerificaPassword, PDO::PARAM_STR);
            $stmt->execute();    
            $row = $stmt->fetch();
        
            if(!$row){
                $_SESSION["errorPasswordUpdate"] = "Token non valido";
                header("Location: ../ripristinoPassword.php");
                return;
            }

            $_SESSION["tokenVerificaPassword"] = $tokenVerificaPassword;
        }

    } else {
        $newPassword = $_POST["newPassword"];
        $confirmNewPassword = $_POST["confirmNewPassword"];

        if($newPassword != $confirmNewPassword){
            $_SESSION["errorPasswordUpdate"] = "Le password non corrispondono";
            header("Location: updatePassword.php");
            return;
        }

        $pdo = pdoConnection();
        if(!$pdo){
            $_SESSION["errorPasswordUpdate"] = "Connessione al DataBase fallita";
            header("Location: updatePassword.php");
            return;
        }
        
        $stmt = $pdo->prepare("UPDATE Studente SET hashPassword = :newPassword WHERE tokenVerificaPassword = :tokenVerificaPassword");
        $stmt->bindValue(":newPassword", hash("sha256", $newPassword), PDO::PARAM_STR);
        $stmt->bindValue(":tokenVerificaPassword", $_SESSION["tokenVerificaPassword"], PDO::PARAM_STR);
        $stmt->execute();

        $stmt = $pdo->prepare("UPDATE Studente SET tokenVerificaPassword = NULL WHERE tokenVerificaPassword = :tokenVerificaPassword");
        $stmt->bindValue(":tokenVerificaPassword", $_SESSION["tokenVerificaPassword"], PDO::PARAM_STR);
        $stmt->execute();

        $_SESSION["successRegistration"] = "Password aggiornata con successo";
        header("Location: ../login.php");
        return;
    }
?>
<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../images/main%20icons/logo/Logo2.png" type="image/x-icon">
        <title>Nuova Password</title>

        <link rel="stylesheet" href="../styles/forms.css">
        <link rel="stylesheet" href="../styles/globalvariables.css">
        <link rel="stylesheet" href="../styles/generalstyle.css">

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
                <img src="../images/main icons/logo/Logo2.png" height="60px" alt="logo">
                <h1>StudyPlanner</h1>
            </div>
            <form action="updatePassword.php" method="POST">
                <div class="inputBox">
                    <input type="password" name="newPassword" required onkeyup="this.setAttribute('value', this.value);" value="">
                    <label>Nuova password</label>
                </div>

                <div class="inputBox">
                    <input type="password" name="confirmNewPassword" required onkeyup="this.setAttribute('value', this.value);" value="">
                    <label>Conferma nuova passoword</label>
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
                
                <input type="submit" name="accedi" value="Ripristina password">
            </form>
        </div>
    </body>
</html>