<?php 
// session_start();
// if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] == false){
    
// }
if(!empty($_FILES)){ 
    // Include the database configuration file 
    require("functions.inc.php");
     
    // File path configuration 
    $uploadDir = "uploads/"; 
    $fileName = basename($_FILES['file']['name']); 
    $destination_path = getcwd().DIRECTORY_SEPARATOR;
    $uploadFilePath = $destination_path.$uploadDir.$fileName; 
     
    // Upload file to server 
    if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath)){ 
        // Insert file information in the database 
        // $insert = $db->query("INSERT INTO files (file_name, uploaded_on) VALUES ('".$fileName."', NOW())"); 
        try {   
            $uploadFilePath = urlencode($uploadFilePath);
            $encodeFilePath = urlencode($uploadDir.$fileName);
            $stmt = executeRequete("INSERT IGNORE INTO `photo`( `url`) VALUES
                                                    ('$encodeFilePath')");
                            
            $stmt->execute();
            ob_clean();
            echo '{"status":"ok","url":"'.$encodeFilePath.'"}';
        }catch (Exception $e){
            // $pdo->rollback();
            echo "error";
            
            
            die("Error querying database: " . $e->getMessage());
        }
    } else{
        echo "error upload";
        

    }
} 
?>