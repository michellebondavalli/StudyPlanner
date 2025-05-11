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

    $stmt = $pdo->prepare("SELECT * FROM Studente WHERE ID = :id");
    $stmt->bindValue(":id", $_SESSION["user"]["id"], PDO::PARAM_INT);
    if($stmt->execute()){
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result["ID"] != $_SESSION["user"]["id"]){
            header("Location: logout.php");
            return;
        }
    }

    $stmt = $pdo->prepare("DELETE FROM OraLezione WHERE fk_id_studente = :fk_id_studente");
    $stmt->bindValue(":fk_id_studente", $_SESSION["user"]["id"], PDO::PARAM_INT);
    if($stmt->execute()){
        echo "oraLezione OK\n";
    }

    $stmt = $pdo->prepare("DELETE FROM Verifica WHERE fk_id_studente = :fk_id_studente");
    $stmt->bindValue(":fk_id_studente", $_SESSION["user"]["id"], PDO::PARAM_INT);
    if($stmt->execute()){
        echo "Lezione OK\n";
    }

    // Elimina le righe dalla tabella Materia che non sono più collegate a nessuna verifica
    $stmt = $pdo->prepare("DELETE FROM Materia WHERE id NOT IN (SELECT fk_id_materia FROM Verifica)");
    if($stmt->execute()){
        echo "Materia OK\n";
    }

    $stmt = $pdo->prepare("DELETE FROM Verifica WHERE fk_id_studente = :fk_id_studente");
    $stmt->bindValue(":fk_id_studente", $_SESSION["user"]["id"], PDO::PARAM_INT);
    if($stmt->execute()){
        echo "verifica OK\n";
    }

    $stmt = $pdo->prepare("DELETE FROM ElementoLista WHERE fk_id_studente = :fk_id_studente");
    $stmt->bindValue(":fk_id_studente", $_SESSION["user"]["id"], PDO::PARAM_INT);
    if($stmt->execute()){
        echo "lista OK\n";
    }

    $stmt = $pdo->prepare("DELETE FROM Impegno WHERE fk_id_studente = :fk_id_studente");
    $stmt->bindValue(":fk_id_studente", $_SESSION["user"]["id"], PDO::PARAM_INT);
    if($stmt->execute()){
        echo "impegni OK\n";
    }

    $stmt = $pdo->prepare("DELETE FROM Studente WHERE ID = :id");
    $stmt->bindValue(":id", $_SESSION["user"]["id"], PDO::PARAM_INT);
    if($stmt->execute()){
        echo "delete OK\n";
    }

    $filename = "../images/usersImg/" . $_SESSION["user"]["id"] . "." . $_SESSION["user"]["imgProfilo"];
    if(file_exists($filename)){
        if(unlink($filename)){
            echo "imgDeleted OK";
        } else {
            echo "imgDeleted NOK";
        }
    } else {
        echo "imgDeleted NOTEXISTS: " . $filename;
    }

    header("Location: logout.php");
    exit();
?>