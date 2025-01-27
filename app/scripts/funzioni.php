<?php 

    function pdoConnection() {
        require_once("config.php");
        
        try {
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $DBusername, $DBpassword);
        } catch (PDOException $e) {
            return false;
        }

        return $pdo;
    }

?>