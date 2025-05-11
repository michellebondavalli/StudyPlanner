<?php
    session_start();
    require_once("funzioni.php");

    if(!isset($_SESSION["user"])){
        header("Location: login.php");
        return;
    }

    if(!isset($_POST["voto"]) || !isset($_POST["dataLezione"]) || !isset($_POST["peso"]) || !isset($_POST["fk_id_materia"])){
        header("Location: ../index.php");
        return;
    }

    $voto = $_POST["voto"];
    $dataLezione = $_POST["dataLezione"];
    $peso = $_POST["peso"];
    $fk_id_materia = $_POST["fk_id_materia"];
    
    $pdo = pdoConnection();

    if(!$pdo){
        header("Location: ../index.php");
        return;
    }

    $stmt = $pdo->prepare("INSERT INTO Verifica(voto, dataVerifica, peso, fk_id_materia) VALUES (:voto, :dataLezione, :peso, :fk_id_materia)");

    $stmt->bindParam(":voto", $voto, PDO::PARAM_STR);
    $stmt->bindParam(":dataLezione", $dataLezione);
    $stmt->bindParam(":peso", $peso, PDO::PARAM_STR);
    $stmt->bindParam(":fk_id_materia", $fk_id_materia, PDO::PARAM_INT);
    $stmt->execute();

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


    header("Location: ../index.php");
    return;
?>