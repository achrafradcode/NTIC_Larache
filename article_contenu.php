<?php
session_start();
require_once("inc/functions.inc.php");
$indexPage=-1;
$IdArticle = $_GET['id'];
$stmt5 = executeRequete("SELECT * FROM `articles_d'actualité` where IdArticle=$IdArticle;");
$stmt5->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ISTA larache - <?php echo $stmt5->fetchAll(PDO::FETCH_ASSOC)[0]["titre_de_l'actualité"];?></title>

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
 <section class="heading-link" style="background:  linear-gradient(rgba(0, 0, 0, 0.596), rgba(47, 142, 206, 0.514)), url(/inc/<?php 
                  $IdArticle = $_GET['id'];
                  $stmt5 = executeRequete("SELECT * FROM `articles_d'actualité` where IdArticle=$IdArticle;");
                  $stmt5->execute();
                  $IdPhoto = $stmt5->fetchAll(PDO::FETCH_ASSOC)[0]["IdPhoto"];
                  $stmt3 = executeRequete("SELECT * FROM photo where IdPhoto=$IdPhoto;");
                  $stmt3->execute();
                  echo urldecode($stmt3->fetchAll(PDO::FETCH_ASSOC)[0]['url']);
               ?>); background-position: center; background-size: cover; height: 300px;">
    <h3 style="padding-top: 100px;"> <?php
            $IdArticle = $_GET['id'];
            $stmt5 = executeRequete("SELECT * FROM `articles_d'actualité` where IdArticle=$IdArticle;");
            $stmt5->execute(); 
            echo $stmt5->fetchAll(PDO::FETCH_ASSOC)[0]["titre_de_l'actualité"];?></h3>
   
 </section>
    <section class="info" style="font-size: medium;">
    <?php
    $IdArticle = $_GET['id'];
    $stmt5 = executeRequete("SELECT * FROM `articles_d'actualité` where IdArticle=$IdArticle;");
    $stmt5->execute(); 
    
    $a = $stmt5->fetchAll(PDO::FETCH_ASSOC)[0]['contenu'];
 $aa = htmlspecialchars($a); //thus, $aa is the $result column data ($a) from a query
 echo $a;
 //now the code is html escaped twice, which is quite ugly. I need it cleaned and displayed without execution.
//   $char = trim(html_entity_decode($aa, ENT_QUOTES, 'UTF-8'));
//   $char = html_entity_decode($char, ENT_QUOTES, 'UTF-8'); 
//   $char = htmlentities(html_entity_decode($char, ENT_QUOTES, 'UTF-8'), ENT_QUOTES, 'UTF-8');
//   echo htmlspecialchars( $char);
    ?>
        

    </section>



    
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