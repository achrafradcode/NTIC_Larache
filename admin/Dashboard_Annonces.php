<?php
    session_start();
    if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] == false){
        header("Location: ../admin/LogIn.php");
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
        <h5 class="modal-title" id="exampleModalLabel">Supprimer Annonce</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Voulez-vous vraiment supprimer cet Annonce ?<strong> [<span class="UserName"></span>]</strong>
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

    <div class="row m-0 h-100">
        
        <!--Side Menu-->
        <?php require_once("../admin/inc/sidemenu.inc.php")?>    
            
        <div class="col-10 ps-5 pt-2 pe-5">
            <!--HEADER-->
            <div class="Header  mt-2 ms-3 me-3">
                <div class="PageTitle float-start fw-bolder">
                    <h2><b>Ajouter des Annonces</b></h2>
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
                <!-- <div class="TapTitle  fw-bold text-black-50">
                    <h6>Add New Membre</h6>
                </div> -->
                <hr>
                <div class="TapContent m-3 ">
                    
                    <table class="w-100">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <!-- <tr>
                            <td class="w-25">
                                <label for="" class="form-label">Titre de annonce</label>
                            </td>
                            <td colspan="2">
                                <input type="text"
                                class="form-control w-100" name="" id="" aria-describedby="helpId" placeholder="">
                            </td>
                        </tr> -->
                        <tr>
                            <td>
                                <label for="" class="form-label">Nom de l'editeur</label>
                            </td>
                            <td colspan="2">
                                <input type="text"
                                class="form-control w-100" disbaled value="<?php echo $_SESSION["username"];?>" name="" id="" aria-describedby="helpId" placeholder="">
                            </td>
                        </tr>
                        <tr>
                            
                            <td colspan="3" >
                                <textarea type="text"
                                class="form-control w-100" name="" id="" aria-describedby="helpId" placeholder=""> </textarea>
                                
                                <!-- <div class="form-control" name="" id="mytextarea" rows="3"></div>  -->
                                <!-- <div id="mytextarea"></div> -->
                            </td>
                        </tr>
                    </table>
                            
                            
                            
                    
                        
                    
                    
                    <div class="w-100 mt-4 d-flex flex-row justify-content-end">
                        <div class="d-grid gap-2 pe-3">
                          <input type="reset" name="" id="" class="ps-4 pe-4 btn btn-primary" value="Reset"/>
                        </div>
                        <div class="d-grid gap-2 pe-3">
                            <input type="submit" name="" id="" class="ps-4 pe-4 btn btn-primary" value="Ajouter"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contentPage  mt-5 ms-3 me-3">
                <!--Logs-->
                <div class="TapPanel  ">
                    <div class="TapTitle float-start fw-bold text-black-50">
                      <h4>Annonces Et Articles</h4>
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
                                    <th>Titre de Annonce</th>
                                    <th>Date de publication</th>
                                    <th>Id de l'editeur</th>
                                    
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                    
                                    $stmt = executeRequete("SELECT * FROM annonces;");
                                    $stmt->execute();
                                    $index = 0;

                                    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row){
                                        $index = $index + 1;
                                ?>
                                <tr class="table-light">
                                    <td scope="row"><?php echo $index;?></td>
                                    <td><?php echo $row["titre_Annonces"];?></td>
                                    <td><?php echo $row['date_de_publication'];?></td>
                                    <td><?php echo $row["Membre_IdMembres"];?></td>
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
                                    
                                                
                                    // $(".TapPanel").find('button[id="Modifier"]').on("click",fetchUser);
                                    $(".TapPanel").find('button[id="Remove"]').on("click",deleteUser);
                                    // $(".TapPanel").find('button[id="SeePass"]').on("click",seePassUser);
                                    $(".DeleteConfirmation").find('button[id="DeleteConfirmationOk"]').on("click",confirmDelete);

                                    function deleteUser(){
                                        window.selected = {
                                            'index':$(this).parent().parent().parent().parent().find("td:nth-child(1)").text(),
                                            "titre_de_l'actualité":$(this).parent().parent().parent().parent().find("td:nth-child(2)").text(),
                                            'date_de_publication':$(this).parent().parent().parent().parent().find("td:nth-child(3)").text(),
                                            'Membre_IdMembres':$(this).parent().parent().parent().parent().find("td:nth-child(4)").text()
                                        };
                                        
                                        window.container = $(this).parent().parent().parent().parent()[0];
                                        $.post("../inc/functions.inc.php", { function_name: "executeRequete",requet:"SELECT * from annonces where titre_Annonces='"+window.selected["titre_de_l'actualité"]+"';" }, function(d) {
                                            // Handle the response here
                                            console.log(data);
                                            var data = JSON.parse(d);
                                            window.selected = data;
                                            console.log(window.selected);
                                            
                                            $(".DeleteConfirmation").modal('show');
                                            $(".DeleteConfirmation").find(".UserName").text(window.selected[0]["titre_de_l'actualité"]);
                                            
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
                                            
                                            // $(".yesOrNoConfirmation").modal('show');
                                            // $(".DeleteConfirmation").find(".UserName").text(window.selected[0].nom_personnel);
                                            confirmChanges(null,"Mot De Pass","Voila le Mot De Pass de Cette Compte est :<strong> ["+window.selected[0].password+"]</strong><br>Voulez-Vous l'envoyer dans un e-mail?",()=>{
                                                showToast({
                                                    type:"success",
                                                    autoDismiss: true,
                                                    message:"l'email envoyer avec succès !"
                                                });
                                            });
                                        });
                                    }
                                    function confirmDelete(){
                                        $.post("../inc/functions.inc.php", { function_name: "executeRequete",msgSuccess:"Annonce supprimé avec succès",msgFaild:"Une erreur s'est produite",requet:"DELETE from annonces where idAnnonces='"+window.selected[0].idAnnonces +"';" }, function(d) {
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
    <div style="display: none;" class="position-absolute  w-100 h-100 top-50 start-50 translate-middle p-0 m-0 PopupBackground" >
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
                                        <input type="text"
                                        class="form-control m-0 " disabled name="" id="" aria-describedby="helpId" placeholder="">
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
                                        <input type="text"
                                        class="form-control rounded-start rounded-0 m-0 " disabled name="" id="" aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="col-6    p-0 m-0">
                                        <input type="text"
                                        class="form-control rounded-end rounded-0  m-0 " name="" id="" aria-describedby="helpId" placeholder="">
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
                                        <input type="text"
                                        class="form-control rounded-start rounded-0 m-0 " disabled name="" id="" aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="col-6    p-0 m-0">
                                        <input type="text"
                                        class="form-control rounded-end rounded-0  m-0 " name="" id="" aria-describedby="helpId" placeholder="">
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
                                        <input type="date"
                                        class="form-control rounded-start rounded-0 m-0 " disabled name="" id="" aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="col-6    p-0 m-0">
                                        <input type="date"
                                        class="form-control rounded-end rounded-0  m-0 " name="" id="" aria-describedby="helpId" placeholder="">
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
                                    <textarea class="form-control" name="" id="mytextarea" rows="3"></textarea>
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

    
    <script>
        const config = {
           
            
                
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
        
        };
        
        InlineEditor
            .create( document.querySelector( '#mytextarea' ) ,config)
            .then( editor => {
                window.editor = editor;
            } )
            .catch( error => {
                console.error( error );
            } );
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

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
</body>

</html>