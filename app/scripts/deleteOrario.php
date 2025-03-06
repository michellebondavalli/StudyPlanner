<?php
    session_start();
    header("Content-Type: application/json");
    require_once("funzioni.php");

    if(!isset($_SESSION["user"])){
        header("Location: login.php");
        return;
    }

    $pdo = pdoConnection();

    if(!$pdo){
        header("Location: index.php");
        return;
    }

    $stmt = $pdo->prepare("DELETE FROM OraLezione WHERE giorno = :giorno and ora = :ora and fk_id_studente = :fk_id_studente");
    $stmt->bindValue(":ora", $_GET["ora"], PDO::PARAM_INT);
    $stmt->bindValue(":giorno", $_GET["giorno"], PDO::PARAM_STR);
    $stmt->bindValue(":fk_id_studente", $_SESSION["user"]["id"], PDO::PARAM_INT);
    $stmt->execute();
?>