<?php
    session_start();
    require_once("funzioni.php");

    if(!isset($_SESSION["user"])){
        header("Location: login.php");
        return;
    }

    if(!isset($_POST["dataLezione"]) || !isset($_POST["oraLezione"]) || !isset($_POST["nomeLezione"]) || !isset($_POST["color"])){
        header("Location: index.php");
        return;
    }

    $dataLezione = $_POST["dataLezione"];
    $oraLezione = $_POST["oraLezione"];
    $nomeLezione = $_POST["nomeLezione"];
    $color = $_POST["color"];
    
    $pdo = pdoConnection();

    if(!$pdo){
        header("Location: index.php");
        return;
    }

    $stmt = $pdo->prepare("SELECT * FROM OraLezione WHERE giorno = :giorno AND ora = :ora AND fk_id_studente = :fk_id_studente");
    $stmt->bindValue(":giorno", $dataLezione, PDO::PARAM_STR);
    $stmt->bindValue(":ora", $oraLezione, PDO::PARAM_INT);
    $stmt->bindValue(":fk_id_studente", $_SESSION["user"]["id"], PDO::PARAM_INT);
    $stmt->execute();
    
    if($stmt->rowCount() > 0){
        $stmt = $pdo->prepare("UPDATE OraLezione SET nome = :nome, colore = :colore WHERE giorno = :giorno AND ora = :ora AND fk_id_studente = :fk_id_studente");
    } else {
        $stmt = $pdo->prepare("INSERT INTO OraLezione(giorno, ora, nome, colore, fk_id_studente) VALUES (:giorno, :ora, :nome, :colore, :fk_id_studente)");
    }

    $stmt->bindValue(":giorno", $dataLezione, PDO::PARAM_STR);
    $stmt->bindValue(":ora", $oraLezione, PDO::PARAM_INT);
    $stmt->bindValue(":nome", $nomeLezione, PDO::PARAM_STR);
    $stmt->bindValue(":colore", $color, PDO::PARAM_STR);
    $stmt->bindValue(":fk_id_studente", $_SESSION["user"]["id"], PDO::PARAM_INT);

    $stmt->execute();
    header("Location: ../index.php");
    return;
?>