<?php
session_start();
require_once("inc/functions.inc.php");
$indexPage=4;
if(isset($_POST["nom"])){
   try {
      $nom = $_POST["nom"];
      $email = $_POST["email"];
      $contenu = $_POST["contenu"];
      
      
      $data = [ [
          "$nom",  
          "$email",  
      "$contenu"]];
      

      $sql = "INSERT INTO message (
                                  `nom` ,
                                  `mail` ,
                                  `contenu`) 
                                  VALUES 
                                  ( 
                                  ?,
                                  ?,
                                  ?)";
      $stmt = executeRequete($sql);

      
      $pdo->beginTransaction();
      foreach ($data as $row)
      {
          $stmt->execute($row);
      }
      $pdo->commit();
      $result["success"] = ["msg"=>"successfully","msgDet"=>"Message Envoyer !"];
      
  }catch (Exception $e){
      $pdo->rollback();
      $result["error"] = ["msg"=>"error ??","msgDet"=>"verify les inputs entrer ou contacter le support .[".$e->getMessage()."]"];
      die("Error querying database: " . $e->getMessage());
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ISTA Larache - contact</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="/inc/css/admin_style.css">

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
<div class="position-absolute  w-50 start-50 translate-middle p-0 m-0 " style="top: 50px;z-index: 1001;">
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </symbol>
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
            </svg>
            <?php
                foreach($result as $key => $value){
                    if($key == "success"){       
            ?>
                <div class="alert alert-success  alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <strong><?php echo $value["msg"]?></strong> <?php echo $value["msgDet"]?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>                              
                <?php
                    }
                    if($key == "error"){
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <strong><?php echo $value["msg"]?></strong> <?php echo $value["msgDet"]?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    }
                ?>
            <?php
                }
            ?>
    </div>
<!-- header section starts  -->
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

<section class="heading-link" style="padding-top:100px;background-image: url(pictuer/contact-cover.png);">
   <h3>Contactez-nous</h3>
   <p> <a href="home.php">Accueil</a> / contact </p>
   
</section>

<!-- contact section starts  -->

<section class="contact">

   <h1 class="heading"> Rester en contact </h1>

   <div class="icons-container">

      <div class="icons">
         <i class="fas fa-clock"></i>
         <h3>Horaires d'ouvertures :</h3>
         <p>07:00am to 06:30pm</p>
      </div>

      <div class="icons">
         <i class="fas fa-phone"></i>
         <h3>Telephone :</h3>
         <p>+212-539-91-2646</p>
         <p>+212-222-3333</p>
      </div>

      <div class="icons">
         <i class="fas fa-envelope"></i>
         <h3> email : </h3>
         <p>ofppt-larache@gmail.com</p>
         <p>ista-larache@gmail.com</p>
      </div>

      <div class="icons">
         <i class="fas fa-map"></i>
         <h3>address :</h3>
         <p>Rte de Rabat . Avenue Omar Ibn Abdelaziz B.P. 61\n92000 Larache</p>
      </div>

   </div>

   <div class="row">

      <div class="image">
         <img src="pictuer/icon_c.png" alt="">
      </div>

      <form method="POST">
         <h3>Envoie-nous un message</h3>
         <input name="nom" type="text" placeholder="nom" class="box">
         <input name="email" type="email" placeholder="email" class="box">
         <!-- <input name="" type="tel" placeholder="telephone" class="box"> -->
         <textarea name="contenu" class="box" placeholder="message" id="" cols="30" rows="10"></textarea>
         <input type="submit" nom="submit" value="envoyer le message" class="btn">
      </form>

   </div>

</section>










<!-- footer section starts  -->

<section class="footer">

   <div class="box-container">

      <div class="box">
         <h3> OFPPT </h3>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi, voluptatem.</p>
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
      </div>

      <div class="box">
         <h3>Liens Rapides</h3>
         <a href="home.php" class="link">Accueil</a>
         <a href="about.php" class="link">Propos</a>
         <a href="#" class="link">Institut</a>
         <a href="courses.php" class="link">Filières</a>
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
         <h3>bulletin</h3>
         <p>abonnez-vous pour les dernières mises à jour</p>
         <form action="">
            <input type="email" name="" placeholder="entrer votre Email" id="" class="email">
            <input type="submit" value="valider" class="btn">
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