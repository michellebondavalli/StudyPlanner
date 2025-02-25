<?php
    session_start();

    if(isset($_SESSION["user"])) {
        header("Location: ../index.php");
        return;
    }

    require_once("funzioni.php");
    
    //se l'utente prova ad accedere all'autenticazione senza aver effettuato il login viene reindirizzato alla pagina di login
    if(!isset($_POST["email"]) || !isset($_POST["pwd"])){
        $_SESSION["errorLoginAuth"] = "Username o password non inseriti";
        header("Location: ../login.php");
        return;
    }

    $email = $_POST["email"];
    $pw = $_POST["pwd"];

    //connessione al database e relativo controllo dell'esito
    $pdo = pdoConnection();
    if(!$pdo){
        $_SESSION["errorLoginAuth"] = "Connessione al DataBase fallita";
        header("Location: ../login.php");
        return;
    }

    /*query per l'autenticazione dell'utente*/
    $stmt = $pdo->prepare("SELECT * FROM Studente WHERE email = :email AND hashPassword = :pw");
    $stmt->bindValue(":email", $email, PDO::PARAM_STR);
    $stmt->bindValue(":pw", hash("sha256", $pw), PDO::PARAM_STR);

    //esecuzione della query
    if(!$stmt->execute()){
        $_SESSION["errorLoginAuth"] = "Query fallita";
        header("Location: ../login.php");
        return;
    }
    
    $row = $stmt->fetch();
    
    //controllo dell'esito
    if(!$row){
        $_SESSION["errorLoginAuth"] = "Username o password errati";
        header("Location: ../login.php");
        return;
    }

    //controllo se l'utente è stato verificato
    if(isset($row["token"])){
        $_SESSION["errorLoginAuth"] = "Non ti sei ancora verificato";
        header("Location: ../login.php");
        return;
    }

    //controllo se l'utente vuole essere ricordato
    //if($_POST["remember"] == "on"){
        $_SESSION = array();
        $_SESSION["user"] = [
            "id" => $row["ID"],
            "username" => explode("@", $row["email"])[0],
            "email" => $row["email"],
            "nome" => $row["nome"],
            "cognome" => $row["cognome"],
            "imgProfilo" => $row["imgProfilo"]
        ];
    //}

    header("Location: ../index.php");
    return;
?>