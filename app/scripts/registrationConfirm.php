<?php
    session_start();
    require_once("funzioni.php");

    if(isset($_SESSION["user"])) {
        header("Location: ../index.php");
        return;
    }

    /*controllo che i campi obbligatori siano inseriti*/
    if(!isset($_POST['nome']) || !isset($_POST['cognome']) || !isset($_POST['email']) || !isset($_POST['pwd']) || !isset($_POST['confPwd'])){
        $_SESSION["errorRegistrationConfirm"] = "Campi obbligatori non inseriti";
        header("Location: ../registrazione.php");
        return;
    }

    /*salvataggio dati*/
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $email = $_POST["email"];
    $password = $_POST["pwd"];
    $confermaPassword = $_POST["confPwd"];

    if($password != $confermaPassword) {
        $_SESSION["errorRegistrationConfirm"] = "Le password non corrispondono";
        header("Location: ../registrazione.php");
        return;
    }
    
    /*creazione PDO*/
    $pdo = pdoConnection();

    if(!$pdo){
        $_SESSION["errorRegistrationConfirm"] = "Connessione al DataBase fallita";
        header("Location: ../registrazione.php");
        return;
    }

    /*controllo email*/
    $stmt = $pdo->prepare("SELECT * FROM Studente WHERE email = :email");
    $stmt->bindValue(":email", $email, PDO::PARAM_STR);
    $res = $stmt->execute();
    $row = $stmt->fetchAll();

    if($row){
        $_SESSION["errorRegistrationConfirm"] = "Email già registrata";
        header("Location: ../registrazione.php");
        return;
    }


    /*inserimento utente nel database*/
    $stmt = $pdo->prepare("INSERT INTO Studente (email, nome, cognome, hashPassword, token) VALUES (:email, :nome, :cognome, :pwd, :token)");

    $stmt->bindValue(":email", $email, PDO::PARAM_STR);

    $stmt->bindValue(":nome", $nome, PDO::PARAM_STR);

    $stmt->bindValue(":cognome", $cognome, PDO::PARAM_STR);

    $hashPassword = hash("sha256", $password);
    $stmt->bindValue(":pwd", $hashPassword, PDO::PARAM_STR);

    $hashToken = hash("sha256", rand());
    $stmt->bindValue(":token", $hashToken, PDO::PARAM_STR);

    $res = $stmt->execute();

    if(!$res){
        $_SESSION["errorRegistrationConfirm"] = "Registrazione fallita";
        header("Location: ../registrazione.php");
        return;
    }

    $corpo =    "Benvenuto/a $username! <br>" . 
                "Per completare la registrazione, clicca sul link sottostante: <br>" .
                "http://studyplanner.altervista.org/app/scripts/verificaToken.php?token=$hashToken <br><br>";

    $headers =  "From: noreply@studyplanner.it" . "\r\n" .
                "MIME-Version: 1.0" . "\r\n" .
                "Content-type: text/html; charset=UTF-8";

    if(mail($email, "Verifica", $corpo, $headers)){
        $_SESSION["successRegistration"] = "Invio mail avvenuto con successo";
        header("Location: ../login.php");
        return;
    } else {
        $_SESSION["errorRegistrationConfirm"] = "Invio mail fallito";
        header("Location: ../registrazione.php");
        return;
    }
?>