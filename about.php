<?php
session_start();
require_once("inc/functions.inc.php");
$indexPage=1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ISTA Larache - Propos</title>
   <link rel="icon" href="pictuer/l.png"/>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
   integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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
   </style>


</head>
<body>
   
<?php require_once("Header.php")?>   

<!-- account form section starts  -->

<div class="account-form">

   <div id="close-form" class="fas fa-times"></div>

   <div class="buttons">
      <span class="btn active login-btn">login</span>
      <span class="btn register-btn">register</span>
   </div>

   <form class="login-form active" action="">
      <h3>login now</h3>
      <input type="email" placeholder="enter your email" class="box">
      <input type="password" placeholder="enter your password" class="box">
      <div class="flex">
         <input type="checkbox" name="" id="remember-me">
         <label for="remember-me">remember me</label>
         <a href="#">forgot password?</a>
      </div>
      <input type="submit" value="login now" class="btn">
   </form>

   <form class="register-form" action="">
      <h3>register now</h3>
      <input type="email" placeholder="enter your email" class="box">
      <input type="password" placeholder="enter your password" class="box">
      <input type="password" placeholder="confirm your password" class="box">
      <input type="submit" value="register now" class="btn">
   </form>

</div>

<!-- account form section ends -->

<!-- header section ends -->

<section class="heading-link" style="padding-top:100px;background-image: url(pictuer/about2.png) ,linear-gradient(90deg, rgb(2 0 36 / 45%) 0%, rgb(0 212 255 / 45%) 100%);background-blend-mode: multiply;">
   <h3>À propos de nous</h3>
   <p> <a href="home.php" >Accueil</a> / propos </p>
</section>

<!-- about section starts  -->

<section class="about">

   <div class="image">
      <img src="pictuer/of.jpg" alt="">
   </div>

   <div class="content">
      <h3 class="about-title">Beinveun dans ista larache</h3>
      <p>ISTA Larache offers a wide range of technical courses
         including automotive engineering, construction and architecture,
         business and entrepreneurship, electronics and electrical engineering,
         information technology, and manufacturing. The institution also offers a variety of applied research, development and innovation projects in several areas. Moreover,
         students can pursue postgraduate studies in engineering and management.
         </p>
      <div class="icons-container">
         <div class="icons">
            <img src="pictuer/teacher.png" alt="">
            <h3>30+</h3>
            <span>formateur</span>
         </div>
         <div class="icons">
            <img src="pictuer/stagiare.png" alt="">
            <h3>1000+</h3>
            <span>stagiare</span>
         </div>
         <div class="icons">
            <img src="pictuer/salle.png" alt="">
            <h3>20+</h3>
            <span>salle</span>
         </div>
      </div>
   </div>

</section>
<section class="prop">
   <div class="prop1">
      <h2>à propos de nous</h2>
      <p>L'Institut Spécialisé de Technologie Appliquée Larache (ISTA Larache) est un établissement <br> d'enseignement supérieur privé au Maroc.
         ISTA Larache dispense des formations techniques <br> de courte et longue durée dans différents domaines. C'est l'une des principales 
         institutions de la région,<br> offrant une éducation de qualité et des opportunités de développement professionnel.<br><br><br>
         ISTA Larache accorde une grande importance à offrir à ses apprentis une formation technique de haut niveau, <br> des activités innovantes de recherche et développement, ainsi que des opportunités de développement professionnel. <br> La Fondation s'engage à fournir des programmes éducatifs et de développement professionnel de haute qualité adaptés aux besoins de ses stagiaires</p>
         <p></p>
      <img src="pictuer/about1.jpg" alt="">
   </div>
</section>
















<?php require_once("footer.php")?>   






<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
  integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
  integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
</script>
<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>