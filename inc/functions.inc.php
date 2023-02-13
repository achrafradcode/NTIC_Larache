<?php
error_reporting(E_ERROR | E_PARSE);
if (isset($_POST["function_name"])) {
    
    if ($_POST["function_name"] == "Membres_Menu") {
        $_SESSION["currentPath"] = "../admin/Dashboard_Inscription.php";
        echo "{\"menu\":\"Membres_Menu\",\"url\":\"../admin/Dashboard_Inscription.php\"}";
    }
    if ($_POST["function_name"] == "EmploiDuTemp_Menu") {
        $_SESSION["currentPath"] = "../admin/Dashboard_EmploiDuTemp.php";
        echo "{\"menu\":\"EmploiDuTemp_Menu\",\"url\":\"../admin/Dashboard_EmploiDuTemp.php\"}";
    }
    if ($_POST["function_name"] == "TablauDesNotes_Menu") {
        $_SESSION["currentPath"] = "../admin/Dashboard_TablauDesNote.php";
        echo "{\"menu\":\"TablauDesNotes_Menu\",\"url\":\"../admin/Dashboard_TablauDesNote.php\"}";
    }
    if ($_POST["function_name"] == "AnnoncesEtArticles_Menu") {
        $_SESSION["currentPath"] = "../admin/Dashboard_AnnoncesEtArticles.php";
        echo "{\"menu\":\"AnnoncesEtArticles_Menu\",\"url\":\"../admin/Dashboard_AnnoncesEtArticles.php\"}";
    }
    if ($_POST["function_name"] == "executeRequete") {
        $stmt = executeRequete($_POST["requet"]);
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($array);
    }
}
    function parsePathToTag($url){
        $path = substr($url,strrpos($url,"/"));
        switch ($path) {
            case "/Dashboard_Inscription.php":
                # code...
                return "Membres_Menu";
                break;
            case "/Dashboard_EmploiDuTemp.php":
                # code...
                return "EmploiDuTemp_Menu";
                break;
            case "/Dashboard_TablauDesNote.php":
                # code...
                return "TablauDesNotes_Menu";
                break;
            case "/Dashboard_AnnoncesEtArticles.php":
                # code...
                return "AnnoncesEtArticles_Menu";
                break;
            
            default:
                # code...
                return "";
                break;
        }
    }
    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
    function getCurrentURL(){
        // Program to display complete URL
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
        $link = "https";
        else $link = "http";

        // Here append the common URL
        // characters.
        $link .= "://";

        // Append the host(domain name,
        // ip) to the URL.
        $link .= $_SERVER['HTTP_HOST'];

        // Append the requested resource
        // location to the URL
        $link .= $_SERVER['PHP_SELF'];

        // Display the link
        return $link;
    }

    function executeRequete($req)
    {
        require_once("init.inc.php");
        
        
        try {
            $stmt = $pdo->prepare($req);
        } catch (PDOException $e) {
            die("Error querying database: " . $e->getMessage());
        }
        return $stmt; // 
    }
     
    function debug($var, $mode = 1)
    {
        echo '<div style="background: orange; padding: 5px; float: right; clear: both; ">';
        $trace = debug_backtrace();
        $trace = array_shift($trace);
        echo 'Debug demandé dans le fichier : $trace[file] à la ligne $trace[line].';
        if($mode === 1)
        {
            echo '<pre>'; print_r($var); echo '</pre>';
        }
        else
        {
            echo '<pre>'; var_dump($var); echo '</pre>';
        }
        echo '</div>';
    }
?>