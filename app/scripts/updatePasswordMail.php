<?php
    session_start();
    require_once("funzioni.php");

    if(!isset($_POST["email"])){
        $_SESSION["errorPasswordUpdate"] = "Inserire una email";
        header("Location: ../ripristinoPassword.php");
        return;
    }

    $email = $_POST["email"];

    $pdo = pdoConnection();
    if(!$pdo){
        $_SESSION["errorPasswordUpdate"] = "Connessione al DataBase fallita";
        header("Location: ../ripristinoPassword.php");
        return;
    }

    $stmt = $pdo->prepare("SELECT * FROM Studente WHERE email = :email");
    $stmt->bindValue(":email", $email, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch();
    
    if(!$row){
        $_SESSION["errorPasswordUpdate"] = "Email non presente nel DataBase";
        header("Location: ../ripristinoPassword.php");
        return;
    }
    if(isset($row["token"])){
        $_SESSION["errorPasswordUpdate"] = "Email non verificata";
        header("Location: ../ripristinoPassword.php");
        return;
    }

    $hashToken = hash("sha256", rand());

    $stmt = $pdo->prepare("UPDATE Studente SET tokenVerificaPassword = :tokenVerificaPassword WHERE email = :email");
    $stmt->bindValue(":tokenVerificaPassword", $hashToken, PDO::PARAM_STR);
    $stmt->bindValue(":email", $email, PDO::PARAM_STR);
    $stmt->execute();

    require_once("mailHeaderBodyPasswordReset.php");

    if(mail($email, "Ripristino Password", $body, $headers)) {
        $_SESSION["successPasswordUpdate"] = "Mail inviata con successo";
        header("Location: ../ripristinoPassword.php");
        return;
    } else {
        $_SESSION["errorPasswordUpdate"] = "Errore nell'invio della mail";
        header("Location: ../ripristinoPassword.php");
        return;
    }
?>