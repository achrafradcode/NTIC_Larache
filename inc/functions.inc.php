<?php
error_reporting(E_ERROR | E_PARSE);
if (isset($_POST["function_name"])) {
    
    if ($_POST["function_name"] == "Tableau_de_bord") {
        $_SESSION["currentPath"] = "../admin/Dashboard.php";
        echo "{\"menu\":\"Tableau_de_bord\",\"url\":\"../admin/Dashboard.php\"}";
    }
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
    if ($_POST["function_name"] == "Annonces_Menu") {
        $_SESSION["currentPath"] = "../admin/Dashboard_Annonces.php";
        echo "{\"menu\":\"Annonces_Menu\",\"url\":\"../admin/Dashboard_Annonces.php\"}";
    }
    if ($_POST["function_name"] == "Contact_Menu") {
        $_SESSION["currentPath"] = "../admin/Dashboard_Contact.php";
        echo "{\"menu\":\"Contact_Menu\",\"url\":\"../admin/Dashboard_Contact.php\"}";
    }
    if ($_POST["function_name"] == "disconnect") {
        session_start();
        $_SESSION["logged_in"] = false;
    }
    if ($_POST["function_name"] == "executeRequete") {
        $stmt = executeRequete($_POST["requet"]);
        $stmt->execute();
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($array);
    }
    if ($_POST["function_name"] == "AddLogs") {
        session_start();
        $Category = $_POST["Category"];
        $Event = $_POST["Event"];
        try {
            $currentMemebrId = json_decode($_SESSION["userinfo"],true)[0]['IdMembres'];
            $stmt = executeRequete("INSERT INTO 
            `logs`( `Time`, `Category`, `MembreId`, `Event`) 
            VALUES (curdate(),'$Category','$currentMemebrId','$Event')");
            $stmt->execute();

            
        } catch (Exception $e) {
            // $pdo->rollback();
            // $result["error"] = ["msg"=>"error ??","msgDet"=>"verify les inputs entrer ou contacter le support .[".$e->getMessage()."]"];
            die("Error querying database: " . $e->getMessage());
        }
    }
    if ($_POST["function_name"] == "executeRequeteResponse") {
        $sql = $_POST["requet"];
        $msgSuccess = $_POST["msgSuccess"];
        $msgFaild = $_POST["msgFaild"];
        try {
            $stmt = executeRequete($sql);
            
            
            // $pdo->beginTransaction();
            
            // $pdo->commit();
            $stmt->execute();
            
            $result["success"] = ["msg"=>"successfully","msgDet"=>$msgSuccess];
            echo "success";
        }catch (Exception $e){
            // $pdo->rollback();
            echo "error";
            $result["error"] = ["msg"=>"error ??","msgDet"=>$msgFaild];
            
            die("Error querying database: " . $e->getMessage());
        }
    }
    if ($_POST["function_name"] == "executeRequeteResponse2") {
        $sql = $_POST["requet"];
        $msgSuccess = $_POST["msgSuccess"];
        $msgFaild = $_POST["msgFaild"];
        try {
            $stmt = executeRequete($sql);
            
            
            // $pdo->beginTransaction();
            
            // $pdo->commit();
            $stmt->execute();
            
            $result["success"] = ["msg"=>"successfully","msgDet"=>$msgSuccess];
            $lastid = $pdo->lastInsertId();
            echo '{"state":"success","lastId":'.$lastid.'}';
        }catch (Exception $e){
            // $pdo->rollback();
            echo '{"state":"error"}';
            $result["error"] = ["msg"=>"error ??","msgDet"=>$msgFaild];
            
            die("Error querying database: " . $e->getMessage());
        }
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
            case "/Dashboard.php":
                # code...
                return "Tableau_de_bord";
                break;
            case "/Dashboard_Annonces.php":
                # code...
                return "Annonces_Menu";
                break;
            case "/Dashboard_Contact.php":
                # code...
                return "Contact_Menu";
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
        require("init.inc.php");
        
        
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
    function upload_File($inputFile){
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES[$inputFile]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if file already exists
        if (file_exists($target_file)) {
            $msg = "Sorry, file already exists.";
            return $target_file;
        } 
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES[$inputFile]["tmp_name"]);
            if($check !== false) {
                $msg = "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $msg = "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $msg = "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES[$inputFile]["tmp_name"], $target_file)) {
            $msg = "The file ". htmlspecialchars( basename( $_FILES[$inputFile]["name"])). " has been uploaded.";
            } else {
            $msg = "Sorry, there was an error uploading your file.";
            }
        }
        return $target_file;
    }
?>