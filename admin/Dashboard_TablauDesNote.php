<?php
session_start();
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] == false) {
    header("Location: ../admin/LogIn.php");
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>ISTA Larache - Tablau Des Notes</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="stylesheet" href="../inc/css/admin_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="../inc/js/functions.inc.js"></script>

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

        .table tr td[id="active"] {
            background-color: #0d5f1125 !important;
            box-shadow: inset 0px 0px 0px 2px #2b7d2e7e;
        }

        .table tr td[id="active"]:hover {
            background-color: #2b7d2e1e !important;
            box-shadow: inset 0px 0px 0px 3px #2b7d2e7e;
        }

        .table tr td#active[scope="row"] {
            background-color: #0354B4 !important;

            box-shadow: inset 0px 0px 0px 2px #2b7d2e7e;
        }

        .table tr td#active[scope="row"]:hover {
            background-color: #0354B4 !important;
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                    <button type="button" id="ConfirmationOk" class="btn btn-danger">Oui</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmChanges(model, title, contenu, callback) {
            if (model != null) $(model).modal('hide');
            $(".YesOrNoConfirmation").unbind();
            $(".YesOrNoConfirmation").find('button[id="ConfirmationOk"]').unbind();
            $(".YesOrNoConfirmation").on("hide.bs.modal", () => {
                if (model != null) $(model).modal('show');
            });
            $(".YesOrNoConfirmation").modal('show');
            $(".YesOrNoConfirmation").find('#exampleModalLabel').text(title);
            if (contenu != "") {
                $(".YesOrNoConfirmation").find('#modelbody').show();
                $(".YesOrNoConfirmation").find('#modelbody').html(contenu);
            } else {
                $(".YesOrNoConfirmation").find('#modelbody').hide();
            }
            $(".YesOrNoConfirmation").find('button[id="ConfirmationOk"]').on("click", () => {
                $(".YesOrNoConfirmation").modal('hide');
                callback();
            });
        }
    </script>

    <div class="row m-0 h-100">

        <!--Side Menu-->
        <?php require_once("../admin/inc/sidemenu.inc.php") ?>

        <div class="col-10 overflow-hidden ps-5 pt-2 pe-5">
            <!--HEADER-->
            <div class="Header  mt-2 ms-3 me-3">
                <div class="PageTitle float-start fw-bolder">
                    <h2><b>Tableau des Notes</b></h2>
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
                            $("#Btn_Deconnect").on("click", () => {
                                $.post("../inc/functions.inc.php", {
                                    function_name: "disconnect"
                                }, function(d) {
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
            <input id="t" class="viewTablauxCheckbox btn btn-primary" type="checkbox" value="TestTransition" style="display: none;">
            <!--QUICK TAPS-->
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
                <div id="active" class=" Selecting">

                    <div class="d-flex flex-row flex-wrap justify-content-start">

                        <div class="m-2 ScrollTable Tab1 ScrollTable-FixWidth position-relative rounded-4 overflow-hidden ">
                            <div class="Title text-center w-100 bg-primary text-white p-2 rounded-pill shadow position-absolute  ">
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
                                <!-- <input id="active"
                                    class="item-centent rounded-0 btn bg-black text-center mt-1 p-2 bg-opacity-25"
                                    type="button" value="DWS101">
                                <input class="item-centent rounded-0 btn bg-black text-center mt-1 p-2 bg-opacity-25"
                                    type="button" value="DWS101">
                                <input class="item-centent rounded-0 btn bg-black text-center mt-1 p-2 bg-opacity-25"
                                    type="button" value="DWS101">
                                <input class="item-centent rounded-0 btn bg-black text-center mt-1 p-2 bg-opacity-25"
                                    type="button" value="DWS101">
                                <input class="item-centent rounded-0 btn bg-black text-center mt-1 p-2 bg-opacity-25"
                                    type="button" value="DWS101"> -->





                            </div>
                        </div>


                        <div class="m-2 ScrollTable Tab2 ScrollTable-FixWidth position-relative rounded-4 overflow-hidden " style="display: none;">
                            <div class="Title text-center w-100 bg-primary text-white p-2 rounded-pill shadow position-absolute  ">
                                <b>Stagiaire</b>
                            </div>
                            <div class="Content d-flex bg-black  bg-opacity-25 flex-column justify-content-start">
                                <div class="item-centent text-center  p-3 bg-black bg-opacity-25">
                                    .....
                                </div>
                                <input class="item-centent rounded-0 btn bg-black text-center mt-1 p-2 bg-opacity-25" type="button" value="DWS101">
                                <input class="item-centent rounded-0 btn bg-black text-center mt-1 p-2 bg-opacity-25" type="button" value="DWS101">
                                <input class="item-centent rounded-0 btn bg-black text-center mt-1 p-2 bg-opacity-25" type="button" value="DWS101">
                                <input class="item-centent rounded-0 btn bg-black text-center mt-1 p-2 bg-opacity-25" type="button" value="DWS101">
                                <input id="active" class="item-centent rounded-0 btn bg-black text-center mt-1 p-2 bg-opacity-25" type="button" value="DWS101">
                                <input class="item-centent rounded-0 btn bg-black text-center mt-1 p-2 bg-opacity-25" type="button" value="DWS101">





                            </div>
                        </div>



                        <div class="m-2 ScrollTable Tab3 ScrollTable-2 position-relative rounded-4 overflow-hidden " style="display: none;">
                            <div class="Title text-center w-100 bg-primary text-white p-2 rounded-pill shadow position-absolute  ">
                                <b>Liste des information</b>
                            </div>
                            <div class="Content p-4 d-flex bg-black  bg-opacity-25 flex-column justify-content-start">

                                <table class="w-100 mt-5">
                                    <tr>
                                        <td>
                                            <div class="form-label">Nom :</div>
                                        </td>
                                        <td>
                                            <div class="form-label" id="nom_personel">Raddah </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-label">Prenom :</div>
                                        </td>
                                        <td>
                                            <div class="form-label" id="prenom">Acharf </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-label">Group :</div>
                                        </td>
                                        <td>
                                            <div class="form-label" id="groupId">DWFS202 </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="d-grid gap-2 w-100">
                                                <button type="button" name="" id="" class="btn btn-primary">Acceder aux
                                                    tablaux</button>
                                            </div>
                                        </td>
                                    </tr>
                                </table>





                            </div>
                        </div>
                        <script type="text/javascript">
                            $(".ScrollTable.Tab1").find("input").on("click", function() {
                                $(".ScrollTable.Tab1").find("input").attr("id", "");
                                $(this).attr("id", "active");
                                var group_id = $(this).val();

                                $(".ScrollTable.Tab3").hide();
                                $(".ScrollTable.Tab2").find("input").each((index, Element) => {
                                    Element.remove();
                                });
                                $.post("../inc/functions.inc.php", {
                                    function_name: "executeRequete",
                                    requet: "SELECT * from enseigner where Groupe_Stagiaires_code_groupe_Groupe='" + group_id + "';"
                                }, function(d) {
                                    // Handle the response here
                                    console.log(group_id);
                                    var data = JSON.parse(d);
                                    console.log(data);
                                    $.post("../inc/functions.inc.php", {
                                        function_name: "executeRequete",
                                        requet: "SELECT * from membre where IdMembres in (" + data.map(item => item['Membre_IdMembres'] + "").join(",") + ");"
                                    }, function(d) {

                                        var data = JSON.parse(d);
                                        window.selected = data;
                                        window.selected_group_id = group_id;
                                        console.log(window.selected);
                                        $(".ScrollTable.Tab2").show();
                                        $(".ScrollTable.Tab2").find("input").each((index, Element) => {
                                            Element.remove();
                                        });
                                        $(".ScrollTable.Tab3").hide();
                                        console.log(window.selected.length);
                                        for (var i = 0; i < window.selected.length; i++) {
                                            var $input = $("<input>");
                                            $input.attr("class", "item-centent rounded-0 btn bg-black text-center mt-1 p-2 bg-opacity-25");
                                            $input.val(window.selected[i]['nom_personnel']);
                                            $(".ScrollTable.Tab2").find(".Content").append($input);
                                        }
                                        $(".ScrollTable.Tab2").find("input").on("click", function(e) {
                                            $(".ScrollTable.Tab2").find("input").attr("id", "");
                                            $(e.target).attr("id", "active");
                                            var user_id = $(e.target).val();
                                            console.log(user_id);
                                            $(".ScrollTable.Tab3").show();
                                            // $.post("../inc/functions.inc.php", { function_name: "executeRequete",requet:"SELECT * from membre where nom_personnel='"+user_id+"';" }, function(d) {
                                            // Handle the response here
                                            // console.log(data);
                                            // var data = JSON.parse(d);
                                            window.selected2 = window.selected.find(item => item['nom_personnel'] == user_id);
                                            console.log(window.selected2);
                                            $(".ScrollTable.Tab3").find("#nom_personel").text(window.selected2['nom_personnel']);
                                            $(".ScrollTable.Tab3").find("#prenom").text(window.selected2['nom_personnel']);
                                            $(".ScrollTable.Tab3").find("#groupId").text(window.selected_group_id);
                                            $(".ScrollTable.Tab3").find("button").unbind(onCLickAcceder);
                                            $(".ScrollTable.Tab3").find("button").on("click", onCLickAcceder);

                                            // });

                                        });
                                    });

                                });

                            });

                            var errorOccured = false;
                            var successOccured = false;
                            setInterval(() => {
                                if (errorOccured) {
                                    window.onFinish();
                                    showToast({
                                        type: "error",
                                        autoDismiss: true,
                                        message: "Une erreur s'est produite !"
                                    });
                                } else if (successOccured) {
                                    window.onFinish();
                                    showToast({
                                        type: "success",
                                        autoDismiss: true,
                                        message: "Enregister avec succès !"
                                    });
                                }
                                successOccured = false;
                                errorOccured = false;
                            }, 1000);

                            function onCLickAcceder() {
                                $(".viewTablauxCheckbox").prop("checked", true);
                                $.post("../inc/functions.inc.php", {
                                    function_name: "executeRequete",
                                    requet: "SELECT * from tableau_des_points where Membre_IdMembres='" + window.selected2['IdMembres'] + "';"
                                }, function(d) {
                                    // Handle the response here
                                    // console.log(data);
                                    var data = JSON.parse(d);
                                    window.selected3 = data;
                                    console.log(window.selected3);


                                    // les unite des formations
                                    $.post("../inc/functions.inc.php", {
                                        function_name: "executeRequete",
                                        requet: "SELECT * from unité_de_formation where Tableau_des_points_IdTableau_tableau='" + data[0]['IdTableau_tableau'] + "';"
                                    }, function(d) {
                                        // Handle the response here
                                        // console.log(data);
                                        var data = JSON.parse(d);
                                        window.unites_de_formation = data;
                                        console.log(window.unites_de_formation);
                                        // Apply
                                        // Reset
                                        $(".NoteTable").find("td").attr("id", "");
                                        $(".NoteTable").find("#Apply").on("click", () => {
                                            confirmChanges(null, "Appliquer les modifications", "Voulez-vous vraiment appliquer les modifications ?", () => {
                                                // $.post("../inc/functions.inc.php", { 
                                                //     function_name: "executeRequete",
                                                //     msgSuccess:"Utilisateur supprimé avec succès",
                                                //     msgFaild:"Une erreur s'est produite",
                                                //     requet:"DELETE from membre where IdMembres='"+window.selected[0].IdMembres+"';" 
                                                // }, function(d) {
                                                //     // Handle the response here


                                                //     // setTimeout(location.reload(),1000);
                                                //     if(d=="error"){
                                                //         showToast({
                                                //             type:"error",
                                                //             autoDismiss: true,
                                                //             message:"Une erreur s'est produite !"
                                                //         });
                                                //     }else{
                                                //         showToast({
                                                //             type:"success",
                                                //             autoDismiss: true,
                                                //             message:"Modifications appliquées avec succès !"
                                                //         });

                                                //     }
                                                // });
                                                $(".NoteTable").find("#Apply").prop("disabled", true);

                                                window.unites_de_formation.forEach((unite, index, arr) => {
                                                    // $(".NomModule_"+(index+1)).find("input").val(unite['nom_Unité_de_formation']);
                                                    window.uniteID = unite['IdFormation'];
                                                    var onfinish = () => {
                                                        unite.notes.forEach((note, index, arr) => {
                                                            if (note.isDeleted != undefined) {
                                                                if (note.isDeleted) {
                                                                    if (note.IdFormation != undefined) {

                                                                        // $(".total_"+(index+1)).find("input").val(parseInt(total/unite.notes.length));
                                                                        $.post("../inc/functions.inc.php", {
                                                                                function_name: "executeRequeteResponse",
                                                                                msgSuccess: "Message supprimé avec succès",
                                                                                msgFaild: "Une erreur s'est produite",
                                                                                requet: "DELETE FROM `note` WHERE `idNote`=" + note["idNote"] + ";"
                                                                            },
                                                                            function(d) {
                                                                                // Handle the response here
                                                                                // $(".DeleteConfirmation").modal('hide');

                                                                                console.log(d);
                                                                                // setTimeout(location.reload(),1000);
                                                                                if (d == "error") {
                                                                                    errorOccured = true;


                                                                                } else {
                                                                                    note.isChanged = false;
                                                                                    // window.container.remove();
                                                                                    successOccured = true;


                                                                                }
                                                                            });
                                                                    }
                                                                }
                                                            }
                                                            if (note.isChanged != undefined) {
                                                                if (note.isChanged) {

                                                                    if (note.idNote != undefined) {

                                                                        // $(".total_"+(index+1)).find("input").val(parseInt(total/unite.notes.length));
                                                                        $.post("../inc/functions.inc.php", {
                                                                                function_name: "executeRequeteResponse",
                                                                                msgSuccess: "Message supprimé avec succès",
                                                                                msgFaild: "Une erreur s'est produite",
                                                                                requet: "UPDATE `note` SET `nomber`='" + note['nomber'] + "' WHERE `idNote`=" + note['idNote'] + ";"
                                                                            },
                                                                            function(d) {
                                                                                // Handle the response here
                                                                                // $(".DeleteConfirmation").modal('hide');

                                                                                console.log(d);
                                                                                // setTimeout(location.reload(),1000);
                                                                                if (d == "error") {
                                                                                    errorOccured = true;


                                                                                } else {
                                                                                    note.isChanged = false;
                                                                                    // window.container.remove();
                                                                                    successOccured = true;


                                                                                }
                                                                            });
                                                                    } else {
                                                                        console.log(window.uniteID);
                                                                        $.post("../inc/functions.inc.php", {
                                                                                function_name: "executeRequeteResponse",
                                                                                msgSuccess: "Message supprimé avec succès",
                                                                                msgFaild: "Une erreur s'est produite",
                                                                                requet: "INSERT INTO `note`( `nomber`, `index`, `Unité_de_formation_IdFormation`) VALUES ('" + note['nomber'] + "','" + note['index'] + "','" + window.uniteID + "');"
                                                                            },
                                                                            function(d) {
                                                                                // Handle the response here
                                                                                // $(".DeleteConfirmation").modal('hide');

                                                                                console.log(d);
                                                                                // setTimeout(location.reload(),1000);
                                                                                if (d == "error") {
                                                                                    errorOccured = true;

                                                                                } else {
                                                                                    note.isChanged = false;
                                                                                    // window.container.remove();
                                                                                    successOccured = true;


                                                                                }
                                                                            });
                                                                    }
                                                                }
                                                            }

                                                        })
                                                    }
                                                    if (unite.isDeleted != undefined) {
                                                        if (unite.isDeleted) {
                                                            if (unite.IdFormation != undefined) {

                                                                // $(".total_"+(index+1)).find("input").val(parseInt(total/unite.notes.length));
                                                                $.post("../inc/functions.inc.php", {
                                                                        function_name: "executeRequeteResponse",
                                                                        msgSuccess: "Message supprimé avec succès",
                                                                        msgFaild: "Une erreur s'est produite",
                                                                        requet: "DELETE FROM `unité_de_formation` WHERE `IdFormation`=" + unite["IdFormation"] + ";"
                                                                    },
                                                                    function(d) {
                                                                        // Handle the response here
                                                                        // $(".DeleteConfirmation").modal('hide');

                                                                        console.log(d);
                                                                        // setTimeout(location.reload(),1000);
                                                                        if (d == "error") {
                                                                            errorOccured = true;


                                                                        } else {
                                                                            unite.isChanged = false;
                                                                            // window.container.remove();
                                                                            successOccured = true;
                                                                            onfinish();


                                                                        }
                                                                    });
                                                            }
                                                        }
                                                    }
                                                    if (unite.isChanged != undefined) {
                                                        if (unite.isChanged) {

                                                            if (unite.IdFormation != undefined) {

                                                                // $(".total_"+(index+1)).find("input").val(parseInt(total/unite.notes.length));
                                                                $.post("../inc/functions.inc.php", {
                                                                        function_name: "executeRequeteResponse",
                                                                        msgSuccess: "Message supprimé avec succès",
                                                                        msgFaild: "Une erreur s'est produite",
                                                                        requet: "UPDATE `unité_de_formation` SET `nom_Unité_de_formation`='" + unite['nom_Unité_de_formation'] + "' WHERE `IdFormation`=" + unite['IdFormation'] + ";"
                                                                    },
                                                                    function(d) {
                                                                        // Handle the response here
                                                                        // $(".DeleteConfirmation").modal('hide');

                                                                        console.log(d);
                                                                        // setTimeout(location.reload(),1000);
                                                                        if (d == "error") {
                                                                            errorOccured = true;


                                                                        } else {
                                                                            unite.isChanged = false;
                                                                            // window.container.remove();
                                                                            successOccured = true;
                                                                            onfinish();


                                                                        }
                                                                    });
                                                            } else {
                                                                $.post("../inc/functions.inc.php", {
                                                                        function_name: "executeRequeteResponse2",
                                                                        msgSuccess: "Message supprimé avec succès",
                                                                        msgFaild: "Une erreur s'est produite",
                                                                        requet: "INSERT INTO `unité_de_formation`(`nom_Unité_de_formation`, `Tableau_des_points_IdTableau_tableau`, `index`) VALUES ('" + unite['nom_Unité_de_formation'] + "','" + unite['Tableau_des_points_IdTableau_tableau'] + "','" + unite['index'] + "');"
                                                                    },
                                                                    function(d) {
                                                                        // Handle the response here
                                                                        // $(".DeleteConfirmation").modal('hide');

                                                                        console.log(d);
                                                                        var s = JSON.parse(d);
                                                                        console.log(s);
                                                                        // setTimeout(location.reload(),1000);
                                                                        if (s.state == "error") {
                                                                            errorOccured = true;

                                                                        } else {
                                                                            window.uniteID = s.lastId;
                                                                            console.log(window.uniteID);
                                                                            unite.isChanged = false;
                                                                            unite.isDeleted = false;
                                                                            // window.container.remove();
                                                                            successOccured = true;
                                                                            unite.IdFormation = s.lastId;
                                                                            onfinish();


                                                                        }
                                                                    });
                                                            }
                                                        }
                                                    }
                                                    if (unite.isDeleted == undefined || unite.isChanged == undefined) {
                                                        onfinish();
                                                    } else if (unite.isDeleted == false || unite.isChanged == false) {
                                                        onfinish();
                                                    }

                                                });
                                            });
                                        });
                                        $(".NoteTable").find("td").on("change", (e) => {
                                            $(e.target).parent().attr("id", "active");
                                            // $(".NoteTable").find("#Apply").prop("disabled",false);
                                            if ($(e.target).hasClass("NameModuleInput")) {
                                                var index = $(e.target).parent().parent().index();
                                                var unite = window.unites_de_formation.find(i=>i.index==index);
                                                if (unite == undefined) {

                                                    var unite = {
                                                        index: index,
                                                        "nom_Unité_de_formation": $(e.target).val(),
                                                        Tableau_des_points_IdTableau_tableau: window.selected3[0]['IdTableau_tableau'],
                                                        notes: [],
                                                        isChanged: true,
                                                        isDeleted: false
                                                    };
                                                    $(e.target).parent().parent().find("input[type='number']").each((index2, element) => {
                                                        if ($(element).val() != "") {
                                                            unite.notes = [...unite.notes, {
                                                                index: index2,
                                                                nomber: $(element).val(),
                                                                isChanged: true,
                                                                isDeleted: false
                                                            }];
                                                            
                                                        }
                                                    });
                                                    $(".NoteTable").find("#Apply").prop("disabled", false);
                                                    window.unites_de_formation = [...window.unites_de_formation, unite];
                                                    window.onFinish();
                                                } else {
                                                    if ($(e.target).val() != "") {
                                                        unite["nom_Unité_de_formation"] = $(e.target).val();
                                                        unite.isChanged = true;
                                                        unite.isDeleted = false;
                                                        $(".NoteTable").find("#Apply").prop("disabled", false);
                                                        window.onFinish();
                                                    } else {
                                                        unite.isChanged = false;
                                                        unite.isDeleted = true;
                                                        $(".NoteTable").find("#Apply").prop("disabled", false);
                                                        window.onFinish();
                                                    }
                                                }
                                            } else {
                                                if ($(e.target).parent().parent().first().find("input").val() != "") {
                                                    var index = $(e.target).parent().parent().index();
                                                    var unite = window.unites_de_formation.find(i=>i.index==index);

                                                    var index2 = $(e.target).parent().index() - 1;
                                                    var note = unite.notes.find(i=>i.index==index2);
                                                    if (note == undefined) {

                                                        unite.notes = [...unite.notes, {
                                                            index: index2,
                                                            nomber: $(e.target).val(),
                                                            isChanged: true,
                                                            isDeleted: false
                                                        }];
                                                        console.log(unite);
                                                        $(".NoteTable").find("#Apply").prop("disabled", false);
                                                        window.onFinish();
                                                    } else {
                                                        if ($(e.target).val() != "") {
                                                            unite.notes.find(i=>i.index=index2).nomber = $(e.target).val();
                                                            unite.notes.find(i=>i.index=index2).isChanged = true;
                                                            unite.notes.find(i=>i.index=index2).isDeleted = false;
                                                            $(".NoteTable").find("#Apply").prop("disabled", false);
                                                            window.onFinish();
                                                        } else {
                                                            unite.notes.find(i=>i.index=index2).isChanged = false;
                                                            unite.notes.find(i=>i.index=index2).isDeleted = true;
                                                            $(".NoteTable").find("#Apply").prop("disabled", false);
                                                            window.onFinish();
                                                        }
                                                        console.log($(e.target));
                                                        console.log(unite);
                                                    }

                                                }
                                            }
                                        });
                                        window.onFinish = () => {

                                            console.log(window.unites_de_formation);
                                            //parse information
                                            $(".NoteTable").find("td").attr("id", "");
                                            $(".NoteTable").find("td input").val("");
                                            window.unites_de_formation.forEach((unite, index, arr) => {
                                                var total = 0;
                                                var _index = (index + 1);
                                                if (unite.index != undefined) {
                                                    _index = unite.index + 1;
                                                }
                                                $(".NomModule_" + _index).find("input").val(unite['nom_Unité_de_formation']);
                                                unite.notes.forEach((note, index2, arr) => {
                                                    var _index2 = (index2 + 1);
                                                    if (note.index != undefined) {
                                                        _index2 = note.index + 1;
                                                    }
                                                    $(".note_" + _index + "_" + _index2).find("input").val(note['nomber']);
                                                    $(".note_" + _index + "_" + _index2).attr("id", "active");
                                                    total += parseFloat(note['nomber']);
                                                });
                                                $(".total_" + _index).find("input").val(parseInt(total / unite.notes.length));
                                            });
                                        }
                                        $(".NoteTable").find("#Reset").on("click", (e) => {
                                            confirmChanges(null, "Réinitialiser les modifications", "Voulez-vous vraiment réinitialiser les modifications ?", () => {

                                                $(".NoteTable").find("#Apply").prop("disabled", true);
                                                $.post("../inc/functions.inc.php", {
                                                    function_name: "executeRequete",
                                                    requet: "SELECT * from unité_de_formation where Tableau_des_points_IdTableau_tableau='" + window.selected3[0]['IdTableau_tableau'] + "';"
                                                }, function(d) {
                                                    // Handle the response here
                                                    // console.log(data);
                                                    var data = JSON.parse(d);
                                                    window.unites_de_formation = data;
                                                    console.log(window.unites_de_formation);
                                                    var count = 0;
                                                    window.unites_de_formation.forEach(unite => {
                                                        unite.notes = [];
                                                        $.post("../inc/functions.inc.php", {
                                                            function_name: "executeRequete",
                                                            requet: "SELECT * from note where Unité_de_formation_IdFormation='" + unite['IdFormation'] + "';"
                                                        }, function(d) {
                                                            // Handle the response here
                                                            // console.log(data);
                                                            var data = JSON.parse(d);
                                                            unite.notes = [...unite.notes, ...data];
                                                            count++;
                                                            if (window.unites_de_formation.length == count) {
                                                                window.onFinish();
                                                            }
                                                        });
                                                    });
                                                });
                                            });
                                        });
                                        var count = 0;
                                        window.unites_de_formation.forEach(unite => {
                                            unite.notes = [];
                                            $.post("../inc/functions.inc.php", {
                                                function_name: "executeRequete",
                                                requet: "SELECT * from note where Unité_de_formation_IdFormation='" + unite['IdFormation'] + "';"
                                            }, function(d) {
                                                // Handle the response here
                                                // console.log(data);
                                                var data = JSON.parse(d);
                                                unite.notes = [...unite.notes, ...data];
                                                count++;
                                                if (window.unites_de_formation.length == count) {
                                                    window.onFinish();
                                                }
                                            });
                                        });



                                    });
                                });
                            }
                            $(".NoteTable .Retour").find("button").on("click", () => {
                                $(".viewTablauxCheckbox").prop("checked", false);
                            });
                        </script>


                    </div>


                </div>
                <div id="" class="NoteTable">

                    <div class="Retour mb-3">
                        <button type="button" name="" id="" class="btn btn-primary">Retour en arrière</button>
                    </div>
                    <table class="table
                        
                        table-bordered 
                        table-primary
                        align-middle">
                        <thead>
                            <tr class="bg-primary ">
                                <th scope="col" class="bg-primary text-white">La matiere</th>
                                <th scope="col" class="bg-primary text-white ">Control 1</th>
                                <th scope="col" class="bg-primary text-white ">Control 2</th>
                                <th scope="col" class="bg-primary text-white ">Control 3</th>
                                <th scope="col" class="bg-primary text-white ">Control 4</th>
                                <th scope="col" class="bg-primary text-white">Total</th>
                            </tr>
                        </thead>
                        <style>
                            .NameModuleInput {
                                border: none;
                                background-color: transparent;
                                color: inherit;
                            }

                            .NoteTable td {
                                padding: 0;
                            }

                            .NoteTable input[type="number"] {
                                border: none;
                                border-radius: 0;
                                background-color: transparent;
                                color: inherit;
                                appearance: textfield;


                            }

                            .NoteTable input[type="number"].form-control:focus {

                                outline: 0;
                                box-shadow: 0 0 0 .25rem rgba(13, 110, 253, .25);
                            }
                        </style>
                        <tbody>
                            <tr class="">
                                <td scope="row" class="bg-primary text-white NomModule_1"><input type="text" value="MDT_101" class="NameModuleInput form-control"></td>
                                <td class="note_1_1"><input type="number" class="form-control form-control-sm" value="0"></td>
                                <td class="note_1_2"><input type="number" class="form-control form-control-sm"></td>
                                <td class="note_1_3"><input type="number" class="form-control form-control-sm"></td>
                                <td class="note_1_4"><input type="number" class="form-control form-control-sm"></td>
                                <td class="total_1"><input type="number" disabled class="form-control form-control-sm" value="0"></td>
                            </tr>
                            <tr class="">
                                <td scope="row" class="bg-primary text-white NomModule_2"><input type="text" value="" class="NameModuleInput form-control"></td>
                                <td class="note_2_1"><input type="number" class="form-control form-control-sm"></td>
                                <td class="note_2_2"><input type="number" class="form-control form-control-sm"></td>
                                <td class="note_2_3"><input type="number" class="form-control form-control-sm"></td>
                                <td class="note_2_4"><input type="number" class="form-control form-control-sm"></td>
                                <td class="total_2"><input type="number" disabled class="form-control form-control-sm"></td>
                            </tr>
                            <tr class="">
                                <td scope="row" class="bg-primary text-white NomModule_3"><input type="text" value="" class="NameModuleInput form-control"></td>
                                <td class="note_3_1"><input type="number" class="form-control form-control-sm"></td>
                                <td class="note_3_2"><input type="number" class="form-control form-control-sm"></td>
                                <td class="note_3_3"><input type="number" class="form-control form-control-sm"></td>
                                <td class="note_3_4"><input type="number" class="form-control form-control-sm"></td>
                                <td class="total_3"><input type="number" disabled class="form-control form-control-sm"></td>
                            </tr>
                            <tr class="">
                                <td scope="row" class="bg-primary text-white NomModule_4"><input type="text" value="" class="NameModuleInput form-control"></td>
                                <td class="note_4_1"><input type="number" class="form-control form-control-sm"></td>
                                <td class="note_4_2"><input type="number" class="form-control form-control-sm"></td>
                                <td class="note_4_3"><input type="number" class="form-control form-control-sm"></td>
                                <td class="note_4_4"><input type="number" class="form-control form-control-sm"></td>
                                <td class="total_4"><input type="number" disabled class="form-control form-control-sm"></td>
                            </tr>
                            <tr class="">
                                <td scope="row" class="bg-primary text-white NomModule_5"><input type="text" value="" class="NameModuleInput form-control"></td>
                                <td class="note_5_1"><input type="number" class="form-control form-control-sm"></td>
                                <td class="note_5_2"><input type="number" class="form-control form-control-sm"></td>
                                <td class="note_5_3"><input type="number" class="form-control form-control-sm"></td>
                                <td class="note_5_4"><input type="number" class="form-control form-control-sm"></td>
                                <td class="total_5"><input type="number" disabled class="form-control form-control-sm"></td>
                            </tr>
                            <tr class="">
                                <td scope="row" class="bg-primary text-white NomModule_6"><input type="text" value="" class="NameModuleInput form-control"></td>
                                <td class="note_6_1"><input type="number" class="form-control form-control-sm"></td>
                                <td class="note_6_2"><input type="number" class="form-control form-control-sm"></td>
                                <td class="note_6_3"><input type="number" class="form-control form-control-sm"></td>
                                <td class="note_6_4"><input type="number" class="form-control form-control-sm"></td>
                                <td class="total_6"><input type="number" disabled class="form-control form-control-sm"></td>
                            </tr>
                            <tr class="">
                                <td scope="row" class="bg-primary text-white NomModule_7"><input type="text" value="" class="NameModuleInput form-control"></td>
                                <td class="note_7_1"><input type="number" class="form-control form-control-sm"></td>
                                <td class="note_7_2"><input type="number" class="form-control form-control-sm"></td>
                                <td class="note_7_3"><input type="number" class="form-control form-control-sm"></td>
                                <td class="note_7_4"><input type="number" class="form-control form-control-sm"></td>
                                <td class="total_7"><input type="number" disabled class="form-control form-control-sm"></td>
                            </tr>
                            <tr class="">
                                <td scope="row" class="bg-primary text-white NomModule_8"><input type="text" value="" class="NameModuleInput form-control"></td>
                                <td class="note_8_1"><input type="number" class="form-control form-control-sm"></td>
                                <td class="note_8_2"><input type="number" class="form-control form-control-sm"></td>
                                <td class="note_8_3"><input type="number" class="form-control form-control-sm"></td>
                                <td class="note_8_4"><input type="number" class="form-control form-control-sm"></td>
                                <td class="total_8"><input type="number" disabled class="form-control form-control-sm"></td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- SOON <table class="table w-50
                        table-bordered 
                        table-primary
                        align-middle">
                        <thead style="opacity: 0; border:none;">
                            <tr style="border:none;">
                                <th scope="col" class="bg-primary text-white">La matiere</th>
                                <th scope="col" class="bg-primary text-white">Control 1</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <td scope="row" class="bg-primary text-white GNomModule_1"><input type="text" value="" class="NameModuleInput form-control"></td>
                                <td class="Gnote_1"><input type="number" class=" form-control form-control-sm"></td>

                            </tr>
                            <tr class="">
                                <td scope="row" class="bg-primary text-white GNomModule_2"><input type="text" value="" class="NameModuleInput form-control"></td>
                                <td class="Gnote_2"><input type="number" class=" form-control form-control-sm"></td>
                            </tr>

                        </tbody>
                    </table> -->
                    <div class=" mb-3">
                        <button type="button" id="Apply" class="btn btn-success" disabled>Appliquer les modifications</button>
                        <button type="button" id="Reset" class="btn btn-danger">Réinitialiser les modifications</button>
                    </div>



                </div>
                <script>
                    $(".NoteTable .Retour").find("button").on("click", () => {
                        $(".viewTablauxCheckbox").prop("checked", false);
                    });
                </script>
            </div>


        </div>
    </div>
    <div style="display: none;" class="position-absolute  w-100 h-100 top-50 start-50 translate-middle p-0 m-0 PopupBackground">
        <div class="container-lg  position-absolute shadow-1  top-50 start-50 translate-middle overflow-hidden bg-white rounded-4 p-0">
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
                                        <input type="text" class="form-control m-0 " disabled name="" id="" aria-describedby="helpId" placeholder="">
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
                                        <input type="text" class="form-control rounded-start rounded-0 m-0 " disabled name="" id="" aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="col-6    p-0 m-0">
                                        <input type="text" class="form-control rounded-end rounded-0  m-0 " name="" id="" aria-describedby="helpId" placeholder="">
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
                                        <input type="text" class="form-control rounded-start rounded-0 m-0 " disabled name="" id="" aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="col-6    p-0 m-0">
                                        <input type="text" class="form-control rounded-end rounded-0  m-0 " name="" id="" aria-describedby="helpId" placeholder="">
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
                                        <input type="date" class="form-control rounded-start rounded-0 m-0 " disabled name="" id="" aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="col-6    p-0 m-0">
                                        <input type="date" class="form-control rounded-end rounded-0  m-0 " name="" id="" aria-describedby="helpId" placeholder="">
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

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>