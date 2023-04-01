<?php
session_start();
require_once("inc/functions.inc.php");
$indexPage=0;

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
   <link rel="stylesheet" href="/css/style.css">
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

        

        

        table {
            width: 100% !important;
            /* max-width: 650px; */
            font-size: x-large;
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

   <?php require_once("Header.php")?>   

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





   <?php require_once("footer.php")?>   



   







   <!-- swiper js link  -->
   <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>
  

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
  integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
</script>

</body>

</html>