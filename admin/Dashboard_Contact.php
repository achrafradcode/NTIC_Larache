<?php
    session_start();
    if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] == false){
        header("Location: ../admin/LogIn.php");
    }else{
        require_once("../inc/functions.inc.php");
        if(isset($_POST["titre_Annonces"])){
            try {
                $titre_Annonces = $_POST["titre_Annonces"];
                $Membre_IdMembres = $_POST["Membre_IdMembres"];
                $stmt2 = executeRequete("SELECT * FROM annonces;");
                $stmt2->execute();
                $index = $stmt2->rowCount()+1;
                
                $data = [ [
                    "$titre_Annonces",  
                "$Membre_IdMembres"]];
                
        
                $sql = "INSERT INTO annonces (`idAnnonces`, 
                                            `titre_Annonces` ,
                                            `date_de_publication` ,
                                            `Membre_IdMembres`) 
                                            VALUES 
                                            (LAST_INSERT_ID(), 
                                            ?,
                                            curdate(),
                                            ?)";
                $stmt = executeRequete($sql);
        
                
                $pdo->beginTransaction();
                foreach ($data as $row)
                {
                    $stmt->execute($row);
                }
                $pdo->commit();
                $result["success"] = ["msg"=>"successfully","msgDet"=>"Annonce ajouter !"];
                
            }catch (Exception $e){
                $pdo->rollback();
                $result["error"] = ["msg"=>"error ??","msgDet"=>"verify les inputs entrer ou contacter le support .[".$e->getMessage()."]"];
                // die("Error querying database: " . $e->getMessage());
            }
        }
        if(isset($_POST["idArticle"])){
            try {
                $idArticle = $_POST["idArticle"];
                $titre_Annonces = $_POST["Contenu"];
                $Date_de_publication = $_POST["Date_de_publication"];
                $Membre_IdMembres = $_POST["Membre_IdMembres"];
                
                
                $data = [ [
                    "$titre_Annonces",  
                    "$Membre_IdMembres",
                    "$Date_de_publication",
                    $idArticle
                ]];
                
        
                $sql = "UPDATE annonces SET 
                                            titre_Annonces=? ,
                                            Membre_IdMembres=? ,
                                            date_de_publication=?
                                            WHERE 
                                            idAnnonces=?";
                $stmt = executeRequete($sql);
        
                
                $pdo->beginTransaction();
                foreach ($data as $row)
                {
                    $stmt->execute($row);
                }
                $pdo->commit();
                $result["success"] = ["msg"=>"successfully","msgDet"=>"Annonce a été enregistrer !"];
                
            }catch (Exception $e){
                $pdo->rollback();
                $result["error"] = ["msg"=>"error ??","msgDet"=>"verify les inputs entrer ou contacter le support .[".$e->getMessage()."]"];
                // die("Error querying database: " . $e->getMessage());
            }
        }
    }
?>
<!doctype html>
<html lang="en">

<head>
    <title>ISTA Larache - Annonces</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/inline/ckeditor.js"></script>
    <script src="../inc/js/functions.inc.js"></script>
    <link rel="stylesheet" href="../inc/css/admin_style.css">

    
    
    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <style>
        .background {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            margin: 0;
            padding: 0;
            z-index: -1;
            top: 0;
            bottom: 0;
        }

        .background img {

            width: 100%;
            height: 100%;

            object-fit: cover;
            object-position: left;

        }

        .loginCol {
            min-width: 260px;
            max-width: 450px;
        }

        .LoginContainer {
            background-color: white;
            border-radius: 20px;
            min-width: 260px;
            max-width: 450px;
        }

        .LoginIcon {
            min-height: 40px;
            min-width: 40px;
            height: 60px !important;

        }

        .shadow-1 {
            box-shadow: 10px 10px 9px rgba(0, 0, 0, 0.25);
        }

        .form-control {
            display: block;
            width: 100%;
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #0000001C;
            background-clip: padding-box;
            border: 0px solid #ced4da;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .MenuIcon {
            width: 20px;
            height: 20px;
            max-width: 20px;
            max-height: 20px;

        }

        .MenuItem {
            height: 48px;
        }

        .Header {
            height: 68px;
        }

        .QuickTapButton {
            width: 120px;
            height: 120px;
        }

        .MenuItem.btn-info[id="active"] {

            background-color: #D9D9D9 !important;
        }

        .MenuItem.btn-info:hover {

            background-color: #cacaca1e !important;
        }

        .MenuItem.btn-info[id="active"]:hover {

            background-color: #cacaca !important;
        }

        .MenuItem.btn-info {
            border: none;
            background-color: #cacaca00 !important;
        }

        .MenuItem[id="active"] {
            box-shadow: 0px 4px 5px rgba(0, 0, 0, 0.1);
            color: #0354B4 !important;

        }

        .QuickTapButton[id="active"] {
            box-shadow: 0px 4px 5px rgba(0, 0, 0, 0.1);
            background-color: #D9D9D9 !important;
            color: #0354B4 !important;
            border: none;


        }

        .QuickTapButton[id="active"]:hover {
            background-color: #cacaca !important;
            color: #0354B4 !important;



        }

        .btn-info {
            background-color: #C5CFC5 !important;
            border: none;
        }

        .bg-info {
            background-color: #D9D9D9 !important;
        }

        .bg-success {

            background-color: #2B7D2E !important;
        }

        .bg-primary {

            background-color: #0354B4 !important;
        }

        html,
        body {
            height: 100%;
        }
        .form-select {
            display: block;
            width: 100%;
            padding: .375rem 2.25rem .375rem .75rem;
                padding-top: 0.375rem;
                padding-bottom: 0.375rem;
                padding-left: 0.75rem;
            -moz-padding-start: calc(0.75rem - 3px);
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #0000000a;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right .75rem center;
            background-size: 16px 12px;
            border: 1px solid #979797;
            border-radius: .375rem;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        .form-control {
            display: block;
            width: 100%;
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #0000000a;
            background-clip: padding-box;
            border: 1px solid #979797;
                
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 5px;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }
        .ActionMembresContainer button{
            width: 1cm;
            height: 1cm;
        }
        .PopupBackground{
            background-color:rgba(0, 0, 0, 0.55);
            
        }
        #wrapText{
            white-space: nowrap;
         overflow: hidden;
         display: block;
         text-overflow: ellipsis;
         max-width: 200px;
         
         
         
         
         
        }
        .ck-editor {
                /* editing area */
                width: 100%;
            }
        .ck-editor__editable[role="textbox"] {
                /* editing area */
                min-height: 300px;
                width: 100%;
            }
            .ck-content .image {
                /* block images */
                max-width: 80%;
                margin: 20px auto;
            }
    </style>
</head>

<body>
<div class="position-absolute  w-50 start-50 translate-middle p-0 m-0 " style="top: 50px;">
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </symbol>
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
            </svg>
            <?php
                foreach($result as $key => $value){
                    if($key == "success"){       
            ?>
                <div class="alert alert-success  alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <strong><?php echo $value["msg"]?></strong> <?php echo $value["msgDet"]?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>                              
                <?php
                    }
                    if($key == "error"){
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <strong><?php echo $value["msg"]?></strong> <?php echo $value["msgDet"]?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    }
                ?>
            <?php
                }
            ?>
    </div>
 <!-- Modal YesOrNo -->
 <div class="YesOrNoConfirmation modal fade " id="exampleModal2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Supprimer utilisateur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modelbody">
      </div> 
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Non</button>
        <button type="button" id="ConfirmationOk" class="btn btn-danger">Oui</button>
      </div>
    </div>
  </div>
</div>
<script>
    function confirmChanges(model,title,contenu,callback){
        if(model != null)$(model).modal('hide');
        $(".YesOrNoConfirmation").unbind();
        $(".YesOrNoConfirmation").find('button[id="ConfirmationOk"]').unbind();
        $(".YesOrNoConfirmation").on("hide.bs.modal",()=>{
            if(model != null)$(model).modal('show');
        });
        $(".YesOrNoConfirmation").modal('show');
        $(".YesOrNoConfirmation").find('#exampleModalLabel').text(title);
        if(contenu != ""){
            $(".YesOrNoConfirmation").find('#modelbody').show();
            $(".YesOrNoConfirmation").find('#modelbody').html(contenu);
        }else{
            $(".YesOrNoConfirmation").find('#modelbody').hide();
        }
        $(".YesOrNoConfirmation").find('button[id="ConfirmationOk"]').on("click",()=>{
            $(".YesOrNoConfirmation").modal('hide');
            callback();
        });
    }
</script>
     <!-- Vertically centered modal -->
    <!-- Modal -->
<div class="DeleteConfirmation modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Supprimer message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Voulez-vous vraiment supprimer cet message ?<strong> numero : [<span class="UserName"></span>]</strong>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" 
         data-bs-dismiss="modal">Close</button>
        <button type="button" id="DeleteConfirmationOk"  class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>


    <div class="row m-0 h-100">
        
        <!--Side Menu-->
        <?php require_once("../admin/inc/sidemenu.inc.php")?>    
            
        <div class="col-10 ps-5 pt-2 pe-5">
            
            <!--QUICK TAPS-->
            
            <div class="contentPage  mt-5 ms-3 me-3">
                <!--Logs-->
                <div class="TapPanel  ">
                    <div class="TapTitle float-start fw-bold text-black-50">
                      <h4>Messages</h4>
                    </div>
                    <hr> 
                    <div class="table-responsive-md">
                        <table class="table table-striped
                      table-hover	
                      table-borderless
                      table-light
                      align-middle">
                            <thead class="table-light">
                                <!-- <caption>Table Name</caption> -->
                                <tr>
                                    <th>Id</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th></th>
                                    
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                    
                                    $stmt = executeRequete("SELECT * FROM message;");
                                    $stmt->execute();
                                    $index = 0;

                                    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row){
                                        $index = $index + 1;
                                ?>
                                <tr class="table-light">
                                    <td scope="row"><?php echo $index;?></td>
                                    <td><span id="wrapText"><?php echo $row["nom"];?></span> </td>
                                    <td><?php echo $row['mail'];?></td>
                                    <td colspan="2"><?php echo $row['contenu'];?></td>
                                    <td>
                                            <div class="d-flex flex-row justify-content-end ActionMembresContainer">
                                                
                                                <div class="d-grid gap-2 m-1 ">
                                                    <button type="button" name="" id="Remove" class="btn p-1 btn-primary "><img src="/imgs/Remove_TrashIcon.png" class="img-fluid " alt=""></button>
                                                </div>
                                                <div class="d-grid gap-2 m-1">
                                                    <button type="button" name="" id="Modifier" class="btn p-1 btn-primary "><img src="/imgs/Edit_Icon.png" class="img-fluid  " alt=""></button>
                                                </div>
                                            </div>
                                    </td>
                                </tr>
                                <?php } ?>
                                <script type="text/javascript">
                                    
                                                
                                    $(".TapPanel").find('button[id="Modifier"]').on("click",fetchUser);
                                    function fetchUser(){
                                        window.selected = {
                                            'index':$(this).parent().parent().parent().parent().find("td:nth-child(1)").text(),
                                            "titre_de_l'actualité":$(this).parent().parent().parent().parent().find("td:nth-child(2)").text(),
                                            'date_de_publication':$(this).parent().parent().parent().parent().find("td:nth-child(3)").text(),
                                            'contenu':$(this).parent().parent().parent().parent().find("td:nth-child(4)").text()
                                        };

                                        $(".PopupBackground").modal("show");

                                        $.post("../inc/functions.inc.php", { function_name: "executeRequete",requet:"SELECT * from message where contenu='"+window.selected["contenu"]+"';" }, function(d) {
                                            // Handle the response here
                                            console.log(data);
                                            var data = JSON.parse(d);
                                            window.selected = data;
                                            console.log(window.selected);
                                            parseSelectionData();
                                            
                                        });
                                    }
                                    $(".TapPanel").find('button[id="Remove"]').on("click",deleteAnnonces);
                                    // $(".TapPanel").find('button[id="SeePass"]').on("click",seePassUser);
                                    $(".DeleteConfirmation").find('button[id="DeleteConfirmationOk"]').on("click",confirmDelete);

                                    function deleteAnnonces(){
                                        window.selected = {
                                            'index':$(this).parent().parent().parent().parent().find("td:nth-child(1)").text(),
                                            "titre_de_l'actualité":$(this).parent().parent().parent().parent().find("td:nth-child(2)").text(),
                                            'date_de_publication':$(this).parent().parent().parent().parent().find("td:nth-child(3)").text(),
                                            'contenu':$(this).parent().parent().parent().parent().find("td:nth-child(4)").text()
                                        };
                                        
                                        window.container = $(this).parent().parent().parent().parent()[0];
                                        $.post("../inc/functions.inc.php", { function_name: "executeRequete",requet:"SELECT * from message where contenu='"+window.selected["contenu"]+"';" }, function(d) {
                                            // Handle the response here
                                            console.log(data);
                                            var data = JSON.parse(d);
                                            var index = window.selected.index; 
                                            window.selected = data;
                                            console.log(window.selected);
                                            
                                            $(".DeleteConfirmation").modal('show');
                                            $(".DeleteConfirmation").find(".UserName").text(index);
                                            
                                        });
                                    }
                                    
                                    function confirmDelete(){
                                        $.post("../inc/functions.inc.php", { function_name: "executeRequete",msgSuccess:"Message supprimé avec succès",msgFaild:"Une erreur s'est produite",requet:"DELETE from message where IdMessage='"+window.selected[0].IdMessage +"';" }, function(d) {
                                            // Handle the response here
                                            $(".DeleteConfirmation").modal('hide');
                                            
                                            window.container.remove();
                                            
                                            // setTimeout(location.reload(),1000);
                                            if(d=="error"){
                                                showToast({
                                                    type:"error",
                                                    autoDismiss: true,
                                                    message:"Une erreur s'est produite !"
                                                });
                                            }else{
                                                showToast({
                                                    type:"success",
                                                    autoDismiss: true,
                                                    message:"Annonce supprimé avec succès !"
                                                });

                                            }
                                        });
                                    }

                                    
                                    
                                </script>
                                

                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- Modal YesOrNo -->
 <div class="PopupBackground modal fade " id="exampleModal2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <form id="form" method="POST">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title col-2 w-100 ps-3 p-4 m-0 text-white    " id="exampleModalLabel"><b>Annonce Edit</b></h5>
        
      </div>
      <div class="modal-body" id="modelbody">
                <div class="d-flex flex-column justify-content-start p-0">
                    
                    <div class="col-10 pt-5 ps-4 pe-4 pb-5 w-100">
                        <table class="w-100">
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            
                        
                            <tr>
                                <td>
                                    <label for="" class="form-label">Nom de l'editeur</label>
                                </td>
                                <td colspan="2">
                                    <div class="row">
                                        <select class="form-select form-select-lg" name="Membre_IdMembres"  id="GroupsUser">
                                        <?php
                                            
                                            $stmt = executeRequete("SELECT * FROM membre;");
                                            $stmt->execute();
                                            $index = 0;

                                            foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row){
                                                $index = $index + 1;
                                        ?>
                                            <option value="<?php echo $row["IdMembres"];?>"><?php echo $row["nom_personnel"];?></option>
                                            <?php } ?>
                                            
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="" class="form-label">Date de publication</label>
                                </td>
                                <td colspan="2">
                                    <div class="row">
                                        <div class="col-6    p-0 m-0">
                                            <input type="date"
                                            class="form-control rounded-start rounded-0 m-0 " disabled name="old_Date_de_publication" id="old_Date_de_publication" aria-describedby="helpId" placeholder="">
                                        </div>
                                        <div class="col-6    p-0 m-0">
                                            <input type="date"
                                            class="form-control rounded-end rounded-0  m-0 " name="Date_de_publication" id="Date_de_publication" aria-describedby="helpId" placeholder="">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="" class="form-label">Contenu</label>
                                </td>
                                <td colspan="2">
                                    <!-- <input type="text"
                                    class="form-control w-100" name="" id="" aria-describedby="helpId" placeholder=""> -->
                                    <div class="row">
                                        <textarea class="form-control" name="Contenu" id="Contenu" rows="3"></textarea>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        
                        

                        
                        
                    </div>
                </div>
            </div> 
            <div class="modal-footer">
                <input name="" id="quit" class="btn btn-info" type="button" value="Quiter">
                <input name="" id="r" class="btn btn-primary" type="button" value="Reset">
                <input name="idArticle" id="idArticle" style="display:none;" type="text" value="">
                <input name="Enregistrer" id="Enregistrer" class="btn btn-success" type="button" value="Enregistrer">
            </div>
    </div>
  </div>
            </form>
</div>
    <script type="text/javascript">
                    
                                
    
        $(".PopupBackground").find("#r").on("click",()=>{
            parseSelectionData();
        });
        $(".PopupBackground").find("#Enregistrer").on("click",()=>{
            var inputsFilled = $(".PopupBackground").find("input,select").filter(function () {
                var l = $.trim($(this).val());
                if(l.length == 0 && $(this).attr("name")=="Date_de_publication"){
                    console.log($(this).attr("name")+":"+l +" IGNORE");
                    $(this).val($(".PopupBackground").find("#old_Date_de_publication").val());
                    
                }else if( $(this).attr("name")=="old_Date_de_publication"){
                    return false;
                }
                l = $.trim($(this).val());
                
                console.log($(this).attr("name")+":"+l + " :: "+ (l.length == 0));
                return l.length == 0;
            }).length == 0;
            console.log(inputsFilled);
            
            if(inputsFilled){
                $(".PopupBackground").find("#form").submit();
                // $(".TapPanel").find("#ajoutUser").prop("disabled",true);
            
                // showToast({
                //     type:"success",
                //     autoDismiss: true,
                //     message:"Le Utilisateur a ete Ajouter avec success !!"
                // });
            }else{
                showToast({
                    type:"error",
                    autoDismiss: true,
                    message:"Verify que tout les chemains corrects !!"
                });
                
            }
        });
        $(".PopupBackground").find("#quit").on("click",function(){
            $(".PopupBackground").modal("hide");
        });
        function parseSelectionData(){
            $PopupBackground = $(".PopupBackground");
            console.log($PopupBackground.find("#form")[0]);
            $PopupBackground.find("#form")[0].reset();
    
            $PopupBackground.find("#idArticle").val(window.selected[0]['idAnnonces']);
            $PopupBackground.find("#Contenu").val(window.selected[0]['titre_Annonces']);
            $PopupBackground.find("#old_Date_de_publication").val(window.selected[0]['date_de_publication']);
            $PopupBackground.find("#old_NomDelediteur").val(window.selected[0]["Membre_IdMembres"]);
            
            
    
            // $PopupBackground.find("#GroundStagiaires").val(window.selected[0].nom_personnel);
            // $PopupBackground.find("#SecteurProfessionnel").val(window.selected[0].nom_personnel);

        }
    </script>
    <!-- <div style="display: none;" class="position-absolute  w-100 h-100 top-50 start-50 translate-middle p-0 m-0 PopupBackground" >
        <div class="container-lg  position-absolute shadow-1  top-50 start-50 translate-middle overflow-hidden bg-white rounded-4 p-0">
            

        </div>
    </div> -->


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
</body>

</html>