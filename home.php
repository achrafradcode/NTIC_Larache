<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ISTA Larache</title>
   <link rel="icon" href="pictuer/l.png" />
   
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
  integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
      .dropdown {
         margin-right: 2rem;
         font-size: 2rem;
         text-transform: capitalize;
         color: #444;
      }
      .dropdown button:hover{
         
         background-color: #3182d3 !important;
         border-color: #11508f !important;
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
           font-size: 15px;
           
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

        .offcanvas .annonce-item:hover{
         background-color: #7441ff08 !important;
         box-shadow: 0px 0px 0px 4px #8a2be23b;
        }
        #NewsContent #date{
         font-size: 12px;
        }
        .offcanvas .annonce-item #date{
         font-weight: bold;
        }
        .offcanvas .annonce-item{
         white-space: nowrap;
         overflow: hidden;
         display: block;
         text-overflow: ellipsis;
        }
        
   </style>

</head>

<body>

   <!-- header section starts  -->
   <!-- Modal -->
   <div class="modal fade" id="emploiDeTemp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
         <div class="modal-header">
         <h1 class="modal-title " id="ModalLabel">Emploi Du Temp</h1> <span class="badge text-bg-primary" style="font-size: 15px;margin-left: 10px;">[<span id="GroupId">DD</span>]</span>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body" id="ModalBody">
         
                <div class="Emploi ">

                    
                        

                        
                            <table class="table 
                            container position-relative top-50 left-50 middle-translate
                        table-bordered 
                        table-primary
                        align-middle">
                                <thead>
                                    <tr class="bg-primary">
                                        <th scope="col" class="bg-primary text-white text-center"></th>
                                        <th scope="col" class="bg-primary text-white text-center">8:30-11:00</th>
                                        <th scope="col" class="bg-primary text-white text-center">11:00-13:30</th>
                                        <th scope="col" class="bg-primary text-white text-center">13:30-16:00</th>
                                        <th scope="col" class="bg-primary text-white text-center">16:00-18:30</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="">
                                        <td scope="row" class="bg-primary text-white text-center">Lundi</td>
                                        <td>
                                            <div class="  cell ">
                                                
                                                <div
                                                    class="  w-100 h-100   p-2 bg-white border border-primary rounded-2 text-center">
                                                    <div class="SpecLible"><b> Specialite</b></div>
                                                    <div class="CenterLible">(BENKASEM) Salle:TDI</div>
                                                    <div class="TimeLible small text-black-50">De 8h30 a 11h00</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="  cell ">
                                                
                                                <div
                                                    class="  w-100 h-100   p-2 bg-white border border-primary rounded-2 text-center">
                                                    <div class="SpecLible"><b> Specialite</b></div>
                                                    <div class="CenterLible">(BENKASEM) Salle:TDI</div>
                                                    <div class="TimeLible small text-black-50">De 8h30 a 11h00</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="cell"></div>
                                        </td>
                                        <td>
                                            <div class="cell"></div>
                                        </td>

                                    </tr>
                                    <tr class="">
                                        <td scope="row" class="bg-primary text-white text-center">Mardi</td>
                                        <td>
                                            <div class="cell"></div>
                                        </td>
                                        <td >
                                            
                                            <div class="cell">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="cell"></div>
                                        </td>
                                        <td >
                                            
                                            <div class="  cell ">
                                                
                                                <div
                                                    class="  w-100 h-100   p-2 bg-white border border-primary rounded-2 text-center">
                                                    <div class="SpecLible"><b> Specialite</b></div>
                                                    <div class="CenterLible">(BENKASEM) Salle:TDI</div>
                                                    <div class="TimeLible small text-black-50">De 8h30 a 11h00</div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr class="">
                                        <td scope="row" class="bg-primary text-white text-center">Mercredi</td>
                                        <td>
                                            
                                            <div class="cell"></div>
                                        </td>
                                        <td>
                                            <div class="cell"></div>
                                        </td>
                                        <td>
                                            <div class="cell"></div>
                                        </td>
                                        <td>
                                            <div class="cell"></div>
                                        </td>

                                    </tr>
                                    <tr class="">
                                        <td scope="row" class="bg-primary text-white text-center">Jeudi</td>
                                        <td>
                                            <div class="cell"></div>
                                        </td>
                                        <td>
                                            <div class="cell"></div>
                                        </td>
                                        <td>
                                            <div class="cell"></div>
                                        </td>
                                        <td>
                                            <div class="cell"></div>
                                        </td>

                                    </tr>
                                    <tr class="">
                                        <td scope="row" class="bg-primary text-white text-center">Vendredi</td>
                                        <td>
                                            <div class="cell"></div>
                                        </td>
                                        <td>
                                            <div class="cell"></div>
                                        </td>
                                        <td>
                                            <div class="  cell ">
                                                
                                                <div
                                                    class="  w-100 h-100   p-2 bg-white border border-primary rounded-2 text-center">
                                                    <div class="SpecLible"><b> Specialite</b></div>
                                                    <div class="CenterLible">(BENKASEM) Salle:TDI</div>
                                                    <div class="TimeLible small text-black-50">De 8h30 a 11h00</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="  cell ">
                                                
                                                <div
                                                    class="  w-100 h-100   p-2 bg-white border border-primary rounded-2 text-center">
                                                    <div class="SpecLible"><b> Specialite</b></div>
                                                    <div class="CenterLible">(BENKASEM) Salle:TDI</div>
                                                    <div class="TimeLible small text-black-50">De 8h30 a 11h00</div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr class="">
                                        <td scope="row" class="bg-primary text-white text-center">Samedi</td>
                                        <td>
                                            <div class="cell"></div>
                                        </td>
                                        <td>
                                            <div class="cell"></div>
                                        </td>
                                        <td>
                                            <div class="cell"></div>
                                        </td>
                                        <td>
                                            <div class="cell"></div>
                                        </td>

                                    </tr>

                                </tbody>
                            </table>
                            

                    


                </div>
            
         </div>
         <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         
         </div>
      </div>
   </div>
   </div>
   <!-- Modal News -->
   <div class="modal fade" id="NewsContent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
         <div class="modal-header">
         <h2 class="modal-title " id="staticBackdropLabel">Annonce : <span id="date">[]</span></h2>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body fs-3" id="staticBackdropBody">
         ...
         </div>
         <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         
         </div>
      </div>
   </div>
   </div>


   <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRightNews" aria-labelledby="offcanvasRightLabel">
      <div class="offcanvas-header">
         <h2 class="offcanvas-title" id="offcanvasRightLabel">Annonces</h2>
         <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
         <div class=" pt-2 ps-0 pe-0">
            <button class="btn btn-info annonce-item border p-3 w-100 mb-3">
               <span id="date">[2023-2-13]</span>
               <span id="content">
               Le tronc commun Gestion des Entreprises
               donne au stagiaire toutes les informations
               et compétences nécessaires pour découvrir
               le monde des metiers</span>
            </button>
            <?php
                     require("./inc/functions.inc.php"); 
                  $stmt = executeRequete("SELECT * FROM annonces;");
                   $stmt->execute();
                   $index = 0;

                   foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row){
                       $index = $index + 1;
               ?>
               <button class="btn btn-info annonce-item border p-3 w-100 mb-3">
                  <span id="date"><?php echo $row['date_de_publication'];?></span>
                  <span id="content"><?php echo $row['titre_Annonces'];?></span>
               </button>
               

               <?php }?>
         </div>
      </div>
   </div>


   <header class="header">

      <a href="#" class="logo"> <img src="pictuer/l.png" alt="ss"> </a>

      <nav class="navbar">
         <div id="close-navbar" class="fas fa-times"></div>
         <a href="home.php" class="text-decoration-none text-black-50">Accueil</a>
         <a href="about.php" class="text-decoration-none">Propos </a>
         <a href="articles.php" class="text-decoration-none">Articles </a>
         <a href="courses.php" class="text-decoration-none">Filières</a>
         <a href="contact.php" class="text-decoration-none">contact</a>
         <div class="dropdown">
            <button style="margin: 0px;padding: 5px 10px;" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
             Emploi de temps
            </button>
            <ul class="dropdown-menu" id="emploiDuTempDropdown" aria-labelledby="dropdownMenuButton1">
             <!-- <li><a class="dropdown-item" href="#">DWFS101</a></li>
             <li><a class="dropdown-item" href="#">DWFS102</a></li>
             <li><a class="dropdown-item" href="#">DWFS201</a></li>
             <li><a class="dropdown-item" href="#">DWFS202</a></li>
             <li><a class="dropdown-item" href="#">GSE101</a></li>
             <li><a class="dropdown-item" href="#">GSE102</a></li>
             <li><a class="dropdown-item" href="#">GSE103</a></li>
             <li><a class="dropdown-item" href="#">GSE201</a></li>
             <li><a class="dropdown-item" href="#">GSE202</a></li> -->
             <?php
                        
                  $stmt = executeRequete("SELECT * FROM groupe_stagiaires;");
                   $stmt->execute();
                   $index = 0;

                   foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row){
                       $index = $index + 1;
               ?>
               <li><a href="#" class="dropdown-item" value="<?php echo $row['code_groupe_Groupe']?>"><?php echo $row['code_groupe_Groupe']?></a></li>

               <?php }?>
            </ul>
         </div>
         <script>
            $("#emploiDuTempDropdown").find("a").on("click",(e)=>{
               // $("#emploiDeTemp").unbind();
               console.log(e);
               $("#emploiDeTemp").modal("show");
               $("#emploiDeTemp").find("#GroupId").text($(e.target).text());

            });
         </script>
      </nav>
      <div>
         <div class="icons">
      <?php
                 
         if($_SESSION["logged_in"] == false){
            
            ?>
               <a href="/admin/LogIn.php" id="account-btn" class="fas fa-user" style="font-size: 25px; padding: 20px;"></a>
               <div id="menu-btn" class="fas fa-bars"></div>
               <?php
         }else{

            $array = json_decode($_SESSION["userinfo"]);
            $id = "type_d'adhésion";
            
            if($array[0]->$id == "-1"){
               echo '<a class="fas fa-user" href="/admin/LogIn.php" style="font-size:18px;color:green;"> Admin</a>';
               
            }else if($array[0]->$id == "1"){
               echo '<a class="fas fa-user" href="/admin/LogIn.php" style="font-size:18px;color:green;"> Stagiaire</a>';
               
            }else if($array[0]->$id == "2"){
               echo '<a class="fas fa-user" href="/admin/LogIn.php" style="font-size:18px;color:blue;"> Formateur</a>';

            }else if($array[0]->$id == "3"){
               echo '<a class="fas fa-user" href="/admin/LogIn.php" style="font-size:18px;color:grey;"> Rédacteur</a>';
               
            }else{if($array[0]->$id == "-1")
               echo '<a class="fas fa-user" href="/admin/LogIn.php" style="font-size:18px;color:red;"> unidentifent</a>';

            }
         }
         ?>
         </div>
      </div>
      

      <section class="news">
         <div class="container">
            <div class="news-item">
               Le tronc commun Gestion des Entreprises
               donne au stagiaire toutes les informations
               et compétences nécessaires pour découvrir
               le monde des metiers
               <div id="show"><img src="pictuer/right-arrow.png" width="40" height="40"></div>
            </div>
            <div class="news-item">
               Test Test
               <div id="show"><img src="pictuer/right-arrow.png" width="40" height="40"></div>
            </div>
            <?php
                     
                  $stmt = executeRequete("SELECT * FROM annonces;");
                   $stmt->execute();
                   $index = 0;

                   foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row){
                       $index = $index + 1;
               ?>
               <div class="news-item">
               <?php echo $row['titre_Annonces']?>
                  <div id="show"><img src="pictuer/right-arrow.png" width="40" height="40"></div>
               </div>

               <?php }?>

            
         </div>
         <div class="news-item-icon">
            <img src="pictuer/l.png" alt="ss">

         </div>
      </section>
      <script type="module">
         var myOffcanvas = document.getElementById('offcanvasRightNews');
         var bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas);
         $(".news").on("click",()=>{
            bsOffcanvas.show();
         });
         $(window).on("load",()=>{

            $("#offcanvasRightNews").find(".annonce-item").on("click",(e)=>{
               $("#NewsContent").modal("show");
               console.log($(e.currentTarget));
               $("#NewsContent").find("#staticBackdropLabel").find("#date").text($(e.currentTarget).find("#date").text());
               $("#NewsContent").find("#staticBackdropBody").text($(e.currentTarget).find("#content").text());
            });
         });


         $(".news").find(".news-item").hide();
         var itemsNews = $(".news").find(".news-item").toArray();
         console.log(itemsNews);
         var index = 0;
         function repeart() {
            var i = index % itemsNews.length;
            $(".news-item-icon").animate({
               left: ["50%", "linear"]
            }, 1000, function () {
               $(".news-item-icon").animate({ transform: 1 },
                  {
                     duration: 500, easing: 'linear',
                     step: function (now, fx) {
                        $(this).css('transform', 'translate(-50%,-50%) scale(' + (1+now) + ')')
                     }
                     , complete: function () {
                        $(".news-item-icon").animate({ transform: 0 },
                           {
                              duration: 500, easing: 'linear',
                              step: function (now, fx) {
                                 $(this).css('transform', 'translate(-50%,-50%) scale(' + (1+now) + ')')
                              }
                              , complete: function () {

                                 $(".news-item-icon").animate({
                                    left: ["120%", "linear"]
                                 }, 1000, function () {

                                    $(itemsNews[i]).fadeIn(1000, function () {
                                       $(itemsNews[i]).delay(10000).fadeOut(1000, function () {
                                          index++;
                                          repeart();
                                       });
                                    });
                                 });

                              }
                           })
                     }
                  })


            });
         }

         repeart();

      </script>
   </header>

   <!-- account form section starts  -->

   <div class="account-form">

      <div id="close-form" class="fas fa-times"></div>

      <div class="buttons">
         <span class="btn active login-btn">connexion</span>
         <span class="btn register-btn">enregistrer</span>
      </div>

      <form class="login-form active" action="">
         <h3>Connecte-toi maintenant</h3>
         <input type="email" placeholder="enter your email" class="box">
         <input type="password" placeholder="enter your password" class="box">
         <div class="flex">
            <input type="checkbox" name="" id="remember-me">
            <label for="remember-me">souviens-toi de moi</label>
            <a href="#">Mot de passe oublié?</a>
         </div>
         <input type="submit" value="login now" class="btn">
      </form>

      <form class="register-form" action="">
         <h3>S'inscrire maintenant</h3>
         <input type="email" placeholder="enter your email" class="box">
         <input type="password" placeholder="enter your password" class="box">
         <input type="password" placeholder="confirm your password" class="box">
         <input type="submit" value="register now" class="btn">
      </form>

   </div>

   <!-- account form section ends -->

   <!-- header section ends -->

   <!-- home section starts  -->

   <section class="home">

      <div class="swiper home-slider">

         <div class="swiper-wrapper">

            <section class="swiper-slide slide"
               style="background: url(pictuer/bg1.JPG) no-repeat,linear-gradient(90deg, rgb(2 0 36 / 45%) 0%, rgb(0 212 255 / 0%) 100%);background-blend-mode: multiply;">
               <div class="content">
                  <h3>Ista Larache</h3>
                  
                  <a href="#subjectsSection" class="btn">Commencer</a>
               </div>
              
            </section>

            <section class="swiper-slide slide"
               style="background: url(pictuer/bg2.JPG) no-repeat,linear-gradient(90deg, rgb(2 0 36 / 45%) 0%, rgb(0 212 255 / 0%) 100%);background-blend-mode: multiply;">
               <div class="content">
                  <h3>Ista Larache</h3>
                 
                  <a href="#subjectsSection" class="btn">Commencer</a>
               </div>
            </section>

            <section class="swiper-slide slide"
               style="background: url(pictuer/bg.jpeg) no-repeat,linear-gradient(90deg, rgb(2 0 36 / 45%) 0%, rgb(0 212 255 / 0%) 100%);background-blend-mode: multiply;">
               <div class="content">
                  <h3>Ista Larache</h3>
                
                  <a href="#subjectsSection" class="btn">Commencer</a>
               </div>
            </section>

         </div>

         <div class="swiper-pagination"></div>

      </div>

   </section>

   <!-- home section ends -->

   <!-- subjects section starts  -->

   <section class="subjects" id="subjectsSection">

      <h1 class="heading">Filières techniques</h1>

      <div class="box-container">

         <div class="box">
            <img src="pictuer/EL.png" alt="">
            <h3>électromécanicien</h3>
            <p>12 modules</p>
         </div>

         <div class="box">
            <img src="pictuer/AL.png" alt="">
            <h3>aluminium</h3>
            <p>12 modules</p>
         </div>

         <div class="box">
            <img src="pictuer/KH.png" alt="">
            <h3>Couture et broderie</h3>
            <p>12 modules</p>
         </div>

         <div class="box">
            <img class="hoverC inv" src="pictuer/MK.png" alt="">
            <h3>mecanique</h3>
            <p>12 modules</p>
         </div>

         <div class="box">
            <img src="pictuer/M1.png" alt="" style="
         background-color: white;
         border: solid 1px #0066cc;
     ">
            <h3>comptabilite</h3>
            <p>12 modules</p>
         </div>



      </div>

   </section>

   <!-- subjects section ends -->

   <!-- home courses slider section starts  -->

   <section class="home-courses">

      <h1 class="heading"> Liste des Formations professionnelles </h1>

      <div class="swiper home-courses-slider">

         <div class="swiper-wrapper">

            <div class="swiper-slide slide">
               <div class="image">
                  <img src="pictuer/commerc.png" alt="">
                  <h3>E- commerce</h3>
               </div>
               <div class="content">
                  <h3>E- commerce</h3>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, ratione?</p>
                  <a href="#" class="btn">read more</a>
               </div>
            </div>

            <div class="swiper-slide slide">
               <div class="image">
                  <img src="pictuer/Static assets-amico.png" alt="">
                  <h3>development digital</h3>
               </div>
               <div class="content">
                  <h3>development digital</h3>
                  <p>Le tronc commun en Développement Digital est une étape
                     importante pour acquérir les bases necessaires
                     de l'étude, la conception, la constructio...</p>
                  <a href="#" class="btn">read more</a>
               </div>
            </div>

            <div class="swiper-slide slide">
               <div class="image">
                  <img src="pictuer/Risk management-amico.png" alt="">
                  <h3>Gestion des Entreprises</h3>
               </div>
               <div class="content">
                  <h3>Gestion des Entreprises</h3>
                  <p>Le tronc commun Gestion des Entreprises
                     donne au stagiaire toutes les informations
                     et compétences nécessaires pour découvrir
                     le monde des metiers</p>
                  <a href="#" class="btn">read more</a>
               </div>
            </div>
         </div>

      </div>

   </section>

   <!-- home courses slider section ends -->









   <!-- footer section starts  -->

   <section class="footer">

      <div class="box-container">

         <div class="box">
            <a href="#" class="logo"> <img src="pictuer/l.png" alt="ss"> </a>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi, voluptatem.</p>
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
         </div>

         <div class="box">
            <h3>Liens rapides</h3>
            <a href="home.php" class="link">Accueil</a>
            <a href="about.php" class="link">props</a>
            <a href="courses.php" class="link">Institut</a>
            <a href="#" class="link">Filières</a>
            <a href="courses.php" class="link">contact</a>
         </div>

         <!-- <div class="box">
            <h3>Liens utiles</h3>
            <a href="#" class="link">centre d'aide</a>
            <a href="#" class="link">poser des questions</a>
            <a href="#" class="link">envoyer des commentaires</a>
            <a href="#" class="link">politique privée</a>
            <a href="#" class="link">conditions d'utilisation</a>
         </div> -->

         <div class="box">
            <h3>les résulte</h3>
            <p>Entrez le code de la carte nationale</p>
            <form action="">
               <input type="text" name="" placeholder="enter cin" id="" class="cin fs-2 p-3">
               <input type="submit" value="Valider" class="btn">
            </form>
         </div>

      </div>



   </section>

   <!-- footer section ends -->







   <!-- swiper js link  -->
   <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>
  

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
  integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
</script>

</body>

</html>