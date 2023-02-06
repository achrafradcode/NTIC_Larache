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
}
    function parsePathToTag($path){
        switch ($path) {
            case "../admin/Dashboard_Inscription.php":
                # code...
                return "Membres_Menu";
                break;
            case "../admin/Dashboard_EmploiDuTemp.php":
                # code...
                return "EmploiDuTemp_Menu";
                break;
            case "../admin/Dashboard_TablauDesNote.php":
                # code...
                return "TablauDesNotes_Menu";
                break;
            case "../admin/Dashboard_AnnoncesEtArticles.php":
                # code...
                return "AnnoncesEtArticles_Menu";
                break;
            
            default:
                # code...
                return "Membres_Menu";
                break;
        }
    }

    function executeRequete($req)
    {
        global $pdo;
        
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