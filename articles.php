<?php
session_start();
require_once("inc/functions.inc.php");
$indexPage=2;
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ISTA Larache - Articles</title>
   <link rel="icon" href="pictuer/l.png"/>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
   integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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

        .courses .image{
            height: 100% !important;
            width: 800px;
        }
        .courses .box{
         height: 320px;
        }
   </style>


</head>
<body>
   
    <?php require_once("Header.php")?>   



<!-- header section ends -->

<section class="heading-link" style="padding-top:100px;background-image: url(pictuer/filer1.png),linear-gradient(90deg, rgb(2 0 36 / 45%) 0%, rgb(0 212 255 / 45%) 100%);background-blend-mode: multiply;">
   <h3>Filières</h3>
   <p> <a href="home.php">Accueil</a> / Filières </p>
</section>

<section class="courses">

   <h1 class="heading"> Les Dernier Articles </h1>

   <?php
                                            
      $stmt = executeRequete("SELECT * FROM `articles_d'actualité`;");
      $stmt->execute();
      $index = 0;

      foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row){
          $index = $index + 1;
   ?>
       
       <div class="box-container mb-4">
          
          <div class="box d-flex justify-content-md-start">
             <div class="image">
            <img src="/inc/<?php 
                  $IdPhoto = $row["IdPhoto"];
                  $stmt3 = executeRequete("SELECT * FROM photo where IdPhoto=$IdPhoto;");
                  $stmt3->execute();
                  echo urldecode($stmt3->fetchAll(PDO::FETCH_ASSOC)[0]['url']);
               ?>" alt="">
            <h3><?php echo $row["date_de_publication"];?></h3>
         </div>
         <div class="content w-100">
            <h3><?php echo $row["titre_de_l'actualité"];?></h3>
            <p><?php echo $row["Description"];?></p>
            <a href="article_contenu.php?id=<?php echo $row["IdArticle"];?>" class="btn">Lire Plus</a>
            <div class="icons">
               <span> <i class="fas fa-pencil-alt"></i> <?php 
                  $IdMembres = $row["Membre_IdMembres"];
                  $stmt2 = executeRequete("SELECT * FROM membre where IdMembres=$IdMembres;");
                  $stmt2->execute();
                  echo $stmt2->fetchAll(PDO::FETCH_ASSOC)[0]['nom_personnel'];
               ?> </span>
               
            </div>
         </div>
      </div>
      <?php } ?>

      
   </div>  
     

      

</section>











<!-- footer section starts  -->

<section class="footer">

   <div class="box-container">

      <div class="box">
         <a href="#" class="logo">  <img src="pictuer/l.png" alt="ss"> </a>
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
         <a href="courses.php"class="link">Institut</a>
         <a href="#" class="link">Filières</a>
         <a href="courses.php" class="link">contact</a>
      </div>

      <div class="box">
         <h3>Liens utiles</h3>
         <a href="#" class="link">centre d'aide</a>
         <a href="#" class="link">poser des questions</a>
         <a href="#" class="link">envoyer des commentaires</a>
         <a href="#" class="link">politique privée</a>
         <a href="#" class="link">conditions d'utilisation</a>
      </div>

      <div class="box">
         <h3>les résulte</h3>
         <p>Entrez le code de la carte nationale</p>
         <form action="">
            <input type="text" name="" placeholder="enter cin" id="" class="cin">
            <input type="submit" value="Valider" class="btn">
         </form>
      </div>

   </div>



</section>

<!-- footer section ends -->






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