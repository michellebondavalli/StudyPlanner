<?php
    session_start();
    require_once('funzioni.php');

    if(!isset($_SESSION["user"])){
        header("Location: ../login.php");
        exit();
    }

    if(!isset($_GET["page"])){
        $_SESSION["actualPage"] = "sidebar-home";
    } else {
        $_SESSION["actualPage"] = $_GET["page"];
    }
    
    exit();
?>