<?php
    session_start();
    require_once("funzioni.php");

    if(!isset($_SESSION["user"])){
        header("Location: login.php");
        return;
    }

    if(!isset($_POST["nomeImpegno"]) || !isset($_POST["descrizione"]) || !isset($_POST["dataImpegno"]) || !isset($_POST["color"]) || !isset($_POST["oraInizio"]) || !isset($_POST["oraFine"])){
        header("Location: index.php");
        return;
    }

    $nomeImpegno = $_POST["nomeImpegno"];
    $descrizione = $_POST["descrizione"];
    $dataLezione = $_POST["dataImpegno"];
    $color = $_POST["color"];
    $oraInizio = $_POST["oraInizio"];
    $oraFine = $_POST["oraFine"];
    $ID = $_POST["idImpegno"];
    
    $pdo = pdoConnection();

    if(!$pdo){
        header("Location: index.php");
        return;
    }

    if($ID != 0){
        $stmt = $pdo->prepare("UPDATE Impegno SET nome = :nome, descrizione = :descrizione, colore = :colore, dataImpegno = :dataImpegno, oraInizio = :oraInizio, oraFine = :oraFine WHERE id = :id");

        $stmt->bindParam(":nome", $nomeImpegno, PDO::PARAM_STR);
        $stmt->bindParam(":descrizione", $descrizione, PDO::PARAM_STR);
        $stmt->bindParam(":colore", $color, PDO::PARAM_STR);
        $stmt->bindParam(":dataImpegno", $dataLezione);
        $stmt->bindParam(":oraInizio", $oraInizio);
        $stmt->bindParam(":oraFine", $oraFine);
        $stmt->bindParam(":id", $ID);
    } else {
        $stmt = $pdo->prepare("INSERT INTO Impegno(nome, descrizione, colore, dataImpegno, oraInizio, oraFine, fk_id_studente) VALUES (:nome, :descrizione, :colore, :dataImpegno, :oraInizio, :oraFine, :fk_id_studente)");

        $stmt->bindParam(":nome", $nomeImpegno, PDO::PARAM_STR);
        $stmt->bindParam(":descrizione", $descrizione, PDO::PARAM_STR);
        $stmt->bindParam(":colore", $color, PDO::PARAM_STR);
        $stmt->bindParam(":dataImpegno", $dataLezione);
        $stmt->bindParam(":oraInizio", $oraInizio);
        $stmt->bindParam(":oraFine", $oraFine);
        $stmt->bindParam(":fk_id_studente", $_SESSION["user"]["id"]);
    }

    $stmt->execute();
    header("Location: ../index.php");
    return;
?>