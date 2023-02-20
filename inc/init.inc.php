<?php
    //--------- BDD
    try {
        global $pdo;
        $pdo = new PDO("mysql:host=localhost;dbname=istadb", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Error connecting to database: " . $e->getMessage());
    }
    // $mysqli->set_charset("utf8");
    
    //--------- SESSION
    
    
    // //--------- CHEMIN
    // define("ADMIN","/admin/");
    
    // //--------- VARIABLES
    
    
    // //--------- AUTRES INCLUSIONS
    // require_once("functions.inc.php");

?>