<?php
    session_start();
    if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] == false){
        header("Location: ../admin/LogIn.php");
    }
?>
<!doctype html>
<html lang="en">

<head>
    <title>ISTA Larache - Emploi De Temp</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
    <script src="../inc/js/functions.inc.js"></script>
    <link rel="stylesheet" href="../inc/css/admin_style.css">
    <link rel="stylesheet" href="../inc/css/fileUplaod.css">
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
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
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

        .ActionMembresContainer button {
            width: 1cm;
            height: 1cm;
        }

        .PopupBackground {
            background-color: rgba(0, 0, 0, 0.55);

        }

        .ScrollTable {
            height: 450px;

        }

        .ScrollTable-FixWidth {

            width: 180px;

        }

        .ScrollTable-2 {

            width: 250px;

        }

        .ScrollTable .item-centent {
            background-color: #00000015 !important;
        }

        .ScrollTable .item-centent[id="active"] {
            background-color: #00000025 !important;
            box-shadow: inset 0px 0px 0px 2px #2b7d2e7e;
        }

        .ScrollTable .Content {
            height: inherit;
            background-color: #00000018 !important;

            overflow-y: scroll;
            scrollbar-width: none;
        }

        .table tr td:hover {
            background-color: #2b7d2e1e;
        }

        .table tr td[id="active"] .cell>div {
            background-color: #edffee !important;

            box-shadow: inset 0px 0px 0px 2px #2b7d2e7e;
        }

        .table tr td[id="active"]:hover .cell>div {
            background-color: #2b7d2e1e !important;
            box-shadow: inset 0px 0px 0px 3px #5c775d7e;
        }

        .table tr td[id="active"] {
            background-color: #0d5f1125 !important;
            box-shadow: inset 0px 0px 0px 2px #2b7d2e7e;
        }

        .table tr td[id="active"]:hover {
            background-color: #2b7d2e1e !important;
            box-shadow: inset 0px 0px 0px 3px #2b7d2e7e;
        }


        .Selecting {
            transition-duration: all 0.1s;
            transition-duration: 0.2s;
            position: absolute;
            top: 100%;
            left: 0%;

        }

        #t:checked~.contentPage .Selecting {
            position: absolute;
            top: 100%;
            left: -120%;

        }

        .NoteTable {
            transition-duration: all 0.1s;
            transition-duration: 0.2s;
            position: absolute;
            top: 100%;
            left: 120%;
        }

        #t:checked~.contentPage .NoteTable {
            position: absolute;
            top: 100%;
            left: 0%;
        }

        table {
            width: 100% !important;
            max-width: 650px;
        }

        table td {
            
            min-width: 200px;
            max-width: 200px;
            min-height: 100px;
            max-height: 100px;
            width: 100%;
            height: 100px;

            padding: 0px !important;
        }
        .iconEditC{
            position: relative;
            height: 0px;
            width: 0px;
            z-index: 1;
            top: -50%;
            left: 100%;
            transform: translate(-35px,35px);
        }
        
        .iconEdit {
            position: relative;
            width: 44px !important;
            height: 44px;
            z-index: 1;
        }
        
        .iconEdit .Icon {
            width: 20px;
            height: 20px;
        }

        .iconEdit>div {
            padding: 8px 10px 10px 11px;

        }
        .iconContainer{
            position: absolute;
            width: 400px !important;
            height: 200px !important;
            transform: translate(5px,-205px);
        }
        .cell{
            width: 100%;
            height: 100%;
        }

        /* .cell{
            width: 120px;
            height: 130px;
            min-width: 120px;
            max-width: 120px;
            min-height: 130px;
            max-height: 130px;
            margin: 0px;
            padding: 0px;
        } */
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
    <!-- <div class="iconEdit">
        <div class="   bg-white rounded-circle border border-primary shadow">
            <img src="/imgs/editIcon.png"
                class="Icon"
                alt="">
        </div>
    </div> -->

    <div class="row m-0 h-100">
        
        <!--Side Menu-->
        <?php require_once("../admin/inc/sidemenu.inc.php")?>
        
        <div class="col-10  ps-5 pt-2 pe-5">
            <!--HEADER-->
            <div class="Header  mt-2 ms-3 me-3">
                <div class="PageTitle float-start fw-bolder">
                    <h2><b>Emploi De Temps</b></h2>
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
            

            <div class="contentPage   position-relative d-flex flex-column mt-2 ms-1 me-2">
                <!-- <div class="TapTitle  fw-bold text-black-50">
                    <h6>Add New Membre</h6>
                </div> -->
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
                <hr>
                <div class="Emploi">

                    <div class="d-flex flex-row flex-wrap  ">
                        <div class="pe-5">
                            <div
                                class="m-2 ScrollTable ScrollTable-FixWidth position-relative rounded-4 overflow-hidden ">
                                <div
                                    class="Title text-center w-100 bg-primary text-white p-2 rounded-pill shadow position-absolute  ">
                                    <b>Group Stagiaires</b>
                                </div>
                                <div class="Content d-flex bg-black  bg-opacity-25 flex-column justify-content-start">
                                    <div class="item-centent text-center  p-3 bg-black bg-opacity-25">
                                        .....
                                    </div>
                                    <?php

                                $stmt = executeRequete("SELECT * FROM groupe_stagiaires;");
                                $stmt->execute();
                                $index = 0;

                                foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
                                    $index = $index + 1;
                                ?>

                                    <input class="item-centent rounded-0 btn bg-black text-center mt-1 p-2 bg-opacity-25" type="button" value="<?php echo $row['code_groupe_Groupe'] ?>">

                                <?php } ?>
                                   <!--  <input
                                        class="item-centent rounded-0 btn bg-black text-center mt-1 p-2 bg-opacity-25"
                                        type="button" value="DWS101">
                                    <input id="active"
                                        class="item-centent rounded-0 btn bg-black text-center mt-1 p-2 bg-opacity-25"
                                        type="button" value="DWS101">
                                    <input
                                        class="item-centent rounded-0 btn bg-black text-center mt-1 p-2 bg-opacity-25"
                                        type="button" value="DWS101">
                                    <input
                                        class="item-centent rounded-0 btn bg-black text-center mt-1 p-2 bg-opacity-25"
                                        type="button" value="DWS101">
                                    <input
                                        class="item-centent rounded-0 btn bg-black text-center mt-1 p-2 bg-opacity-25"
                                        type="button" value="DWS101">
                                    <input
                                        class="item-centent rounded-0 btn bg-black text-center mt-1 p-2 bg-opacity-25"
                                        type="button" value="DWS101">
                                            -->
                                </div>
                                <script type="text/javascript">
                                    
                                    $(".ScrollTable").find("input").on("click",function(){
                                        $('#Apply').prop("disabled",true);
                                        $(".ScrollTable").find("input").attr("id","");
                                        $(this).attr("id","active");
                                        $(".PDFContainer").show();
                                        $("#PDFViewer").attr("style","display: none !important;");
$("#PDFUploader").attr("style","display: none !important;");
                                        window.selectedGroup = $(this).val();
                                        $.post("../inc/functions.inc.php", {
                                            function_name: "executeRequete",
                                            requet: "SELECT * FROM `tablaux_pdf` where `GroupStagiaire`='" + window.selectedGroup + "';"
                                        }, function(d) {
                                            // Handle the response here
                                            console.log(d);
                                            var data = JSON.parse(d);
                                            window.selected = data;
                                            // $().find().length
                                            console.log(window.selected);
                                            
                                            if(data.length > 0){
                                                window.IdFichierPDF = data[0]['IdFichierPDF'];
                                                $("#upload_image_file").val("");
                                                $.post("../inc/functions.inc.php", {
                                                    function_name: "executeRequete",
                                                    requet: "SELECT * FROM `fichier` where `idFichier`='" + window.IdFichierPDF + "';"
                                                }, function(d) {
                                                    console.log(d);
                                                    var data2 = JSON.parse(d);
                                                    window.UrlFichierPDF = "/inc/"+decodeURIComponent(data2[0]['url']);
                                                    $("#upload_image_file").val(window.UrlFichierPDF);
                                                    if($("#upload_image_file").val() == ""){
                                                        $("#PDFViewer").attr("style","display: none !important;");
                                                        $("#PDFUploader").attr("style","display: inline !important;");
                                                    }else{
                                                        $("#PDFUploader").attr("style","display: none !important;");
                                                        $("#PDFViewer").attr("style","display: inline !important;");
                                                    }
                                                    
                                                    $("#PDFFrame")[0].src = "/inc/"+decodeURIComponent(data2[0]['url']);
                                                    
                                                });

                                            }else{
                                                $("#upload_image_file").val("");
                                            }

                                            if($("#upload_image_file").val() == ""){
                                                $("#PDFViewer").attr("style","display: none !important;");
                                                $("#PDFUploader").attr("style","display: inline !important;");
                                                }else{
                                                $("#PDFUploader").attr("style","display: none !important;");
                                                $("#PDFViewer").attr("style","display: inline !important;");
                                            }
                                            
                                            

                                        });
                                    });
                                </script>
                            </div>
                        </div>

                        <style>
                            .PDFContainer{
                                min-width: 300px;
                                background-color: #00000018 !important;
                                flex-grow: 1;
                            }
                        </style>
                        <div class="PDFContainer rounded " style="display: none;">
                            <form method="post" class="p-3 ">
                                <progress id="progress-bar" max=100 value=0></progress>
                                <div style="display: none !important;" id="PDFViewer" class="pt-5 d-flex  flex-column justify-content-start">
                                    <input id="upload_image_background2" name="imageUpload2" data-post-name="image_background" data-post-url="/uploads/" class="position-absolute invisible" type="file" multiple="true" accept="application/pdf" />
                                    <label class="btn btn-upload mt-3 mb-3" for="upload_image_background2">Choose file(s)</label>
                                    <iframe id="PDFFrame" src="/inc/uploads/emp.pdf" width="100%" height="500px">
                                    </iframe>
                                    <div class="mt-3 mb-3">
                                        <button type="button" id="Apply" class="btn btn-success" disabled>Appliquer les modifications</button>
                                        <button type="button" id="Reset" class="btn btn-danger">Réinitialiser les modifications</button>
                                    </div>
                                </div>
                                <div  id="PDFUploader" class=" d-flex  flex-column justify-content-start">
                                    <fieldset style="width: 100% !important;" id="upload_dropZone" class="upload_dropZone text-center mb-3 p-4">

                                        <legend class="visually-hidden">Image uploader</legend>
                                        


                                        <p class="small my-2"></p>

                                        <input id="upload_image_file" name="imageFile" type="text" style="display:none;" />
                                        
                                        <input id="upload_image_background" name="imageUpload" data-post-name="image_background" data-post-url="/uploads/" class="position-absolute invisible" type="file" multiple="true" accept="application/pdf" />
                                        <label class="btn btn-upload mb-3" for="upload_image_background">Choose file(s)</label>

                                        <div style="display:none;" class="upload_gallery d-flex flex-wrap justify-content-center gap-3 mb-0"></div>

                                    </fieldset>
                                </div>
                                <script>
                                    $('#Apply').on('click',(e)=>{
                                        var upload_image_file = $('#upload_image_file').val();
                                        $.post("../inc/functions.inc.php", {
                                                    function_name: "executeRequete",
                                                    requet: "SELECT * FROM `tablaux_pdf` where `GroupStagiaire`='" + window.selectedGroup + "';"
                                                }, function(d) {
                                                    console.log(d);
                                                    var data = JSON.parse(d);
                                                    window.selected = data;

                                                    if(data.length > 0){
                                                        confirmChanges(null,"Emploi de Temp a ete changé","vous voulez vraiment appliquer cette changement ?",
                                                        ()=>{
                                                            $.post("../inc/functions.inc.php", {
                                                                function_name: "executeRequete",
                                                                requet: "SELECT * FROM `fichier` where `url`='" + upload_image_file + "';"
                                                            }, function(d) {
                                                                console.log(d);
                                                                var data2 = JSON.parse(d);
                                                                window.IdFichierPDF = data2[0]['idFichier'];
                                                                var req = "UPDATE `tablaux_pdf` SET `IdFichierPDF`='"+window.IdFichierPDF+"' WHERE `idTablaux`='"+data[0]['idTablaux']+"'";
                                                                $.post("../inc/functions.inc.php", {
                                                                    function_name: "executeRequeteResponse",
                                                                    requet: req,
                                                                    msgSuccess:"Utilisateur supprimé avec succès",msgFaild:"Une erreur s'est produite"
                                                                }, function(d) {
                                                                    console.log(d);
                                                                    if(d=="error"){
                                                                        showToast({
                                                                            type:"error",
                                                                            autoDismiss: true,
                                                                            message:"Une erreur s'est produite !"
                                                                        });
                                                                    }else{
                                                                        AddLogs("Tablau des Notes",'le emploi de temp de group stagiaires <b>{'+window.selectedGroup+'}</b> a été channger');
                                                                        $('#Apply').prop("disabled",true);
                                                                        showToast({
                                                                            type:"success",
                                                                            autoDismiss: true,
                                                                            message:"Enrigister avec succès !"
                                                                        });
                                                                    }
                                                                });
                                                            });
                                                        });
                                                        
                                                    }else{
                                                        confirmChanges(null,"Une Nouvel Emploi de Temp Ajouter","vous voulez vraiment ajouter cette emploi de temp ?",
                                                        ()=>{
                                                            $.post("../inc/functions.inc.php", {
                                                                function_name: "executeRequete",
                                                                requet: "SELECT * FROM `fichier` where `url`='" + upload_image_file + "';"
                                                            }, function(d) {
                                                                console.log(d);
                                                                var data2 = JSON.parse(d);
                                                                window.IdFichierPDF = data2[0]['idFichier'];
                                                                var req = "INSERT INTO `tablaux_pdf`(`GroupStagiaire`, `IdFichierPDF`) VALUES ('"+window.selectedGroup+"',"+window.IdFichierPDF+")";
                                                                $.post("../inc/functions.inc.php", {
                                                                    function_name: "executeRequeteResponse",
                                                                    requet: req,
                                                                    msgSuccess:"Utilisateur supprimé avec succès",msgFaild:"Une erreur s'est produite"
                                                                }, function(d) {
                                                                    console.log(d);
                                                                    if(d=="error"){
                                                                        showToast({
                                                                            type:"error",
                                                                            autoDismiss: true,
                                                                            message:"Une erreur s'est produite !"
                                                                        });
                                                                    }else{
                                                                        AddLogs("Tablau des Notes",'le emploi de temp de group stagiaires <b>{'+window.selectedGroup+'}</b> a été ajouter');
                                                                        
                                                                        $('#Apply').prop("disabled",true);
                                                                        showToast({
                                                                            type:"success",
                                                                            autoDismiss: true,
                                                                            message:"Enrigister avec succès !"
                                                                        });
                                                                    }
                                                                });
                                                            });
                                                        });

                                                    }

                                                });

                                    });
                                    $("#upload_image_background2").on("change",(e)=>{
                                        $('#Apply').prop("disabled",false);
                                    });
                                    $("#upload_image_file").on("change",(e)=>{
                                        if($(e.target).val() == ""){
                                            $("#PDFViewer").attr("style","display: none !important;");
                                            $("#PDFUploader").attr("style","display: inline !important;");
                                            }else{
                                            $("#PDFUploader").attr("style","display: none !important;");
                                            $("#PDFViewer").attr("style","display: inline !important;");
                                        }
                                    });
                                </script>
                                
                            </form>
                        </div>

                    </div>


                </div>
            </div>


        </div>
    </div>
    <div style="display: none;"
        class="position-absolute  w-100 h-100 top-50 start-50 translate-middle p-0 m-0 PopupBackground">
        <div
            class="container-lg  position-absolute shadow-1  top-50 start-50 translate-middle overflow-hidden bg-white rounded-4 p-0">
            <div class="d-flex flex-column justify-content-start p-0">
                <div class="col-2 w-100 ps-5 p-4 m-0 text-white bg-primary shadow-sm   ">
                    <h3> <b>Membre Edit</b></h3>
                </div>
                <div class="col-10 pt-5 ps-4 pe-4 pb-5 w-100">
                    <table class="w-100">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <td class="w-25">
                                <label for="" class="form-label">Id</label>
                            </td>
                            <td colspan="2">
                                <div class="row">
                                    <div class="col-6    p-0 m-0">
                                        <input type="text" class="form-control m-0 " disabled name="" id=""
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                    <!-- <div class="col-6    p-0 m-0">
                                        <input type="text"
                                        class="form-control rounded-end rounded-0  m-0 " name="" id="" aria-describedby="helpId" placeholder="">
                                    </div> -->
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25">
                                <label for="" class="form-label">Titre de article</label>
                            </td>
                            <td colspan="2">
                                <div class="row">
                                    <div class="col-6    p-0 m-0">
                                        <input type="text" class="form-control rounded-start rounded-0 m-0 " disabled
                                            name="" id="" aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="col-6    p-0 m-0">
                                        <input type="text" class="form-control rounded-end rounded-0  m-0 " name=""
                                            id="" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="" class="form-label">Nom de l'editeur</label>
                            </td>
                            <td colspan="2">
                                <div class="row">
                                    <div class="col-6    p-0 m-0">
                                        <input type="text" class="form-control rounded-start rounded-0 m-0 " disabled
                                            name="" id="" aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="col-6    p-0 m-0">
                                        <input type="text" class="form-control rounded-end rounded-0  m-0 " name=""
                                            id="" aria-describedby="helpId" placeholder="">
                                    </div>
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
                                        <input type="date" class="form-control rounded-start rounded-0 m-0 " disabled
                                            name="" id="" aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="col-6    p-0 m-0">
                                        <input type="date" class="form-control rounded-end rounded-0  m-0 " name=""
                                            id="" aria-describedby="helpId" placeholder="">
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
                                    <textarea class="form-control" name="" id="" rows="3"></textarea>
                                </div>
                            </td>
                        </tr>
                    </table>



                    <div class="mt-5 d-flex flex-row justify-content-end">
                        <div class="me-3">
                            <input name="" id="" class="btn btn-primary" type="reset" value="Reset">
                        </div>
                        <div class="me-3">
                            <input name="" id="" class="btn btn-primary" type="submit" value="Enregistrer">
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <script src="../inc/js/fileUploadPDF.js"></script>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
</body>

</html>