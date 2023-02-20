<?php
    session_start();
    if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] == false){
        header("Location: ../admin/LogIn.php");
    }
?>
<!doctype html>
<html lang="en">

<head>
    <title>ISTA Larache - Tablau Des Notes</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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
            background-color : #2b7d2e1e;
        }
        .table tr td[id="active"] {
            background-color: #0d5f1125 !important;
            box-shadow: inset 0px 0px 0px 2px #2b7d2e7e;
        }
        .table tr td[id="active"]:hover {
            background-color: #2b7d2e1e !important;
            box-shadow: inset 0px 0px 0px 3px #2b7d2e7e;
        }
        
        
        .Selecting{
            transition-duration: all 0.1s;
            transition-duration: 0.2s;
            position: absolute;
            top: 100%;
            left: 0%;
            
        }
        #t:checked ~ .contentPage .Selecting{
            position: absolute;
            top: 100%;
            left: -120%;
            
        }
        .NoteTable{
            transition-duration: all 0.1s;
            transition-duration: 0.2s;
            position: absolute;    
            top: 100%;
            left: 120%;
        }
        #t:checked ~ .contentPage .NoteTable{
            position: absolute;    
            top: 100%;
            left: 0%;
        }
    </style>
</head>

<body>


    <div class="row m-0 h-100">
        
        <!--Side Menu-->
        <?php require_once("../admin/inc/sidemenu.inc.php")?>

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
            <input name="" id="t" class="btn btn-primary" type="checkbox" value="TestTransition">
            <!--QUICK TAPS-->
            <div class="contentPage   position-relative d-flex flex-column mt-2 ms-1 me-2">
                <!-- <div class="TapTitle  fw-bold text-black-50">
                    <h6>Add New Membre</h6>
                </div> -->
                <hr>
                <div id="active" class=" Selecting" >

                    <div class="d-flex flex-row flex-wrap justify-content-start">

                        <div class="m-2 ScrollTable Tab1 ScrollTable-FixWidth position-relative rounded-4 overflow-hidden ">
                            <div
                                class="Title text-center w-100 bg-primary text-white p-2 rounded-pill shadow position-absolute  ">
                                <b>Group Stagiaires</b>
                            </div>
                            <div class="Content d-flex bg-black  bg-opacity-25 flex-column justify-content-start">
                                <div class="item-centent text-center  p-3 bg-black bg-opacity-25">
                                    .....
                                </div>
                                <input class="item-centent rounded-0 btn bg-black text-center mt-1 p-2 bg-opacity-25"
                                    type="button" value="DWS101">
                                <input id="active"
                                    class="item-centent rounded-0 btn bg-black text-center mt-1 p-2 bg-opacity-25"
                                    type="button" value="DWS101">
                                <input class="item-centent rounded-0 btn bg-black text-center mt-1 p-2 bg-opacity-25"
                                    type="button" value="DWS101">
                                <input class="item-centent rounded-0 btn bg-black text-center mt-1 p-2 bg-opacity-25"
                                    type="button" value="DWS101">
                                <input class="item-centent rounded-0 btn bg-black text-center mt-1 p-2 bg-opacity-25"
                                    type="button" value="DWS101">
                                <input class="item-centent rounded-0 btn bg-black text-center mt-1 p-2 bg-opacity-25"
                                    type="button" value="DWS101">





                            </div>
                        </div>


                        <div class="m-2 ScrollTable Tab2 ScrollTable-FixWidth position-relative rounded-4 overflow-hidden ">
                            <div
                                class="Title text-center w-100 bg-primary text-white p-2 rounded-pill shadow position-absolute  ">
                                <b>Stagiaire</b>
                            </div>
                            <div class="Content d-flex bg-black  bg-opacity-25 flex-column justify-content-start">
                                <div class="item-centent text-center  p-3 bg-black bg-opacity-25">
                                    .....
                                </div>
                                <input class="item-centent rounded-0 btn bg-black text-center mt-1 p-2 bg-opacity-25"
                                    type="button" value="DWS101">
                                <input class="item-centent rounded-0 btn bg-black text-center mt-1 p-2 bg-opacity-25"
                                    type="button" value="DWS101">
                                <input class="item-centent rounded-0 btn bg-black text-center mt-1 p-2 bg-opacity-25"
                                    type="button" value="DWS101">
                                <input class="item-centent rounded-0 btn bg-black text-center mt-1 p-2 bg-opacity-25"
                                    type="button" value="DWS101">
                                <input id="active"
                                    class="item-centent rounded-0 btn bg-black text-center mt-1 p-2 bg-opacity-25"
                                    type="button" value="DWS101">
                                <input class="item-centent rounded-0 btn bg-black text-center mt-1 p-2 bg-opacity-25"
                                    type="button" value="DWS101">





                            </div>
                        </div>



                        <div class="m-2 ScrollTable Tab2 ScrollTable-2 position-relative rounded-4 overflow-hidden ">
                            <div
                                class="Title text-center w-100 bg-primary text-white p-2 rounded-pill shadow position-absolute  ">
                                <b>Liste des information</b>
                            </div>
                            <div class="Content p-4 d-flex bg-black  bg-opacity-25 flex-column justify-content-start">

                                <table class="w-100 mt-5">
                                    <tr>
                                        <td>
                                            <div class="form-label">Nom :</div>
                                        </td>
                                        <td>
                                            <div class="form-label">Raddah </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-label">Prenom :</div>
                                        </td>
                                        <td>
                                            <div class="form-label">Acharf </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-label">Group :</div>
                                        </td>
                                        <td>
                                            <div class="form-label">DWFS202 </div>
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
                                    
                            $(".ScrollTable.Tab1").find("input").on("click",function(){
                                $(".ScrollTable.Tab1").find("input").attr("id","");
                                $(this).attr("id","active");
                            });
                            $(".ScrollTable.Tab2").find("input").on("click",function(){
                                $(".ScrollTable.Tab2").find("input").attr("id","");
                                $(this).attr("id","active");
                            });
                        </script>


                    </div>


                </div>
                <div id="" class="  NoteTable" >
                    
                    
                        <table class="table
                        
                        table-bordered 
                        table-primary
                        align-middle">
                            <thead>
                                <tr class="bg-primary">
                                    <th scope="col" class="bg-primary text-white">La matiere</th>
                                    <th scope="col" class="bg-primary text-white">Control 1</th>
                                    <th scope="col" class="bg-primary text-white">Control 2</th>
                                    <th scope="col" class="bg-primary text-white">Control 3</th>
                                    <th scope="col" class="bg-primary text-white">Control 4</th>
                                    <th scope="col" class="bg-primary text-white">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td scope="row" class="bg-primary text-white">Module 1</td>
                                    <td></td>
                                    <td id="active"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="">
                                    <td scope="row" class="bg-primary text-white">Module 2</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="">
                                    <td scope="row" class="bg-primary text-white">Module 3</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="">
                                    <td scope="row" class="bg-primary text-white">Module 4</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="">
                                    <td scope="row" class="bg-primary text-white">Module 5</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="">
                                    <td scope="row" class="bg-primary text-white">Module 6</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="">
                                    <td scope="row" class="bg-primary text-white">Module 7</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="">
                                    <td scope="row" class="bg-primary text-white">Module 8</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="">
                                    <td scope="row" class="bg-primary text-white">Module 9</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="">
                                    <td scope="row" class="bg-primary text-white">Module 10</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table w-50
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
                                    <td scope="row" class="bg-primary text-white">Module 1</td>
                                    <td id="active"></td>
                                    
                                </tr>
                                <tr class="">
                                    <td scope="row" class="bg-primary text-white">Module 2</td>
                                    <td></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    
                    

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

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
</body>

</html>