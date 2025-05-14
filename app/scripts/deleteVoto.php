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

    $stmt = $pdo->prepare("DELETE FROM Verifica WHERE ID = :id");
    $stmt->bindValue(":id", $_GET["idVoto"], PDO::PARAM_INT);
    $stmt->execute();

    /*Calcolo media*/
    $stmt = $pdo->prepare("SELECT voto, peso FROM Verifica WHERE fk_id_materia = :fk_id_materia");
    $stmt->bindParam(":fk_id_materia", $fk_id_materia, PDO::PARAM_INT);
    $stmt->execute();
    $votiPesati = $stmt->fetchAll();
    foreach($votiPesati as $votoPesato){
        $accumulo += $votoPesato["voto"] * $votoPesato["peso"] / 100;
        $conteggio += $votoPesato["peso"] / 100;
    }
    $media;
    if($conteggio == 0)
        $media = 0;
    else
        $media = $accumulo / $conteggio;
    $stmt = $pdo->prepare("UPDATE Materia SET media = :media WHERE ID = :ID");
    $stmt->bindParam(":media", $media, PDO::PARAM_STR);
    $stmt->bindParam(":ID", $fk_id_materia, PDO::PARAM_INT);
    $stmt->execute();
?>