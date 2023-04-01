<?php
    require_once("../inc/functions.inc.php");
    session_start();
    if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] == false){
        header("Location: ../admin/LogIn.php");
    }
?>
<!doctype html>
<html lang="en">

<head>
    <title>ISTA Larache - Tableau de bord</title>
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
    </style>
</head>

<body>


    <div class="row m-0 h-100">
        <!--Side Menu-->
        
        <?php require_once("../admin/inc/sidemenu.inc.php")?>
        

        <div class="col-10 ps-5 pt-2 pe-5">
            <!--HEADER-->
            <div class="Header  mt-2 ms-3 me-3">
                <div class="PageTitle float-start fw-bolder">
                    <h2><b>Page Selection</b></h2>
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
                <div class="TapTitle float-start fw-bold text-black-50">
                    <h6>Quick Tabs</h6>
                </div>
                <hr>
                <div class="TapContent m-3 d-flex flex-row justify-content-around align-items-stretch float-end">
                    
                <?php if(json_decode($_SESSION["userinfo"],true)[0]["type_d'adhésion"] == '-1' ||json_decode($_SESSION["userinfo"],true)[0]["SecteurProfessionnel"] == '1'){?>
                    <button Category="Membres" name="" id="" class="QuickTapButton p-3 btn btn-primary" href="#" role="button">
                        <div class="d-flex h-100 flex-column align-content-between justify-content-around text-center">
                            <div>
                                <img src="/imgs/Dashboard_Membres.png" class="col-6 img-fluid w-50 " alt="">
                            </div>
                            <div class="col-6 w-100">
                                <b>Membres</b>
                            </div>
                        </div>
                    </button>
                    <?php }?>
                    <?php if(json_decode($_SESSION["userinfo"],true)[0]["type_d'adhésion"] == '-1' ||json_decode($_SESSION["userinfo"],true)[0]["SecteurProfessionnel"] == '1'){?>
                    <button Category="Emploi du temp" name="" id="active" class="QuickTapButton p-3 btn btn-primary" href="#" role="button">
                        <div class="d-flex h-100 flex-column align-content-between justify-content-around text-center">
                            <div>
                                <img src="/imgs/Dashboard_EmploiDuTemp_Active.png" class="col-6 img-fluid w-50 " alt="">
                            </div>
                            <div class="col-6 w-100">
                                <b>Emploi du temp</b>
                            </div>
                        </div>
                    </button>
                    <?php }?>
                    <?php if(json_decode($_SESSION["userinfo"],true)[0]["type_d'adhésion"] == '-1' ||json_decode($_SESSION["userinfo"],true)[0]["SecteurProfessionnel"] == '1'){?>
                    <button Category="Tablau des Notes" name="" id="" class="QuickTapButton p-3 btn btn-primary" href="#" role="button">
                        <div class="d-flex h-100 flex-column align-content-between justify-content-around text-center">
                            <div>
                                <img src="/imgs/Dashboard_TablauDesNotes.png" class="col-6 img-fluid w-50 " alt="">
                            </div>
                            <div class="col-6 w-100">
                                <b>Tablau des Notes</b>
                            </div>
                        </div>
                    </button>
                    <?php }?>
                    <?php if(json_decode($_SESSION["userinfo"],true)[0]["type_d'adhésion"] == '-1' ||json_decode($_SESSION["userinfo"],true)[0]["SecteurProfessionnel"] == '2'){?>
                    <button Category="Articles" name="" id="" class="QuickTapButton p-3 btn btn-primary" href="#" role="button">
                        <div class="d-flex h-100 flex-column align-content-between justify-content-around text-center">
                            <div>
                                <img src="/imgs/Dashboard_AnnoncesEtArticles.png" class="col-6 img-fluid w-50 " alt="">
                            </div>
                            <div class="col-6 w-100">
                                <b>Articles</b>
                            </div>
                        </div>
                    </button>
                    <?php }?>
                    <?php if(json_decode($_SESSION["userinfo"],true)[0]["type_d'adhésion"] == '-1' ||json_decode($_SESSION["userinfo"],true)[0]["SecteurProfessionnel"] == '2'){?>
                    <button Category="Annonces" name="" id="" class="QuickTapButton p-3 btn btn-primary" href="#" role="button">
                        <div class="d-flex h-100 flex-column align-content-between justify-content-around text-center">
                            <div>
                                <img src="/imgs/Dashboard_AnnoncesEtArticles.png" class="col-6 img-fluid w-50 " alt="">
                            </div>
                            <div class="col-6 w-100">
                                <b>Annonces</b>
                            </div>
                        </div>
                    </button>
                    <?php }?>
                    <?php if(json_decode($_SESSION["userinfo"],true)[0]["type_d'adhésion"] == '-1' ||json_decode($_SESSION["userinfo"],true)[0]["SecteurProfessionnel"] == '2'){?>
                    <button Category="Contacts" name="" id="" class="QuickTapButton p-3 btn btn-primary" href="#" role="button">
                        <div class="d-flex h-100 flex-column align-content-between justify-content-around text-center">
                            <div>
                                <img src="/imgs/boit_email.png" class="col-6 img-fluid w-50 " alt="">
                            </div>
                            <div class="col-6 w-100">
                                <b>Contacts</b>
                            </div>
                        </div>
                    </button>
                    <?php }?>
                    
                    <script type="text/javascript">
                                        
                        $(".TapContent").find("button").on("click",function(){
                            $(".TapContent").find("button").attr("id","");
                            $(".TapContent").find("button").find("img").each(function(i,e){
                                var src = e.getAttribute("src");
                                if(src.includes("_Active.")){
                                    src = src.split("_Active").join("");
                                    console.log(e);
                                    console.log(src);
                                }
                                e.setAttribute("src",src);
                            });
                            $(this).attr("id","active");
                            var attr = $(this).find("img").first().attr("src");
                            attr = attr.split(".").join("_Active.");
                            $(this).find("img").first().attr("src",attr);
                            updateList($(this).attr("Category"));
                        });
                        $(window).on('load',()=>{
                            updateList("emploi");
                        });

                        function updateList(Category){
                            $.post("../inc/functions.inc.php", { function_name: "executeRequete",requet:"SELECT * FROM `logs` WHERE `Category`='"+Category+"'" }, function(d) {
                                // Handle the response here
                                console.log(d);
                                var data = JSON.parse(d);
                                console.log(data);
                                window.logs = data;
                                //    $("EventsContainer").children().length
                                $.post("../inc/functions.inc.php", { function_name: "executeRequete",requet:"SELECT * FROM `membre`" }, function(d) {
                                   $("#EventsContainer").empty();
                                   // Handle the response here
                                   var data2 = JSON.parse(d);
                                   console.log(data2);
                                   window.membres = data2;
                                   for(var i = 0 ; i < window.logs.length ; i++){
                                    var tr = $('<tr>');
                                    var td1 = $('<td>');
                                    td1.text(window.logs[i].Time);
                                    td1.attr("scope","row");
                                    var td2 = $('<td>');
                                    td2.text(window.logs[i].Category);
                                    var td3 = $('<td>');
                                    td3.text(window.membres.find(item=>item.IdMembres==window.logs[i].MembreId).nom_personnel);
                                    var td4 = $('<td>');
                                    td4.html(window.logs[i].Event);
    
                                    tr.append(td1);
                                    tr.append(td2);
                                    tr.append(td3);
                                    tr.append(td4);
                                    $("#EventsContainer").append(tr);
                                   }
                               });



                            });
                        }
                    </script>

                </div>
            </div>
            <div class="contentPage  mt-2 ms-3 me-3">
                <!--Logs-->
                <div class="TapPanel  ">
                    <!-- <div class="TapTitle float-start fw-bold text-black-50">
                      <h4>Quick Tabs</h4>
                    </div>
                    <hr> -->
                    <div class="table-responsive-md">
                        <table class="table table-striped
                      table-hover	
                      table-borderless
                      table-light
                      align-middle">
                            <thead class="table-light">
                                <!-- <caption>Table Name</caption> -->
                                <tr>
                                    <th>Time</th>
                                    <th>Category</th>
                                    <th>User</th>
                                    <th>Event</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider" id="EventsContainer">
                                <!-- <tr class="table-light">
                                    <td scope="row">2023/4/1</td>
                                    <td>Emploi du temp</td>
                                    <td>Benkasem</td>
                                    <td>Event</td>
                                </tr>
                                <tr class="table-light">
                                    <td scope="row">2023/4/1</td>
                                    <td>Emploi du temp</td>
                                    <td>Benkasem</td>
                                    <td>Event</td>
                                </tr>
                                <tr class="table-light">
                                    <td scope="row">2023/4/1</td>
                                    <td>Emploi du temp</td>
                                    <td>Benkasem</td>
                                    <td>Event</td>
                                </tr>
                                <tr class="table-light">
                                    <td scope="row">2023/4/1</td>
                                    <td>Emploi du temp</td>
                                    <td>Benkasem</td>
                                    <td>Event</td>
                                </tr> -->

                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
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