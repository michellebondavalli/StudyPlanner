<?php
    session_start();
    require_once("funzioni.php");

    if(!isset($_SESSION["user"])){
        header("Location: login.php");
        return;
    }

    if(!isset($_POST["nomeMateria"])){
        header("Location: index.php");
        return;
    }

    $nomeMateria = $_POST["nomeMateria"];
    
    $pdo = pdoConnection();

    if(!$pdo){
        header("Location: index.php");
        return;
    }

    $stmt = $pdo->prepare("INSERT INTO Materia(nome, fk_id_studente) VALUES (:nome, :fk_id_studente)");

    $stmt->bindParam(":nome", $nomeMateria, PDO::PARAM_STR);
    $stmt->bindParam(":fk_id_studente", $_SESSION["user"]["id"], PDO::PARAM_INT);

    $stmt->execute();
    header("Location: ../index.php");
    return;
?>