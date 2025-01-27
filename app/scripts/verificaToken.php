<?php
    session_start();
    require_once("funzioni.php");

    if(isset($_SESSION["user"])) {
        header("Location: ../index.php");
        return;
    }

    if(!isset($_GET["token"])){
        header("Location: ../login.php");
        return;
    }

    $token = $_GET["token"];

    $pdo = pdoConnection();
    if(!$pdo){
        $_SESSION["errorLoginAuth"] = "Connessione al DataBase fallita durante la verifica del token";
        header("Location: ../login.php");
        return;
    }

    $stmt = $pdo->prepare("SELECT * FROM Studente WHERE token = :token");

    $stmt->bindValue(":token", $token, PDO::PARAM_STR);

    $res = $stmt->execute();

    if(!$res){
        $_SESSION["errorLoginAuth"] = "Query fallita durante la verifica del token";
        header("Location: ../login.php");
        return;
    }

    $row = $stmt->fetch();

    if(!$row){
        $_SESSION["errorLoginAuth"] = "Token non valido";
        header("Location: ../login.php");
        return;
    }

    $stmt = $pdo->prepare("UPDATE Studente SET token = NULL WHERE token = :token");

    $stmt->bindValue(":token", $token, PDO::PARAM_STR);

    $res = $stmt->execute();

    if(!$res){
        $_SESSION["errorLoginAuth"] = "Query fallita durante la verifica del token";
        header("Location: ../login.php");
        return;
    }

    $_SESSION["successRegistration"] = "Verifica avvenuta con successo";
    header("Location: ../login.php");
    return;
?>