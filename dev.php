<?php
session_start();
require_once("inc/functions.inc.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ISTA Larache</title>

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
   </style>

</head>
<body>
<?php require_once("Header.php")?>   
    <section class="info">
        <div class="cl">
            <h1>Technicien Spécialisé en Développement Digital</h1>
            <h3>Description de la Formation</h3>
            <p>Le Technicien Spécialisé en Développement Informatique est un professionnel  en charge du développement et de la maintenance des applications informatiques. Il intervient, généralement pour le compte de Sociétés de Services et d’Ingénierie Informatiques, dans de nombreux domaines applicatifs (industrie, gestion, loisirs…).
                En amont, il est réceptif aux attentes du client, il étudie le cahier des charges, les capacités de l’environnement technique et les contraintes du système de production du client.
                En aval, il participe à la mise en exploitation et au support technique de l’application</p>
        </div>
        <div class="pic">
            <div class="img1">
                <img src="pictuer/dev2.jpg" alt="photo">
                <img src="pictuer/dev2.jpg" alt="photo">
                <img src="pictuer/dev2.jpg" alt="photo">
            </div>
        </div>
        <div class="cl">
            <h3>Profil de la formation</h3>
            <p>A l’issue de la formation, le stagiaire sera en mesure d’exécuter les opérations et les activités suivantes :</p>
        </div>
    </section>
    
   <?php require_once("footer.php")?>   
</body>
</html>