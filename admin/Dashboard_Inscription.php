<?php
    require_once("../inc/functions.inc.php");
    $result = [];

    
    session_start();
    if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] == false){
        header("Location: ../admin/LogIn.php");
    }
    if(isset($_POST["TypeDahiasion"])){
        $TypeDahiasion = $_POST["TypeDahiasion"];
        $Prenom = $_POST["Prenom"];
        $Nom = $_POST["Nom"];
        $Adresse = $_POST["Adresse"];
        $CodePostal = $_POST["CodePostal"];
        $Nationalite = $_POST["Nationalite"];
        $Telephone = $_POST["Telephone"];
        $Sexe = $_POST["Sexe"];
        $DateDeNaissance = $_POST["DateDeNaissance"];
        $CarteNationel = $_POST["CarteNationel"];
        $Email = $_POST["Email"];
        $GroupDeStagiaires = $_POST["GroupDeStagiaires"];
        $SecteurProfessionnel = $_POST["SecteurProfessionnel"];
        $DataDinscription = $_POST["DataDinscription"];
        $password = randomPassword();
        $data = [ ["$password", 
        "$TypeDahiasion", 
        "$Nom", 
        "$Prenom", 
        "$DateDeNaissance", 
        "$DataDinscription", 
        "$Email", 
        "$Adresse", 
        "$Telephone", 
        "$Nationalite", 
        "$Sexe", 
        "$SecteurProfessionnel", 
        "$CarteNationel", 
        "$CodePostal"]];
        

        $sql = "INSERT INTO membre (`password`, 
                                    `type_d'adhésion`, 
                                    `nom_personnel`, 
                                    `prenom`, 
                                    `date_de_naissance`, 
                                    `date_d'inscription`, 
                                    `email`, 
                                    `adresse`, 
                                    `numéro_de_téléphone`, 
                                    `nationalité`, 
                                    `sexe`, 
                                    `SecteurProfessionnel`, 
                                    `numéro_de_carte`, 
                                    `CodePostal`) 
                                    VALUES 
                                    (?, 
                                    ?, 
                                    ?, 
                                    ?, 
                                    ?, 
                                    ?, 
                                    ?, 
                                    ?, 
                                    ?, 
                                    ?, 
                                    ?, 
                                    ?, 
                                    ?, 
                                    ?)";
        try {
            $stmt = executeRequete($sql);
            
            
            $pdo->beginTransaction();
            foreach ($data as $row)
            {
                $stmt->execute($row);
            }
            $pdo->commit();
            $result["success"] = ["msg"=>"successfully","msgDet"=>"utilisateur ajouter !"];
            
        }catch (Exception $e){
            $pdo->rollback();
            $result["error"] = ["msg"=>"error ??","msgDet"=>"verify les inputs entrer ou contacter le support ."];
            die("Error querying database: " . $e->getMessage());
        }
        
        try {
            $stmt = executeRequete("SELECT * FROM membre where nom_personnel='$Nom'");
            $idMembre = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]["IdMembres"];
        }catch (Exception $e){
            $pdo->rollback();
            $result["error"] = ["msg"=>"error ??","msgDet"=>"verify les inputs entrer ou contacter le support ."];
            die("Error querying database: " . $e->getMessage());
        }
        
        $data = [ [$idMembre, 
        
        "$GroupDeStagiaires"]];

        $sql = "INSERT INTO enseigner (`Membre_IdMembres`, 
                                    `Groupe_Stagiaires_code_groupe_Groupe`
                                    ) 
                                    VALUES 
                                    (?, 
                                    ?
                                    )";
        try {
            $stmt = executeRequete($sql);
    
            
            $pdo->beginTransaction();
            foreach ($data as $row)
            {
                $stmt->execute($row);
            }
            $pdo->commit();
            $result["success"] = ["msg"=>"successfully","msgDet"=>"utilisateur ajouter !"];
            //ADD LOGS
            try {
                $currentMemebrId = json_decode($_SESSION["userinfo"],true)[0]['IdMembres'];
                $stmt = executeRequete("INSERT INTO 
                `logs`( `Time`, `Category`, `MembreId`, `Event`) 
                VALUES (curdate(),'Membres','$currentMemebrId','le membre <b>{$newNom}</b> a été ajouter')");
                $stmt->execute();

                
            } catch (Exception $e) {
                // $pdo->rollback();
                // $result["error"] = ["msg"=>"error ??","msgDet"=>"verify les inputs entrer ou contacter le support .[".$e->getMessage()."]"];
                die("Error querying database: " . $e->getMessage());
            }
        }catch (Exception $e){
            $pdo->rollback();
            $result["error"] = ["msg"=>"error ??","msgDet"=>"verify les inputs entrer ou contacter le support ."];
            die("Error querying database: " . $e->getMessage());
        }
    }
    if (isset($_POST["IdMembres"])) {
        try {
            $IdMembres = $_POST["IdMembres"];
            $newPrenom = $_POST["newPrenom"];
            $newNom = $_POST["newNom"];
            $newAdresse = $_POST["newAdresse"];
            $newNationalite = $_POST["newNationalite"];
            $newTelephone = $_POST["newTelephone"];
            $Sexe = $_POST["Sexe"];
            $DateDeNaissance = $_POST["DateDeNaissance"];
            $newCodePostal = $_POST["newCodePostal"];
            $newEmail = $_POST["newEmail"];
            $GroundStagiaires = $_POST["GroundStagiaires"];
            $SecteurProfessionnel = $_POST["SecteurProfessionnel"];
            $DateDinscription = $_POST["DateDinscription"];


            try {
                $stmt = executeRequete("UPDATE `enseigner` SET `Groupe_Stagiaires_code_groupe_Groupe`='$GroundStagiaires' WHERE Membre_IdMembres='$IdMembres'");
                $stmt->execute();

                
            } catch (Exception $e) {
                // $pdo->rollback();
                // $result["error"] = ["msg"=>"error ??","msgDet"=>"verify les inputs entrer ou contacter le support .[".$e->getMessage()."]"];
                die("Error querying database: " . $e->getMessage());
            }
            




            $data = [[
                $newPrenom,
                $newNom,
                $newAdresse,
                $newNationalite,
                $newTelephone,
                $Sexe,
                $DateDeNaissance,
                $newCodePostal,
                $newEmail,
                $SecteurProfessionnel,
                $DateDinscription,
                $IdMembres
            ]];


            $sql = "UPDATE `membre` SET 
            `prenom`=?,
            `nom_personnel`=?,
            `adresse`=?,
            `nationalité`=?,
            `numéro_de_téléphone`=?,
            `sexe`=?,
            `date_de_naissance`=?,
            `CodePostal`=?,
            `email`=?,
            `SecteurProfessionnel`=?,
            `date_d'inscription`=?
            WHERE IdMembres=?";
            $stmt = executeRequete($sql);
            // echo "$newPrenom "."$newNom "."$newAdresse "."$newNationalite "."$newTelephone "."$Sexe "."$DateDeNaissance "."$newCodePostal "."$newEmail "."$SecteurProfessionnel "."$DateDinscription ".$IdMembres;


            $pdo->beginTransaction();
            foreach ($data as $row) {
                $stmt->execute($row);
            }
            $pdo->commit();
            $result["success"] = ["msg" => "successfully", "msgDet" => "Annonce a été enregistrer !"];
            //ADD LOGS
            try {
                $currentMemebrId = json_decode($_SESSION["userinfo"],true)[0]['IdMembres'];
                $stmt = executeRequete("INSERT INTO 
                `logs`( `Time`, `Category`, `MembreId`, `Event`) 
                VALUES (curdate(),'Membres','$currentMemebrId','le membre <b>{$newNom}</b> a été mis à jour')");
                $stmt->execute();

                
            } catch (Exception $e) {
                // $pdo->rollback();
                // $result["error"] = ["msg"=>"error ??","msgDet"=>"verify les inputs entrer ou contacter le support .[".$e->getMessage()."]"];
                die("Error querying database: " . $e->getMessage());
            }
        } catch (Exception $e) {
            $pdo->rollback();
            $result["error"] = ["msg" => "error ??", "msgDet" => "verify les inputs entrer ou contacter le support .[" . $e->getMessage() . "]"];
            // die("Error querying database: " . $e->getMessage());
        }
    }
?>

<!doctype html>
<html lang="en">

<head>
    <title>ISTA Larache - Inscription</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="../inc/js/functions.inc.js"></script>
    <link rel="stylesheet" href="../inc/css/admin_style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

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
        

    </style>
</head>

<body>
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
        <h5 class="modal-title" id="exampleModalLabel">Supprimer utilisateur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Voulez-vous vraiment supprimer cet utilisateur ?<strong> [<span class="UserName"></span>]</strong>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" 
         data-bs-dismiss="modal">Close</button>
        <button type="button" id="DeleteConfirmationOk"  class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal GroupDeStagiairesModal -->
<div class="modal fade" id="GroupDeStagiairesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Nouvel Group</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-6">
                                    <label for="" class="form-label">Groups De Stagiaires</label>
                                    <select class="form-select form-select-lg"  id="Groups">
                                            <option value="0">DWFS-101</option>
                                            <option value="1">DWFS-102</option>
                                            <option value="2">DWFS-201</option>
                                            <option value="3">DWFS-202</option>
                                    </select>
                                    <label  for="" class="form-label">Group libele</label>
                                    <input type="text"
                                    class="form-control"  id="GInput" aria-describedby="helpId" placeholder="" >
                                    </div>
                                    <div class="col-6">
                                        <button type="button" id="GInsert" class="btn btn-info">Ajouter</button>
                                        <button type="button" id="GDelete" class="btn btn-danger">Supprimer</button>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" id="GSave" class="btn btn-primary">Save changes</button>
                            </div>
                            </div>
                        </div>
                    </div>    

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
    <div class="row m-0 h-100">
        
        <!--Side Menu-->
        <?php require_once("../admin/inc/sidemenu.inc.php")?>

        <div class="col-10 ps-5 pt-2 pe-5">
            <!--HEADER-->
            <div class="Header  mt-2 ms-3 me-3">
                <div class="PageTitle float-start fw-bolder">
                    <h2><b>Inscription</b></h2>
                </div>
                <div class="MenuTaps d-flex flex-row float-end">
                    <div class="d-grid gap-2">
                        <!-- <button type="button" name="" id="" class="btn btn-info "></button> -->
                        <!-- Example single danger button -->
                        <div class="btn-group">
                        <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/imgs/three_points.png">
                        </button>
                        <ul class="dropdown-menu">
                            <li class="p-1"><a class="dropdown-item btn btn-danger  rounded" id="Btn_Deconnect" href="#">Déconnecter</a></li>
                            <!-- <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Separated link</a></li> -->
                        </ul>
                    </div>
                    <script>
                        $("#Btn_Deconnect").on("click",()=>{
                            $.post("../inc/functions.inc.php", { function_name: "disconnect"}, function(d) {
                                location.reload();
                            });
                        });
                    </script>

                    </div>
                    <div class="d-grid gap-2 ms-4">
                        <button type="button" name="" id="" class="btn btn-primary fw-semibold"><b> Aids</b></button>
                    </div>
                </div>
            </div>
            <!--QUICK TAPS-->
            <div class="TapPanel d-flex flex-column mt-2 ms-3 me-3">
                <div class="TapTitle  fw-bold text-black-50">
                    <div class="position-absolute" id="toasts">
                        <!-- <div class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                                <div class="toast-body">
                                Hello, world! This is a toast message.
                                </div>
                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                        </div> -->
                    </div>
                    <h6>Ajouter un nouveau membre</h6>
                </div>
                <hr>
                <form method="post" id="formUser">
                <div class="TapContent m-3 ">
                    <div class="row">
                        <div class="col-6">
                            <div class="w-100">

                                <div class="mb-3">
                                    <label for="" class="form-label">Type d'ahiasion</label>
                                    <select class="form-select form-select-lg" name="TypeDahiasion" id="">
                                        <option value="0" >Selectioner</option>
                                        <option value="1" selected>Stagiaire</option>
                                        <option value="2">Employées</option>
                                        
                                    </select>
                                    <script>
                                        
                                        window.Typedahiasion = 0;
                                        $(".TapContent").find('select[name="TypeDahiasion"]').on("change",()=>{
                                            console.log($(".TapContent").find('select[name="TypeDahiasion"]').find("option:selected").val());
                                            if($(".TapContent").find('select[name="TypeDahiasion"]').find(":selected").val()=="1"){
                                                $(".TapContent").find(".SP_Field").hide();
                                                $(".TapContent").find(".GS_Field").show();
                                                window.Typedahiasion = 1;
                                            }else if($(".TapContent").find('select[name="TypeDahiasion"]').find(":selected").val()=="2"){
                                                $(".TapContent").find(".GS_Field").hide();
                                                $(".TapContent").find(".SP_Field").show();
                                                window.Typedahiasion = 2;
                                            }else{
                                                window.Typedahiasion = 0;
                                                $(".TapContent").find(".GS_Field").hide();
                                                $(".TapContent").find(".SP_Field").hide();
                                                
                                            }
                                        });
                                        $(window).on("load",()=>{
                                            $("#resetUser").on("click",()=>{
                                                
                                                $("#formUser")[0].reset();
                                                $(".TapContent").find('select[name="TypeDahiasion"]').find("option").prop("selected",false);
                                                $(".TapContent").find('select[name="TypeDahiasion"]').find('option[value='+window.Typedahiasion+']').prop("selected",true);
                                                
                                            });
                                            
                                            $(".TapContent").find(".GS_Field").hide();
                                            if($(".TapContent").find('select[name="TypeDahiasion"]').find(":selected").val()=="1"){
                                                $(".TapContent").find(".SP_Field").hide();
                                                $(".TapContent").find(".GS_Field").show();
                                                window.Typedahiasion = 1;
                                            }else if($(".TapContent").find('select[name="TypeDahiasion"]').find(":selected").val()=="2"){
                                                $(".TapContent").find(".GS_Field").hide();
                                                $(".TapContent").find(".SP_Field").show();
                                                window.Typedahiasion = 2;
                                            }else{
                                                window.Typedahiasion = 0;
                                                $(".TapContent").find(".GS_Field").hide();
                                                $(".TapContent").find(".SP_Field").hide();
                                                
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="w-100 row GS_Field SP_Field">
                                
                                <div class="mb-3 col-6">
                                    <label for="" class="form-label">Prenom</label>
                                    <input type="text"
                                    class="form-control" name="Prenom" id="" aria-describedby="helpId" placeholder="">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="" class="form-label">Nom</label>
                                    <input type="text"
                                    class="form-control" name="Nom" id="" aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                            <div class="w-100 row GS_Field SP_Field">

                                <div class="mb-3 col-6">
                                    <label for="" class="form-label">Adresse</label>
                                    <input type="text"
                                    class="form-control" name="Adresse" id="" aria-describedby="helpId" placeholder="">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="" class="form-label">Code Postal</label>
                                    <input type="text"
                                    class="form-control" name="CodePostal" id="" aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="w-100 GS_Field SP_Field">
    
                                <div class="mb-3">
                                    <label for="" class="form-label">Nationalite</label>
                                    <select class="form-select form-select-lg countries" name="Nationalite" id="">
                                    <option value="">Selectioner Payé</option>
                                    </select>
                                </div>
                            </div>
                            <div class="w-100 GS_Field SP_Field">
    
                                <div class="mb-3">
                                    <label for="" class="form-label">Telephone</label>
                                    <input type="text"
                                    class="form-control" name="Telephone" id="" aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                            <div class="w-100 GS_Field SP_Field">
    
                                <div class="mb-3">
                                    <label for="" class="form-label">Sexe</label>
                                    <select class="form-select form-select-lg" name="Sexe" id="">
                                        <option selected>Selectioner</option>
                                        <option value="H">Homme</option>
                                        <option value="F">Femme</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="col-3">
                            <div class="w-100 GS_Field SP_Field">
    
                                <div class="mb-3">
                                    <label for="" class="form-label">Date de naissance</label>
                                    <input type="date"
                                    class="form-control" name="DateDeNaissance" id="" aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                            <div class="w-100 GS_Field SP_Field">
    
                                <div class="mb-3">
                                    <label for="" class="form-label">Carte Nationel</label>
                                    <input type="text"
                                    class="form-control" name="CarteNationel" id="" aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                            <div class="w-100 GS_Field SP_Field">
    
                                <div class="mb-3">
                                    <label for="" class="form-label">E-mail</label>
                                    <input type="text"
                                    class="form-control" name="Email" id="" aria-describedby="helpId" placeholder="">
                                </div>
                            </div>

                        </div>
                    </div>
                    

                    <div class="row">
                        <div class="col-6">
                            <div class="w-100">

                                <div class="mb-3 GS_Field" >
                                    <label for="" class="form-label">Group de stagiaires</label>
                                    <select class="form-select form-select-lg" name="GroupDeStagiaires" id="">
                                        <option selected>Selectioner</option>
                                        <option value="-1">Crées une Nouvel Group</option>
                                        <?php
                                    
                                            $stmt = executeRequete("SELECT * FROM groupe_stagiaires;");
                                            $stmt->execute();
                                            $index = 0;

                                            foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row){
                                                $index = $index + 1;
                                        ?>
                                        <option value="<?php echo $row['code_groupe_Groupe']?>"><?php echo $row['code_groupe_Groupe']?></option>

                                        <?php }?>
                                        
                                    </select>
                                </div>
                                <script>
                                    var $md = $("#GroupDeStagiairesModal");
                                    var $select = $md.find("#Groups");
                                    var $S = $(".TapContent").find('select[name="GroupDeStagiaires"]');
                                    $S.find("option").on("click",function(){
                                        if($(this).val()=="-1"){
                                            $md.modal("show");
                                            $select.empty();
                                            $S.children().each(function (index,elem) { 
                                                if(index < 2){
                                                    return;
                                                }
                                                var $newS = $("<option>");
                                                if(index==2){
                                                    $newS.prop("selected",true);
                                                }
                                                $newS.text($(elem).text());
                                                $newS.val($(elem).val());
                                                $select.append($newS);
                                            });
                                            window.selector = $S[0];
                                            
                                        }
                                    });
                                    var $input = $md.find("#GInput");
                                    $md.find("#GInsert").on("click",function(){
                                        var flag = true;
                                        $select.children().each(function(i,e){
                                            if($input.val() == $(e).val()){
                                                flag = false;
                                            }
                                        });
                                        if(flag){

                                            var $newS = $("<option>");
                                            $newS.val($input.val());
                                            $newS.text($input.val());
                                            $select.append($newS);
                                            $S.children().prop("selected",false);
                                            $newS.prop("selected",true);
                                        }else{
                                            showToast({
                                                type:"error",
                                                autoDismiss: true,
                                                message:"Le Groub exist deja !"
                                            });
                                        }
                                        $input.val("");
                                    });
                                    $md.find("#GDelete").on("click",function(){
                                        var valSelect = $select.val();
                                        $select.find('option[value="'+valSelect+'"]').remove();
                                    });
                                    $md.find("#GSave").on("click",function(){
                                        confirmChanges($md[0],"Voulez-vous vraiment enregistrer cette changment ?","",()=>{
                                            var listValues = $md.find("#Groups").children().toArray().map(function(val,index){
                                                return '("'+val.value+'")';
                                            });
                                            var lstSt = listValues.join(",");
                                            console.log(lstSt);
                                            var requet = 'DELETE IGNORE FROM `groupe_stagiaires`;INSERT IGNORE INTO `groupe_stagiaires` VALUES '+lstSt+';';
                                            $.post("../inc/functions.inc.php", { function_name: "executeRequeteResponse",msgSuccess:"Utilisateur supprimé avec succès",msgFaild:"Une erreur s'est produite",requet:""+requet }, function(d) {
                                                // setTimeout(location.reload(),1000);
                                                console.log(d);
                                                if(d=="error"){
                                                    showToast({
                                                        type:"error",
                                                        autoDismiss: true,
                                                        message:"Une erreur s'est produite !"
                                                    });
                                                }else{
                                                    $S.empty();
                                                    var $newS = $("<option>");
                                                    $newS.text("Selectioner");
                                                    $newS.val("");
                                                    var $newS2 = $("<option>");
                                                    $newS2.text("Crées une Nouvel Group");
                                                    $newS2.on("click",function(){
                                                        
                                                        $md.modal("show");
                                                        $select.empty();
                                                        $S.children().each(function (index,elem) { 
                                                            if(index < 2){
                                                                return;
                                                            }
                                                            var $newS = $("<option>");
                                                            if(index==2){
                                                                $newS.prop("selected",true);
                                                            }
                                                            $newS.text($(elem).text());
                                                            $newS.val($(elem).val());
                                                            $select.append($newS);
                                                        });
                                                        
                                                        
                                                    });
                                                    $newS2.prop("selected",true);
                                                    $newS2.val("-1");
                                                    $S.append($newS);
                                                    $S.append($newS2);
                                                    $md.find("#Groups").children().each(function (index2,elem2) { 
                                                        
                                                        var $newS3 = $("<option>");
                                                        if(index2==0){
                                                            $newS3.prop("selected",true);
                                                        }
                                                        $newS3.text($(elem2).text());
                                                        $newS3.val($(elem2).val());
                                                        $S.append($newS3);
                                                    });
                                                    // $md.modal("hide");
                                                    AddLogs("Membres",'les groups des stagiaires a été changer');
                                                    
                                                    showToast({
                                                        type:"success",
                                                        autoDismiss: true,
                                                        message:"Enrigister avec succès !"
                                                    });
                                                }
                                            });

                                                // Handle the response here

                                                
                                        });
                                    });
                                    

                                    
                                    
                                        
                                    
                                </script>
                                <div class="mb-3 SP_Field" style="display: none;">
                                    <label for="" class="form-label">Secteur professionnel</label>
                                    <select class="form-select form-select-lg" name="SecteurProfessionnel" id="">
                                        <option selected>Select Secteur</option>
                                        <option value="0">Formateur</option>
                                        <option value="1">Redacteur</option>
                                        
                                    </select>
                                </div>
                            </div>
                            
                            
                        </div>
                        <div class="col-6">
                            <div class="w-100">
    
                                <div class="mb-3 GS_Field SP_Field">
                                    <label for="" class="form-label">Data d'inscription</label>
                                    <input type="date"
                                    class="form-control" name="DataDinscription" id="" aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                            
                            
                        </div>
                        
                    </div>
                    <div class="w-100 GS_Field SP_Field">
                        <div class="d-flex flex-row justify-content-end">
                            <div class="me-3">
                                <input  id="resetUser" class="btn btn-primary" type="button" value="Reset">
                            </div>
                            <div class="me-3">
                                <input name="NewUser" id="ajoutUser" class="btn btn-primary" type="button" value="Ajouter">
                            </div>
                        </div>
                    </div>
                </div>
                <script>

                    

                    
                        var loc = new locationInfo();
                        loc.getCountries();
                        jQuery(".countries").on("change", function(ev) {
                            var countryId = jQuery("option:selected", this).attr('countryid');
                            // if(countryId != ''){
                            //     loc.getStates(countryId);
                            // }
                            // else{
                            //     jQuery(".states option:gt(0)").remove();
                            // }
                        });
                        // jQuery(".states").on("change", function(ev) {
                        //     var stateId = jQuery("option:selected", this).attr('stateid');
                        //     if(stateId != ''){
                        //         loc.getCities(stateId);
                        //     }
                        //     else{
                        //         jQuery(".cities option:gt(0)").remove();
                        //     }
                        // });
                    




                    /* ---- end demo code ---- */


                    $(".TapPanel").find("#ajoutUser").on("click",function () {
                        
                        var inputsFilled = $(".TapPanel").find("input,select").filter(function () {
                            var l = $.trim($(this).val());
                            if(window.Typedahiasion == 1){
                                if($(this).attr("name")=="SecteurProfessionnel"){
                                    console.log($(this).attr("name")+":"+l +" IGNORE");
                                    return false;   
                                }
                            }else if(window.Typedahiasion == 2){
                                if($(this).attr("name")=="GroupDeStagiaires"){
                                    console.log($(this).attr("name")+":"+l +" IGNORE");
                                    return false;   
                                }

                            }
                            console.log($(this).attr("name")+":"+l + " :: "+ (l.length == 0));
                            return l.length == 0;
                        }).length == 0;
                        console.log(inputsFilled);
                        
                        if(inputsFilled){
                            $(".TapPanel").find("form").submit();
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
                </script>
                </form>
            </div>
            <div class="contentPage  mt-5 ms-3 me-3">
                <!--Logs-->
                <div class="TapPanel  ">
                    <div class="TapTitle float-start fw-bold text-black-50">
                      <h4>Membres</h4>
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
                                    <th>Prenom</th>
                                    <th>Sexe</th>
                                    <th>E-mail</th>
                                    <th>Type d'ahesion</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                    
                                    $stmt = executeRequete("SELECT * FROM membre;");
                                    $stmt->execute();
                                    $index = 0;

                                    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row){
                                        $index = $index + 1;
                                ?>
                                <tr class="table-light">
                                    <td scope="row"><?php echo $index;?></td>
                                    <td><?php echo $row['nom_personnel'];?></td>
                                    <td><?php echo $row['prenom'];?></td>
                                    <td><?php echo $row["sexe"];?></td>
                                    <td><?php echo $row["email"];?></td>
                                    <td><?php
                                        if($row["type_d'adhésion"] == "-1"){
                                            echo '<span style="color:green;">Admin</span>';
                                            
                                        }else if($row["type_d'adhésion"] == "1"){
                                            echo '<span>Stagiaire</span>';
                                            
                                        }else if($row["type_d'adhésion"] == "2"){
                                            echo '<span style="color:blue;">Employée</span>';

                                        }else if($row["type_d'adhésion"] == "3"){
                                            echo '<span style="color:grey;">rédacteur</span>';
                                            
                                        }else{
                                            echo '<span style="color:red;">unidentifent</span>';

                                        }
                                    ?></td>
                                    <td>
                                            <div class="d-flex flex-row justify-content-end ActionMembresContainer">
                                                <div class="d-grid gap-2 m-1 ">
                                                    <?php if($row["type_d'adhésion"] == "-1" || $row["type_d'adhésion"] == "2" || $row["type_d'adhésion"] == "3"){ ?>
                                                        <button type="button" name="" id="SeePass" class="btn p-1 btn-primary ">P</button>
                                                    <?php } ?>
                                                </div>
                                                <?php if($row["type_d'adhésion"] == "-1") {

                                                }else{?>
                                                    <div class="d-grid gap-2 m-1 ">
                                                    <button type="button" name="" id="Remove" class="btn p-1 btn-primary "><img src="/imgs/Remove_TrashIcon.png" class="img-fluid " alt=""></button>
                                                    </div>
                                                    <div class="d-grid gap-2 m-1">
                                                    <button type="button" name="" id="Modifier" class="btn p-1 btn-primary "><img src="/imgs/Edit_Icon.png" class="img-fluid  " alt=""></button>
                                                    </div>
                                                <?php }?>
                                            </div>
                                    </td>
                                </tr>
                                <?php } ?>
                                <script type="text/javascript">
                                    
                                                
                                    $(".TapPanel").find('button[id="Modifier"]').on("click",fetchUser);
                                    $(".TapPanel").find('button[id="Remove"]').on("click",deleteUser);
                                    $(".TapPanel").find('button[id="SeePass"]').on("click",seePassUser);
                                    $(".DeleteConfirmation").find('button[id="DeleteConfirmationOk"]').on("click",confirmDelete);

                                    function deleteUser(){
                                        window.selected = {
                                            'index':$(this).parent().parent().parent().parent().find("td:nth-child(1)").text(),
                                            'nom':$(this).parent().parent().parent().parent().find("td:nth-child(2)").text(),
                                            'prenom':$(this).parent().parent().parent().parent().find("td:nth-child(3)").text(),
                                            'sexe':$(this).parent().parent().parent().parent().find("td:nth-child(4)").text(),
                                            'email':$(this).parent().parent().parent().parent().find("td:nth-child(5)").text(),
                                            'type_dadhésion':$(this).parent().parent().parent().parent().find("td:nth-child(6)").text()
                                        };
                                        
                                        window.container = $(this).parent().parent().parent().parent()[0];
                                        $.post("../inc/functions.inc.php", { function_name: "executeRequete",requet:"SELECT * from membre where nom_personnel='"+window.selected.nom+"';" }, function(d) {
                                            // Handle the response here
                                            console.log(data);
                                            var data = JSON.parse(d);
                                            window.selected = data;
                                            console.log(window.selected);
                                            parseSelectionData();
                                            $(".DeleteConfirmation").modal('show');
                                            $(".DeleteConfirmation").find(".UserName").text(window.selected[0].nom_personnel);
                                            
                                        });
                                    }
                                    function seePassUser(){
                                        window.selected = {
                                            'index':$(this).parent().parent().parent().parent().find("td:nth-child(1)").text(),
                                            'nom':$(this).parent().parent().parent().parent().find("td:nth-child(2)").text(),
                                            'prenom':$(this).parent().parent().parent().parent().find("td:nth-child(3)").text(),
                                            'sexe':$(this).parent().parent().parent().parent().find("td:nth-child(4)").text(),
                                            'email':$(this).parent().parent().parent().parent().find("td:nth-child(5)").text(),
                                            'type_dadhésion':$(this).parent().parent().parent().parent().find("td:nth-child(6)").text()
                                        };
                                        
                                        window.container = $(this).parent().parent().parent().parent()[0];
                                        $.post("../inc/functions.inc.php", { function_name: "executeRequete",requet:"SELECT * from membre where nom_personnel='"+window.selected.nom+"';" }, function(d) {
                                            // Handle the response here
                                            console.log(data);
                                            var data = JSON.parse(d);
                                            window.selected = data;
                                            console.log(window.selected);
                                            parseSelectionData();
                                            // $(".yesOrNoConfirmation").modal('show');
                                            // $(".DeleteConfirmation").find(".UserName").text(window.selected[0].nom_personnel);
                                            confirmChanges(null,"Mot De Pass","Mot De Pass :<strong> ["+window.selected[0].password+"]</strong><br>Voulez-Vous l'envoyer dans un e-mail?",()=>{
                                                AddLogs("Membres",'le Mot De Pass été envoyer a <b>{'+window.selected[0].email+'}</b>');
                                                showToast({
                                                    type:"success",
                                                    autoDismiss: true,
                                                    message:"l'email envoyer avec succès !"
                                                });
                                            });
                                        });
                                    }
                                    function confirmDelete(){
                                        $.post("../inc/functions.inc.php", { function_name: "executeRequete",msgSuccess:"Utilisateur supprimé avec succès",msgFaild:"Une erreur s'est produite",requet:"DELETE from membre where IdMembres='"+window.selected[0].IdMembres+"';" }, function(d) {
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
                                                AddLogs("Membres",'le Membre <b>{'+window.selected[0].nom_personnel+'}</b> été supprimer');
                                                showToast({
                                                    type:"success",
                                                    autoDismiss: true,
                                                    message:"Utilisateur supprimé avec succès !"
                                                });

                                            }
                                        });
                                    }

                                    function fetchUser(){
                                        window.selected = {
                                            'index':$(this).parent().parent().parent().parent().find("td:nth-child(1)").text(),
                                            'nom':$(this).parent().parent().parent().parent().find("td:nth-child(2)").text(),
                                            'prenom':$(this).parent().parent().parent().parent().find("td:nth-child(3)").text(),
                                            'sexe':$(this).parent().parent().parent().parent().find("td:nth-child(4)").text(),
                                            'email':$(this).parent().parent().parent().parent().find("td:nth-child(5)").text(),
                                            'type_dadhésion':$(this).parent().parent().parent().parent().find("td:nth-child(6)").text()
                                            
                                        };

                                        $(".PopupBackground").show();

                                        $.post("../inc/functions.inc.php", { function_name: "executeRequete",requet:"SELECT * from membre where nom_personnel='"+window.selected.nom+"';" }, function(d) {
                                            // Handle the response here
                                            console.log(data);
                                            var data = JSON.parse(d);
                                            window.selected = data;
                                            console.log(window.selected);
                                            parseSelectionData();
                                            
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
    
    <div class="position-absolute  w-100 h-100 top-50 start-50 translate-middle p-0 m-0 PopupBackground" style="display: none;">
        <div class="container-lg  position-absolute shadow-1  top-50 start-50 translate-middle overflow-hidden bg-white rounded-4 p-0">
            <div class="d-flex flex-column justify-content-start p-0">
                <div class="col-2 w-100 ps-5 p-4 m-0 text-white bg-primary shadow-sm   ">
                    <h3> <b>Membre Edit</b></h3>
                </div>
                
                <form method="post" id="form">
                <div class="col-10 pt-5 ps-4 pe-4 pb-5 w-100">
                    <div class="row m-0">
                        <div class="col-4 ps-3 pe-3">
                            <div class="mb-4">
                                <label for="" class="form-label">Prenom</label>
                                <div class="row">
                                    <div class="col-6    p-0 m-0">
                                        <input type="text"
                                        class="form-control rounded-start rounded-0 m-0 " disabled name="" id="oldPrenom" aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="col-6    p-0 m-0">
                                        <input type="text"
                                        class="form-control rounded-end rounded-0  m-0 " name="newPrenom" id="newPrenom" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-5">
                                <label for="" class="form-label">Nom</label>
                                <div class="row">
                                    <div class="col-6    p-0 m-0">
                                        <input type="text"
                                        class="form-control rounded-start rounded-0 m-0 " disabled name="" id="oldNom" aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="col-6    p-0 m-0">
                                        <input type="text"
                                        class="form-control rounded-end rounded-0  m-0 " name="newNom" id="newNom" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 pt-2">
                                <label for="" class="form-label">Adresse</label>
                                <div class="row">
                                    <div class="    p-0 m-0">
                                        <input type="text"
                                        class="form-control rounded-top rounded-0  m-0 " disabled name="oldAdresse" id="oldAdresse" aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="    p-0 m-0">
                                        <input type="text"
                                        class="form-control rounded-bottom rounded-0  m-0 " name="newAdresse" id="newAdresse" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 ps-3 pe-3">
                            <div class="mb-4">
                                <label for="" class="form-label">Nationalite</label>
                                <div class="row">
                                    <div class="col-6    p-0 m-0">
                                        
                                        <select disabled class="form-select form-select-lg rounded-start rounded-0 m-0 countries" name="" id="oldNationalite">
                                            <option selected>Select Nationalite</option>
                                            <option value="">Marocan</option>
                                            <option value="">Formateur</option>
                                            <option value="">Jakarta</option>
                                        </select>
                                    </div>
                                    <div class="col-6    p-0 m-0">
                                        
                                        <select class="form-select form-select-lg rounded-end rounded-0  m-0 countries" name="newNationalite" id="newNationalite">
                                            <option selected>Select Nationalite</option>
                                            <option value="">Marocan</option>
                                            <option value="">Formateur</option>
                                            <option value="">Jakarta</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-5">
                                <label for="" class="form-label">Telephone</label>
                                <div class="row">
                                    <div class="col-6    p-0 m-0">
                                        <input type="text"
                                        class="form-control rounded-start rounded-0 m-0 " disabled name="" id="oldTelephone" aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="col-6    p-0 m-0">
                                        <input type="text"
                                        class="form-control rounded-end rounded-0  m-0 " name="newTelephone" id="newTelephone" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3 pt-2">
                                <label for="" class="form-label">Sexe</label>
                                <div class="row">
                                    <div class="    p-0 m-0">
                                        <select class="form-select form-select-lg" name="Sexe" id="Sexe">
                                            <option selected>Selectioner</option>
                                            <option value="H">Homme</option>
                                            <option value="F">Femme</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 ps-3 pe-3">
                            <div class="mb-4">
                                <label for="" class="form-label">Date de naissance</label>
                                <div class="row">
                                    <div class="    p-0 m-0">
                                        <input type="date"
                                        class="form-control  m-0 "  name="DateDeNaissance" id="DateDeNaissance" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Code Postal</label>
                                <div class="row">
                                    <div class="    p-0 m-0">
                                        <input type="text"
                                        class="form-control rounded-top rounded-0  m-0 " disabled name="" id="oldCodePostal" aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="    p-0 m-0">
                                        <input type="text"
                                        class="form-control rounded-bottom rounded-0  m-0 " name="newCodePostal" id="newCodePostal" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 ">
                                <label for="" class="form-label">E-mail</label>
                                <div class="row">
                                    <div class="    p-0 m-0">
                                        <input type="email"
                                        class="form-control rounded-top rounded-0  m-0 " disabled name="" id="oldEmail" aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="    p-0 m-0">
                                        <input type="email"
                                        class="form-control rounded-bottom rounded-0  m-0 " name="newEmail" id="newEmail" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row ps-3 pe-5 mb-0">
                        <div class="col-6 ps-3 pe-3 " id="GS">
                            
                            
                            <div class="mb-3 ">
                                <label for="" class="form-label">Ground stagiaires</label>
                                <div class="row">
                                    <div class="    p-0 m-0">
                                        <select class="form-select form-select-lg" name="GroundStagiaires" id="GroundStagiaires">
                                            <option selected>Select Group</option>
                                            <?php
                                    
                                            $stmt = executeRequete("SELECT * FROM groupe_stagiaires;");
                                            $stmt->execute();
                                            $index = 0;

                                            foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row){
                                                $index = $index + 1;
                                        ?>
                                        <option value="<?php echo $row['code_groupe_Groupe']?>"><?php echo $row['code_groupe_Groupe']?></option>

                                        <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 " id="SP" style="display: none;">
                            <div class="mb-3 ">
                                <label for="" class="form-label">Secteur professionnel</label>
                                <div class="row">
                                    <div class="    p-0 m-0">
                                        <select class="form-select form-select-lg" name="SecteurProfessionnel" id="SecteurProfessionnel">
                                            <option selected>Select Secteur</option>
                                            <option value="0">Formateur</option>
                                            <option value="1">Redacteur</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 ps-3 pe-3">
                            <div class="mb-3 ">
                                <label for="" class="form-label">Date d'inscription</label>
                                <div class="row">
                                    <div class="    p-0 m-0">
                                        <input type="date"
                                        class="form-control  m-0 "  name="DateDinscription" id="DateDinscription" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>

                    <div class="d-flex flex-row justify-content-end">
                    <input name="IdMembres" id="IdMembres" style="display:none;" type="text" value="">
                        <div class="me-3">
                            <input name="" id="quit" class="btn btn-info" type="button" value="Quiter">
                        </div>
                        <div class="me-3">
                            <input name="" id="r" class="btn btn-primary" type="button" value="Reset">
                        </div>
                        <div class="me-3">
                            <input name="" id="Enregistrer" class="btn btn-success" type="button" value="Enregistrer">
                        </div>
                    </div>
                    
                </div>
                </form>
                    <script type="text/javascript">
                                    
                                                
                      
                        $(".PopupBackground").find("#r").on("click",()=>{
                            parseSelectionData();
                        });
                        $(".PopupBackground").find("#quit").on("click",function(){
                            $(".PopupBackground").hide();
                        });
                        $(".PopupBackground").find("#Enregistrer").on("click", () => {
                            
                                var inputsFilled = $(".PopupBackground").find("input,select").filter(function() {
                                    console.log($(this));
                                    var l = $.trim($(this).val());
                                    if (!$(this).attr("name") || $(this).attr("name") == "oldPrenom") {
                                        console.log($(this).attr("name") + ":" + l + " IGNORE");
                                        return false;
                                    }
                                    if (!$(this).attr("name") || $(this).attr("name") == "oldNom") {
                                        console.log($(this).attr("name") + ":" + l + " IGNORE");
                                        return false;
                                    }
                                    if (!$(this).attr("name") || $(this).attr("name") == "oldAdresse") {
                                        console.log($(this).attr("name") + ":" + l + " IGNORE");
                                        return false;
                                    }
                                    if (!$(this).attr("name") || $(this).attr("name") == "oldNationalite") {
                                        console.log($(this).attr("name") + ":" + l + " IGNORE");
                                        return false;
                                    }
                                    if (!$(this).attr("name") || $(this).attr("name") == "oldTelephone") {
                                        console.log($(this).attr("name") + ":" + l + " IGNORE");
                                        return false;
                                    }
                                    if (!$(this).attr("name") || $(this).attr("name") == "oldCodePostal") {
                                        console.log($(this).attr("name") + ":" + l + " IGNORE");
                                        return false;
                                    }
                                    if (!$(this).attr("name") || $(this).attr("name") == "oldEmail") {
                                        console.log($(this).attr("name") + ":" + l + " IGNORE");
                                        return false;
                                    }
                                    if(window.selected[0]["type_d'adhésion"] == 1){
                                        if($(this).attr("name")=="SecteurProfessionnel"){
                                            console.log($(this).attr("name")+":"+l +" IGNORE");
                                            return false;   
                                        }
                                    }else if(window.selected[0]["type_d'adhésion"] == 2){
                                        if($(this).attr("name")=="GroundStagiaires"){
                                            console.log($(this).attr("name")+":"+l +" IGNORE");
                                            return false;   
                                        }

                                    }
                                    // Sexe
                                    // SecteurProfessionnel
                                    // DateDinscription

                                    if(l.length == 0 && $(this).attr("name")=="newPrenom"){
                                        console.log($(this).attr("name")+":"+l +" IGNORE");
                                        $(this).val($(".PopupBackground").find("#oldPrenom").val());
                                        
                                    }
                                    if(l.length == 0 && $(this).attr("name")=="newNom"){
                                        console.log($(this).attr("name")+":"+l +" IGNORE");
                                        $(this).val($(".PopupBackground").find("#oldNom").val());
                                        
                                    }
                                    if(l.length == 0 && $(this).attr("name")=="newAdresse"){
                                        console.log($(this).attr("name")+":"+l +" IGNORE");
                                        $(this).val($(".PopupBackground").find("#oldAdresse").val());
                                        
                                    }
                                    if(l.length == 0 && $(this).attr("name")=="newNationalite"){
                                        console.log($(this).attr("name")+":"+l +" IGNORE");
                                        $(this).val($(".PopupBackground").find("#oldNationalite").val());
                                        
                                    }
                                    if(l.length == 0 && $(this).attr("name")=="newTelephone"){
                                        console.log($(this).attr("name")+":"+l +" IGNORE");
                                        $(this).val($(".PopupBackground").find("#oldTelephone").val());
                                        
                                    }
                                    if(l.length == 0 && $(this).attr("name")=="newCodePostal"){
                                        console.log($(this).attr("name")+":"+l +" IGNORE");
                                        $(this).val($(".PopupBackground").find("#oldCodePostal").val());
                                        
                                    }
                                    if(l.length == 0 && $(this).attr("name")=="newEmail"){
                                        console.log($(this).attr("name")+":"+l +" IGNORE");
                                        $(this).val($(".PopupBackground").find("#oldEmail").val());
                                        
                                    }
                                    
                                    
                                    var l = $.trim($(this).val());

                                    console.log($(this).attr("name") + ":" + l + " :: " + (l.length == 0));
                                    return l.length == 0;
                                }).length == 0;
                            console.log(inputsFilled);
                            /*  var inputsFilled = $(".PopupBackground").find("input,select").filter(function () {
                                var htm = window.editor2.data.get( );
                                console.log(htm);
                                $("#htmlContent2").val(htm);
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
                            }).length == 0; */
                            // console.log(inputsFilled);

                            if (inputsFilled) {
                                $(".PopupBackground").find("#form").submit();
                                // $(".TapPanel").find("#ajoutUser").prop("disabled",true);

                                // showToast({
                                //     type:"success",
                                //     autoDismiss: true,
                                //     message:"Le Utilisateur a ete Ajouter avec success !!"
                                // });
                            } else {
                                showToast({
                                    type: "error",
                                    autoDismiss: true,
                                    message: "Verify que tout les chemains corrects !!"
                                });

                            }
                        });
                        function parseSelectionData(){
                            $PopupBackground = $(".PopupBackground");
                            console.log($PopupBackground.find("#form")[0]);
                            $PopupBackground.find("#form")[0].reset();
                            $.post("../inc/functions.inc.php", { function_name: "executeRequete",requet:"SELECT * FROM enseigner where Membre_IdMembres='"+window.selected[0].IdMembres+"';" }, function(d) {
                                // Handle the response here
                                var data = JSON.parse(d);
                                console.log(data);
                                $PopupBackground.find("#GroundStagiaires").val(data[0].Groupe_Stagiaires_code_groupe_Groupe);

                            });
                            if(window.selected[0]["type_d'adhésion"] == 1){
                                $PopupBackground.find("#GS").show();
                                $PopupBackground.find("#SP").hide();
                            }else if(window.selected[0]["type_d'adhésion"] == 2){
                                $PopupBackground.find("#GS").hide();
                                $PopupBackground.find("#SP").show();
                            }
    
                            $PopupBackground.find("#IdMembres").val(window.selected[0].IdMembres);
                            $PopupBackground.find("#oldPrenom").val(window.selected[0].prenom);
                            $PopupBackground.find("#oldNom").val(window.selected[0].nom_personnel);
                            $PopupBackground.find("#oldAdresse").val(window.selected[0].adresse);
                            $PopupBackground.find("#oldNationalite").val(window.selected[0].nationalité);
                            $PopupBackground.find("#oldTelephone").val(window.selected[0].numéro_de_téléphone);
                            $PopupBackground.find("#Sexe").val(window.selected[0].sexe);
                            $PopupBackground.find("#DateDeNaissance").val(window.selected[0].date_de_naissance);
                            $PopupBackground.find("#oldCodePostal").val(window.selected[0].CodePostal);
                            $PopupBackground.find("#oldEmail").val(window.selected[0].email);
                            $PopupBackground.find("#DateDinscription").val(window.selected[0]["date_d'inscription"]);
    
                            $PopupBackground.find("#SecteurProfessionnel").val(window.selected[0].SecteurProfessionnel);

                        }
                    </script>
            </div>

        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
</body>

</html>