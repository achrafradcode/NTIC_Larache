<?php
session_start();
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] == false) {
    header("Location: ../admin/LogIn.php");
} else {
    require_once("../inc/functions.inc.php");
    if (isset($_POST["Titre"])) {
        $urlFile = $_POST["imageFile"];
        $Titre = $_POST["Titre"];
        $Description = $_POST["Description"];
        $content = $_POST["content"];
        $Membre_IdMembres = $_POST["Membre_IdMembres"];





        try {
            $stmt = executeRequete("SELECT * FROM photo WHERE url='$urlFile'");
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $IdPhoto = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]["IdPhoto"];
            } else {

                // $pdo->rollback();
                echo "error";
                $result["error"] = ["msg" => "error ??", "msgDet" => "verify les inputs entrer ou contacter le support .[" . $e->getMessage() . "]"];
                die("");
            }
        } catch (Exception $e) {
            // $pdo->rollback();
            // $result["error"] = ["msg"=>"error ??","msgDet"=>"verify les inputs entrer ou contacter le support .[".$e->getMessage()."]"];
            die("Error querying database: " . $e->getMessage());
        }

        try {
            $data = [[
                "$Titre",
                "$Description",
                "$content",
                "$IdPhoto",
                $Membre_IdMembres
            ]];


            $sql = "INSERT INTO `articles_d'actualité`(`titre_de_l'actualité`
                        , `Description`
                        , `contenu`
                        , `IdPhoto`
                        , `date_de_publication`
                        , `Membre_IdMembres`) 
                        VALUES (?
                        ,?
                        ,?
                        ,?
                        ,curdate()
                        ,?)";
            $stmt = executeRequete($sql);


            $pdo->beginTransaction();
            foreach ($data as $row) {
                $stmt->execute($row);
            }
            $pdo->commit();
            $result["success"] = ["msg" => "successfully", "msgDet" => "Annonce ajouter !"];
        } catch (Exception $e) {
            $pdo->rollback();
            $result["error"] = ["msg" => "error ??", "msgDet" => "verify les inputs entrer ou contacter le support .[" . $e->getMessage() . "]"];
            // die("Error querying database: " . $e->getMessage());
        }
    }
    if (isset($_POST["idArticle"])) {
        try {
            $idArticle = $_POST["idArticle"];
            $urlFile = $_POST["imageFile"];
            $Titre = $_POST["Titre_De_Article"];
            $Description = $_POST["Description_De_Article"];
            $content = $_POST["content"];
            $date_de_publication = $_POST["date_de_publication"];
            $Membre_IdMembres = $_POST["Membre_IdMembres"];


            try {
                $stmt = executeRequete("SELECT * FROM photo WHERE url='$urlFile'");
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $IdPhoto = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]["IdPhoto"];
                } else {

                    // $pdo->rollback();
                    echo "error";
                    $result["error"] = ["msg" => "error ??", "msgDet" => "verify les inputs entrer ou contacter le support .[" . $e->getMessage() . "]"];
                    die("");
                }
            } catch (Exception $e) {
                // $pdo->rollback();
                // $result["error"] = ["msg"=>"error ??","msgDet"=>"verify les inputs entrer ou contacter le support .[".$e->getMessage()."]"];
                die("Error querying database: " . $e->getMessage());
            }




            $data = [[
                "$Titre",
                "$Description",
                "$content",
                "$date_de_publication",
                $IdPhoto,
                "$Membre_IdMembres",
                $idArticle
            ]];


            $sql = "UPDATE `articles_d'actualité` SET 
                        `titre_de_l'actualité`=?,
                        `Description`=?,
                        `contenu`=?,
                        `date_de_publication`=?,
                        `IdPhoto`=?,
                        `Membre_IdMembres`=? 
                        WHERE IdArticle=?";
            $stmt = executeRequete($sql);


            $pdo->beginTransaction();
            foreach ($data as $row) {
                $stmt->execute($row);
            }
            $pdo->commit();
            $result["success"] = ["msg" => "successfully", "msgDet" => "Annonce a été enregistrer !"];
        } catch (Exception $e) {
            $pdo->rollback();
            $result["error"] = ["msg" => "error ??", "msgDet" => "verify les inputs entrer ou contacter le support .[" . $e->getMessage() . "]"];
            // die("Error querying database: " . $e->getMessage());
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>ISTA Larache - Articles</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5-upload/src/adapters/simpleuploadadapter.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="../inc/css/fileUplaod.css">
    
    <script src="../inc/js/functions.inc.js"></script>
    <link rel="stylesheet" href="../inc/css/admin_style.css">






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

        .filled {
            outline: none !important;
        }
    </style>
</head>

<body>
    <div class="position-absolute  w-50 start-50 translate-middle p-0 m-0 " style="top: 50px;">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </symbol>
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </symbol>
        </svg>
        <?php
        foreach ($result as $key => $value) {
            if ($key == "success") {
        ?>
                <div class="alert alert-success  alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <strong><?php echo $value["msg"] ?></strong> <?php echo $value["msgDet"] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            if ($key == "error") {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <strong><?php echo $value["msg"] ?></strong> <?php echo $value["msgDet"] ?>
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
    <!-- Vertically centered modal -->
    <!-- Modal -->
    <div class="DeleteConfirmation modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Supprimer Annonce</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Voulez-vous vraiment supprimer cet Annonce ?<strong> numero : [<span class="UserName"></span>]</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="DeleteConfirmationOk" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row m-0 h-100">

        <!--Side Menu-->
        <?php require_once("../admin/inc/sidemenu.inc.php") ?>

        <div class="col-10 ps-5 pt-2 pe-5">
            <!--HEADER-->
            <div class="Header  mt-2 ms-3 me-3">
                <div class="PageTitle float-start fw-bolder">
                    <h2><b>Ajouter Articles</b></h2>
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
            <!--QUICK TAPS-->
            <div class="TapPanel d-flex flex-column mt-2 ms-3 me-3">
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
                <div class="TapContent m-3 ">
                    <form method="POST" id="form">
                        <table class="w-100">
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <td>
                                    <fieldset id="upload_dropZone" class="upload_dropZone text-center mb-3 p-4">

                                        <legend class="visually-hidden">Image uploader</legend>



                                        <p class="small my-2"></p>

                                        <input id="upload_image_background" name="imageUpload" data-post-name="image_background" data-post-url="/uploads/" class="position-absolute invisible" type="file" multiple="true" accept="image/jpeg, image/png, image/svg+xml" />
                                        <input id="upload_image_file" name="imageFile" type="text" style="display:none;" />
                                        <progress id="progress-bar" max=100 value=0></progress>

                                        <label class="btn btn-upload mb-3" for="upload_image_background">Choose file(s)</label>

                                        <div style="display:none;" class="upload_gallery d-flex flex-wrap justify-content-center gap-3 mb-0"></div>

                                    </fieldset>
                                    <script>
                                        // $(window).on("load",()=>{

                                        //     $(".upload_dropZone").on("mouseenter",()=>{

                                        //         $(".upload_dropZone").find("svg , p ").css("opacity", 0);
                                        //         $(".upload_dropZone").find(" label").css("opacity", 0.1);
                                        //     });
                                        //     $(".upload_dropZone").on("mouseleave",()=>{
                                        //         $(".upload_dropZone").find("svg , p  , label").css("opacity", 0.3);
                                        //     });
                                        //     $(".upload_dropZone").find("svg , p  , label").css("opacity", 0.3);

                                        // });
                                    </script>
                                </td>

                                <td colspan="2" style="width: 100%;padding: 20px;">
                                    <div class="h-100">
                                        <label for="" class="form-label">Titre de Article</label>
                                        <input type="text" class="form-control w-100" name="Titre" id="Titre" aria-describedby="helpId" placeholder="">

                                        <label for="" class="form-label mt-3">Description de Article</label>
                                        <input type="text" class="form-control w-100" name="Description" id="Description" aria-describedby="helpId" placeholder="">

                                        <label for="" class="form-label mt-3">Nom de l'editeur</label>
                                        <select class="form-select form-select-lg" name="Membre_IdMembres" id="Membre_IdMembres">
                                            <?php

                                            $stmt = executeRequete("SELECT * FROM membre;");
                                            $stmt->execute();
                                            $index = 0;

                                            foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
                                                $index = $index + 1;
                                            ?>
                                                <option <?php if ($_SESSION["username"] == $row["nom_personnel"]) echo "selected"; ?> value="<?php echo $row["IdMembres"]; ?>"><?php echo $row["nom_personnel"]; ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </td>
                            </tr>

                            <tr>

                                <td colspan="3">
                                    <!-- <input type="text"
                                    class="form-control w-100" name="" id="" aria-describedby="helpId" placeholder=""> -->

                                    <div class="form-control" name="mytextarea" id="mytextarea" rows="3"></div>
                                    <!-- <div id="mytextarea"></div> -->
                                    <input type="text" name="content" id="htmlContent" style="display:none;">
                                </td>
                            </tr>
                        </table>







                        <div class="w-100 mt-4 d-flex flex-row justify-content-end">
                            <div class="d-grid gap-2 pe-3">
                                <input type="reset" name="" id="" class="ps-4 pe-4 btn btn-primary" value="Reset" />
                            </div>
                            <div class="d-grid gap-2 pe-3">
                                <input type="button" name="" id="ajoutUser" class="ps-4 pe-4 btn btn-primary" value="Ajouter" />
                            </div>
                        </div>

                        <script>
                            $(".TapPanel").find("#ajoutUser").on("click", function() {
                                var htm = window.editor.data.get();
                                console.log(htm);
                                $("#htmlContent").val(htm);

                                var inputsFilled = $(".TapPanel").find("input,select,textarea").filter(function() {
                                    var l = $.trim($(this).val());
                                    if ($(this).attr("name") == "imageUpload" || !$(this).attr("name")) {
                                        console.log($(this).attr("name") + ":" + l + " IGNORE");
                                        return false;
                                    }
                                    if ($(this).attr("name") == "content") {
                                        console.log($(this).attr("name") + ":" + l + " IGNORE :: " + (l.length >= 50));
                                        return l.length <= 50;
                                    }

                                    console.log($(this).attr("name") + ":" + l + " :: " + (l.length == 0));
                                    return l.length == 0;
                                }).length == 0;
                                console.log(inputsFilled);

                                if (inputsFilled) {
                                    $(".TapPanel").find("#form").submit();
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
                        </script>
                    </form>
                </div>
            </div>
            <div class="contentPage  mt-5 ms-3 me-3">
                <!--Logs-->
                <div class="TapPanel  ">

                    <div class="TapTitle float-start fw-bold text-black-50">
                        <h4>Annonces</h4>
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
                                    <th>Titre de article</th>
                                    <th>Date de publication</th>
                                    <th>Id de l'editeur</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php

                                $stmt = executeRequete("SELECT * FROM `articles_d'actualité`;");
                                $stmt->execute();
                                $index = 0;

                                foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
                                    $index = $index + 1;
                                ?>
                                    <tr class="table-light">
                                        <td scope="row"><?php echo $index; ?></td>
                                        <td><?php echo $row["titre_de_l'actualité"]; ?></td>
                                        <td><?php echo $row['date_de_publication']; ?></td>
                                        <td><?php
                                            $index = $row["Membre_IdMembres"];
                                            $stmt = executeRequete("SELECT * FROM membre WHERE IdMembres=$index");
                                            $stmt->execute();
                                            echo $stmt->fetchAll(PDO::FETCH_ASSOC)[0]["nom_personnel"];
                                            ?></td>
                                        <td>
                                            <div class="d-flex flex-row justify-content-end ActionMembresContainer">
                                                <div class="d-grid gap-2 m-1 ">
                                                    <button type="button" name="" id="SeePass" class="btn p-1 btn-primary ">C</button>
                                                </div>
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
                                    $(".TapPanel").find('button[id="Modifier"]').on("click", fetchUser);

                                    function fetchUser() {
                                        window.selected = {
                                            'index': $(this).parent().parent().parent().parent().find("td:nth-child(1)").text(),
                                            "titre_de_l'actualité": $(this).parent().parent().parent().parent().find("td:nth-child(2)").text(),
                                            'date_de_publication': $(this).parent().parent().parent().parent().find("td:nth-child(3)").text(),
                                            'nom_personnel': $(this).parent().parent().parent().parent().find("td:nth-child(4)").text()
                                        };

                                        $(".PopupBackground").modal("show");

                                        $.post("../inc/functions.inc.php", {
                                            function_name: "executeRequete",
                                            requet: "SELECT * from `articles_d'actualité` where `titre_de_l'actualité`='" + window.selected["titre_de_l'actualité"] + "';"
                                        }, function(d) {
                                            // Handle the response here
                                            console.log(data);
                                            var data = JSON.parse(d);
                                            window.selected = data;
                                            console.log(window.selected);
                                            parseSelectionData();

                                        });
                                    }
                                    $(".TapPanel").find('button[id="Remove"]').on("click", deleteAnnonces);
                                    // $(".TapPanel").find('button[id="SeePass"]').on("click",seePassUser);
                                    $(".DeleteConfirmation").find('button[id="DeleteConfirmationOk"]').on("click", confirmDelete);

                                    function deleteAnnonces() {
                                        window.selected = {
                                            'index': $(this).parent().parent().parent().parent().find("td:nth-child(1)").text(),
                                            "titre_de_l'actualité": $(this).parent().parent().parent().parent().find("td:nth-child(2)").text(),
                                            'date_de_publication': $(this).parent().parent().parent().parent().find("td:nth-child(3)").text(),
                                            'nom_personnel': $(this).parent().parent().parent().parent().find("td:nth-child(4)").text()
                                        };

                                        window.container = $(this).parent().parent().parent().parent()[0];
                                        $.post("../inc/functions.inc.php", {
                                            function_name: "executeRequete",
                                            requet: "SELECT * from `articles_d'actualité` where `titre_de_l'actualité`='" + window.selected["titre_de_l'actualité"] + "';"
                                        }, function(d) {
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

                                    function confirmDelete() {
                                        $.post("../inc/functions.inc.php", {
                                            function_name: "executeRequete",
                                            msgSuccess: "Annonce supprimé avec succès",
                                            msgFaild: "Une erreur s'est produite",
                                            requet: "DELETE from `articles_d'actualité` where IdArticle='" + window.selected[0].IdArticle + "';"
                                        }, function(d) {
                                            // Handle the response here
                                            $(".DeleteConfirmation").modal('hide');

                                            window.container.remove();

                                            // setTimeout(location.reload(),1000);
                                            if (d == "error") {
                                                showToast({
                                                    type: "error",
                                                    autoDismiss: true,
                                                    message: "Une erreur s'est produite !"
                                                });
                                            } else {
                                                showToast({
                                                    type: "success",
                                                    autoDismiss: true,
                                                    message: "Annonce supprimé avec succès !"
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
    <div class="PopupBackground modal fade " id="exampleModal2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <form id="form" method="POST">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title col-2 w-100 ps-3 p-4 m-0 text-white    " id="exampleModalLabel"><b>Annonce Edit</b></h5>

                    </div>
                    <div class="modal-body" id="modelbody">

                        <table class="w-100">
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <td>
                                    <fieldset id="upload_dropZone2" class="upload_dropZone text-center mb-3 p-4">

                                        <legend class="visually-hidden">Image uploader</legend>



                                        <p class="small my-2"></p>

                                        <input id="upload_image_background2" name="imageUpload" data-post-name="image_background" data-post-url="/uploads/" class="position-absolute invisible" type="file" multiple="true" accept="image/jpeg, image/png, image/svg+xml" />
                                        <input id="upload_image_file2" name="imageFile" type="text" style="display:none;" />
                                        <progress id="progress-bar2" max=100 value=0></progress>

                                        <label class="btn btn-upload mb-3" for="upload_image_background2">Choose file(s)</label>

                                        <div style="display:none;" class="upload_gallery d-flex flex-wrap justify-content-center gap-3 mb-0"></div>

                                    </fieldset>
                                    <script>
                                        // $(window).on("load",()=>{

                                        //     $(".upload_dropZone").on("mouseenter",()=>{

                                        //         $(".upload_dropZone").find("svg , p ").css("opacity", 0);
                                        //         $(".upload_dropZone").find(" label").css("opacity", 0.1);
                                        //     });
                                        //     $(".upload_dropZone").on("mouseleave",()=>{
                                        //         $(".upload_dropZone").find("svg , p  , label").css("opacity", 0.3);
                                        //     });
                                        //     $(".upload_dropZone").find("svg , p  , label").css("opacity", 0.3);

                                        // });
                                    </script>
                                </td>

                                <td colspan="2" style="width: 100%;padding: 20px;">
                                    <div class="h-100">
                                        <label for="" class="form-label">Date de publication</label>

                                        <div class="row">
                                            <div class="col-6    p-0 m-0">
                                                <input type="date" class="form-control rounded-start rounded-0 m-0 " disabled name="old_Date_de_publication" id="old_Date_de_publication" aria-describedby="helpId" placeholder="">
                                            </div>
                                            <div class="col-6    p-0 m-0">
                                                <input type="date" class="form-control rounded-end rounded-0  m-0 " name="date_de_publication" id="Date_de_publication" aria-describedby="helpId" placeholder="">
                                            </div>
                                        </div>
                                        <label for="" class="form-label mt-3">Titre de Article</label>
                                        <div class="row">
                                            <div class="col-6    p-0 m-0">
                                                <input type="text" class="form-control rounded-start rounded-0 m-0 " disabled name="old_Titre_De_Article" id="old_Titre_De_Article" aria-describedby="helpId" placeholder="">
                                            </div>
                                            <div class="col-6    p-0 m-0">
                                                <input type="text" class="form-control rounded-end rounded-0  m-0 " name="Titre_De_Article" id="Titre_De_Article" aria-describedby="helpId" placeholder="">
                                            </div>
                                        </div>
                                        <label for="" class="form-label mt-3">Description de Article</label>
                                        <div class="row">
                                            <div class="col-6    p-0 m-0">
                                                <input type="text" class="form-control rounded-start rounded-0 m-0 " disabled name="old_Description_De_Article" id="old_Description_De_Article" aria-describedby="helpId" placeholder="">
                                            </div>
                                            <div class="col-6    p-0 m-0">
                                                <input type="text" class="form-control rounded-end rounded-0  m-0 " name="Description_De_Article" id="Description_De_Article" aria-describedby="helpId" placeholder="">
                                            </div>
                                        </div>
                                        <label for="" class="form-label mt-3">Nom de l'editeur</label>

                                        <div class="row">
                                            <select class="form-select form-select-lg" name="Membre_IdMembres" id="GroupsUser">
                                                <?php

                                                $stmt = executeRequete("SELECT * FROM membre;");
                                                $stmt->execute();
                                                $index = 0;

                                                foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
                                                    $index = $index + 1;
                                                ?>
                                                    <option value="<?php echo $row["IdMembres"]; ?>"><?php echo $row["nom_personnel"]; ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>

                                    </div>
                                </td>
                            </tr>

                            <tr>

                                <td colspan="3">
                                    <!-- <input type="text"
                                    class="form-control w-100" name="" id="" aria-describedby="helpId" placeholder=""> -->

                                    <div class="form-control" name="mytextarea2" id="mytextarea2" rows="3"></div>
                                    <!-- <div id="mytextarea"></div> -->
                                    <input type="text" name="content" id="htmlContent2" style="display:none;">
                                </td>
                            </tr>
                        </table>















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
        $(".PopupBackground").find("#r").on("click", () => {
            parseSelectionData();
        });
        $(".PopupBackground").find("#Enregistrer").on("click", () => {
            var htm = window.editor2.data.get();
                                console.log(htm);
                                $("#htmlContent2").val(htm);
                var inputsFilled = $(".PopupBackground").find("input,select").filter(function() {
                    console.log($(this));
                    var l = $.trim($(this).val());
                    if (!$(this).attr("name") || $(this).attr("name") == "imageUpload") {
                        console.log($(this).attr("name") + ":" + l + " IGNORE");
                        return false;
                    }
                    if ($(this).attr("name") == "content") {
                        console.log($(this).attr("name") + ":" + l + " IGNORE :: " + (l.length <= 50));
                        return l.length <= 50;
                    }
                    if(l.length == 0 && $(this).attr("name")=="date_de_publication"){
                        console.log($(this).attr("name")+":"+l +" IGNORE");
                        $(this).val($(".PopupBackground").find("#old_Date_de_publication").val());
                        
                    }else if( $(this).attr("name")=="old_Date_de_publication"){
                        return false;
                    }
                    if(l.length == 0 && $(this).attr("name")=="date_de_publication"){
                        console.log($(this).attr("name")+":"+l +" IGNORE");
                        $(this).val($(".PopupBackground").find("#old_Date_de_publication").val());
                        
                    }else if( $(this).attr("name")=="old_Date_de_publication"){
                        return false;
                    }
                    if(l.length == 0 && $(this).attr("name")=="Description_De_Article"){
                        console.log($(this).attr("name")+":"+l +" IGNORE");
                        $(this).val($(".PopupBackground").find("#old_Description_De_Article").val());
                        
                    }else if( $(this).attr("name")=="old_Description_De_Article"){
                        return false;
                    }
                    if(l.length == 0 && $(this).attr("name")=="Titre_De_Article"){
                        console.log($(this).attr("name")+":"+l +" IGNORE");
                        $(this).val($(".PopupBackground").find("#old_Titre_De_Article").val());
                        
                    }else if( $(this).attr("name")=="old_Titre_De_Article"){
                        return false;
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
            console.log(inputsFilled);

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
        $(".PopupBackground").find("#quit").on("click", function() {
            $(".PopupBackground").modal("hide");
        });

        function parseSelectionData() {
            $PopupBackground = $(".PopupBackground");
            console.log($PopupBackground.find("#form")[0]);
            $PopupBackground.find("#form")[0].reset();

            $PopupBackground.find("#idArticle").val(window.selected[0]['IdArticle']);
            console.log(window.selected[0]["IdPhoto"]);
            $.post("../inc/functions.inc.php", {
                function_name: "executeRequete",
                requet: "SELECT * from photo where IdPhoto=" + window.selected[0]["IdPhoto"] + ";"
            }, function(d) {
                // Handle the response here
                console.log(d);
                var data = JSON.parse(d);
                $PopupBackground.find("#upload_image_file2").val(data[0]['url']);
                $PopupBackground.find("#upload_dropZone2").first()[0].style.backgroundImage = 'url("/inc/' + decodeURIComponent(data[0]['url']) + '")';


            });
            $PopupBackground.find("#old_Titre_De_Article").val(window.selected[0]["titre_de_l'actualité"]);
            $PopupBackground.find("#old_Date_de_publication").val(window.selected[0]["date_de_publication"]);
            $PopupBackground.find("#old_Description_De_Article").val(window.selected[0]['Description']);
            $PopupBackground.find("#Membre_IdMembres").val(window.selected[0]["Membre_IdMembres"]);

            window.editor2.data.set(window.selected[0]["contenu"])
            // window.editor2.ui.view.editable.element.innerHTML = window.selected[0]["contenu"];


            // $PopupBackground.find("#GroundStagiaires").val(window.selected[0].nom_personnel);
            // $PopupBackground.find("#SecteurProfessionnel").val(window.selected[0].nom_personnel);

        }
    </script>
    <!-- <div style="display: none;" class="position-absolute  w-100 h-100 top-50 start-50 translate-middle p-0 m-0 PopupBackground" >
        <div class="container-lg  position-absolute shadow-1  top-50 start-50 translate-middle overflow-hidden bg-white rounded-4 p-0">
            <div class="d-flex flex-column justify-content-start p-0">
                <div class="col-2 w-100 ps-5 p-4 m-0 text-white bg-primary shadow-sm   ">
                    <h3> <b>Membre Edit</b></h3>
                </div>
                <div class="col-10 pt-5 ps-4 pe-4 pb-5 w-100">
                    
                    
                </div>
            </div>

        </div>
    </div> -->


    <script>
        // https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js
        // import SimpleUploadAdapter from 'https://cdn.ckeditor.com/ckeditor5-upload/src/adapters/simpleuploadadapter';

        const config = {
            // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
            plugins: [ SimpleUploadAdapter ],
            toolbar: {
                items: [
                    'heading', '|',
                    'fontfamily', 'fontsize', '|',
                    'alignment', '|',
                    'fontColor', 'fontBackgroundColor', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                    'link', '|',
                    'outdent', 'indent', '|',
                    'bulletedList', 'numberedList', 'todoList', '|',
                    'code', 'codeBlock', '|',
                    'insertTable', '|',
                    'uploadImage', 'blockQuote', '|',
                    'undo', 'redo'
                ],
                shouldNotGroupWhenFull: true
            },
            simpleUpload: {
                // The URL that the images are uploaded to.
                uploadUrl: '/inc/uploads',

                // Enable the XMLHttpRequest.withCredentials property.
                withCredentials: true,

                // Headers sent along with the XMLHttpRequest to the upload server.
                headers: {
                    'X-CSRF-TOKEN': 'CSRF-Token',
                    Authorization: 'Bearer <JSON Web Token>'
                },
                
            },
            // Changing the language of the interface requires loading the language file using the <script> tag.
            // language: 'es',
            list: {
                properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
            heading: {
                options: [{
                        model: 'paragraph',
                        title: 'Paragraph',
                        class: 'ck-heading_paragraph'
                    },
                    {
                        model: 'heading1',
                        view: 'h1',
                        title: 'Heading 1',
                        class: 'ck-heading_heading1'
                    },
                    {
                        model: 'heading2',
                        view: 'h2',
                        title: 'Heading 2',
                        class: 'ck-heading_heading2'
                    },
                    {
                        model: 'heading3',
                        view: 'h3',
                        title: 'Heading 3',
                        class: 'ck-heading_heading3'
                    },
                    {
                        model: 'heading4',
                        view: 'h4',
                        title: 'Heading 4',
                        class: 'ck-heading_heading4'
                    },
                    {
                        model: 'heading5',
                        view: 'h5',
                        title: 'Heading 5',
                        class: 'ck-heading_heading5'
                    },
                    {
                        model: 'heading6',
                        view: 'h6',
                        title: 'Heading 6',
                        class: 'ck-heading_heading6'
                    }
                ]
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
            placeholder: 'Welcome to CKEditor 5!',
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
            fontFamily: {
                options: [
                    'default',
                    'Arial, Helvetica, sans-serif',
                    'Courier New, Courier, monospace',
                    'Georgia, serif',
                    'Lucida Sans Unicode, Lucida Grande, sans-serif',
                    'Tahoma, Geneva, sans-serif',
                    'Times New Roman, Times, serif',
                    'Trebuchet MS, Helvetica, sans-serif',
                    'Verdana, Geneva, sans-serif'
                ],
                supportAllValues: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
            fontSize: {
                options: [10, 12, 14, 'default', 18, 20, 22],
                supportAllValues: true
            },
            // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
            // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
            htmlSupport: {
                allow: [{
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }]
            },
            // Be careful with enabling previews
            // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
            htmlEmbed: {
                showPreviews: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
            link: {
                decorators: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://',
                    toggleDownloadable: {
                        mode: 'manual',
                        label: 'Downloadable',
                        attributes: {
                            download: 'file'
                        }
                    }
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
            mention: {
                feeds: [{
                    marker: '@',
                    feed: [
                        '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                        '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                        '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                        '@sugar', '@sweet', '@topping', '@wafer'
                    ],
                    minimumCharacters: 1
                }]
            },
            // The "super-build" contains more premium features that require additional configuration, disable them below.
            // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
            removePlugins: [
                // These two are commercial, but you can try them out without registering to a trial.
                // 'ExportPdf',
                // 'ExportWord',
                'CKBox',
                'CKFinder',
                'EasyImage',
                // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                // Storing images as Base64 is usually a very bad idea.
                // Replace it on production website with other solutions:
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                'Base64UploadAdapter',
                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',
                // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                // from a local file system (file://) - load this site via HTTP server if you enable MathType
                'MathType'
            ]
        };

        ClassicEditor
            .create(document.querySelector('#mytextarea'), config)
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#mytextarea2'), config)
            .then(editor => {
                window.editor2 = editor;
            }).catch(error => {
                console.error(error);
            });
    </script>



    <!-- <script>
        // This sample still does not showcase all CKEditor 5 features (!)
        // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
        CKEDITOR.ClassicEditor.create(document.getElementById("mytextarea"), {
            // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
            toolbar: {
                items: [
                    
                    
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                    'bulletedList', 'numberedList', 'todoList', '|',
                    'outdent', 'indent', '|',
                    'undo', 'redo',
                    '-',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                    'alignment', '|',
                    'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                    'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                    'textPartLanguage', '|',
                    'sourceEditing'
                ],
                shouldNotGroupWhenFull: true
            },
            // Changing the language of the interface requires loading the language file using the <script> tag.
            // language: 'es',
            list: {
                properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                    { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                    { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                ]
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
            placeholder: 'ici!',
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
            fontFamily: {
                options: [
                    'default',
                    'Arial, Helvetica, sans-serif',
                    'Courier New, Courier, monospace',
                    'Georgia, serif',
                    'Lucida Sans Unicode, Lucida Grande, sans-serif',
                    'Tahoma, Geneva, sans-serif',
                    'Times New Roman, Times, serif',
                    'Trebuchet MS, Helvetica, sans-serif',
                    'Verdana, Geneva, sans-serif'
                ],
                supportAllValues: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
            fontSize: {
                options: [ 10, 12, 14, 'default', 18, 20, 22 ],
                supportAllValues: true
            },
            // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
            // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
            htmlSupport: {
                allow: [
                    {
                        name: /.*/,
                        attributes: true,
                        classes: true,
                        styles: true
                    }
                ]
            },
            // Be careful with enabling previews
            // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
            htmlEmbed: {
                showPreviews: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
            link: {
                decorators: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://',
                    toggleDownloadable: {
                        mode: 'manual',
                        label: 'Downloadable',
                        attributes: {
                            download: 'file'
                        }
                    }
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
            mention: {
                feeds: [
                    {
                        marker: '@',
                        feed: [
                            '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                            '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                            '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                            '@sugar', '@sweet', '@topping', '@wafer'
                        ],
                        minimumCharacters: 1
                    }
                ]
            },
            // The "super-build" contains more premium features that require additional configuration, disable them below.
            // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
            removePlugins: [
                // These two are commercial, but you can try them out without registering to a trial.
                // 'ExportPdf',
                // 'ExportWord',
                'CKBox',
                'CKFinder',
                'EasyImage',
                // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                // Storing images as Base64 is usually a very bad idea.
                // Replace it on production website with other solutions:
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                // 'Base64UploadAdapter',
                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',
                // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                // from a local file system (file://) - load this site via HTTP server if you enable MathType
                'MathType'
            ]
        });
    </script> -->
    <script src="../inc/js/fileUpload.js"></script>
    <script src="../inc/js/fileUpload2.js"></script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>