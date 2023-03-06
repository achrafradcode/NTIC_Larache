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
    <title>ISTA larache</title>

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
   </style>

</head>
<body>
<?php require_once("Header.php")?>   
 <section class="heading-link" style="background:  linear-gradient(rgba(0, 0, 0, 0.596), rgba(47, 142, 206, 0.514)), url(pictuer/OFPPT-d.png); background-position: center; background-size: cover; height: 300px;">
    <h3 style="padding-top: 100px;"> Développement Digital</h3>
   
 </section>
    <section class="info">
        <div class="cl">
            <h1>Technicien Spécialisé en Développement Digital</h1>
            <h3>Description de la Formation</h3>
            <p>Le Technicien Spécialisé en Développement Informatique est un professionnel  en charge du développement et de la maintenance des applications informatiques. Il intervient, généralement pour le compte de Sociétés de Services et d’Ingénierie Informatiques, dans de nombreux domaines applicatifs (industrie, gestion, loisirs…).
                En amont, il est réceptif aux attentes du client, il étudie le cahier des charges, les capacités de l’environnement technique et les contraintes du système de production du client.
                En aval, il participe à la mise en exploitation et au support technique de l’application</p>
        </div>
        <div class="pic" >
            <div class="img1">
                <img src="pictuer/salle-deve.jpg" alt="photo">
                <img src="pictuer/OFPPT.jpg" alt="photo">
                <img src="pictuer/dev2.jpg" alt="photo">
            </div>
        </div>
        <div class="cl" style="padding-top: 10px;">
            <h3>Conditions d'Accès</h3>
            <ul class="condition">
                <li>Age maximum : 23 ans pour les bacheliers et 26 ans pour les licenciés</li>
                <li>Niveau Scolaire : Bacheliers Scientifiques ou Techniques</li>
                <li>Les qualités et aptitudes que le candidat doit posséder pour l’accès à cette formation sont :</li>
                        <ol>
                            <li>Sens des responsabilités, de l’organisation et de la discipline ;</li>
                            <li>Autonomie</li>
                            <li>Esprit d’analyse et de synthèse</li>
                            <li>Créativité</li>
                            <li>Curiosité pour les nouvelles technologies de l’information</li>
                            <li>Fortes capacités d’adaptation</li>
                            
                        </ol>
            </ul>

            <h3 style="padding-top: 15px;">Durée de la Formation</h3>
            <p>Le mode de formation est résidentiel. La durée de formation est deux années incluant des stages en entreprise</p>
            <h3 style="padding-top: 15px;">Evaluation de la Formation</h3>
            <p>La formation dispensée est modulaire et les évaluations sont organisées sous forme de:</p>
              <ul>
                <li>Contrôles continus ;</li>
                <li>Examens de fin de module ;</li>
                <li>Examen de passage ;</li>
                <li>Examen de fin de formation</li>
              </ul>
        </div>

    </section>
</body>
</html>