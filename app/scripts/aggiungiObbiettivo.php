<?php
    session_start();
    require_once("funzioni.php");

    if(!isset($_SESSION["user"])){
        header("Location: login.php");
        return;
    }

    if(!isset($_POST["obiettivo"]) || !isset($_POST["fk_id_materia"])){
        header("Location: index.php");
        return;
    }

    $obiettivo = $_POST["nomeMateria"];
    $id_materia = $_POST["id_materia"];
    
    $pdo = pdoConnection();

    if(!$pdo){
        header("Location: index.php");
        return;
    }

    $stmt = $pdo->prepare("UPDATE Materia SET obiettivo = :obiettivo WHERE id_materia = :id_materia AND fk_id_studente = :fk_id_studente");

    $stmt->bindParam(":obiettivo", $obiettivo, PDO::PARAM_STR);
    $stmt->bindParam(":id_materia", $id_materia, PDO::PARAM_INT);
    $stmt->bindParam(":fk_id_studente", $_SESSION["user"]["id"], PDO::PARAM_INT);

    $stmt->execute();
    header("Location: ../index.php");
    return;
?>