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
            <div class="PDFContainer rounded ">
                     
            <div id="PDFViewer" class="pt-5 d-flex  flex-column justify-content-start">
               
                  <iframe id="PDFFrame" src="/inc/uploads/emp.pdf" width="100%" height="500px">
                  </iframe>
                  
            </div>
            <div id="unexist" class="text-center w-100" style="display: none;">
               <h1>Pas Encore....</h1>
            </div>
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
         <a href="home.php" class="text-decoration-none <?php if($indexPage==0)echo "text-black-50"?>">Accueil</a>
         <a href="about.php" class="text-decoration-none <?php if($indexPage==1)echo "text-black-50"?>">Propos </a>
         <a href="articles.php" class="text-decoration-none <?php if($indexPage==2)echo "text-black-50"?>">Articles </a>
         <a href="courses.php" class="text-decoration-none <?php if($indexPage==3)echo "text-black-50"?>">Filières</a>
         <a href="contact.php" class="text-decoration-none <?php if($indexPage==4)echo "text-black-50"?>">contact</a>
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
               
                   window.selectedGroup = $(e.target).text();
                   $("#PDFViewer").attr("style","display: none !important;");
                   $.post("../inc/functions.inc.php", {
                      function_name: "executeRequete",
                      requet: "SELECT * FROM `tablaux_pdf` where `GroupStagiaire`='" + window.selectedGroup + "';"
                     }, function(d) {
                        // Handle the response here
                        console.log(d);
                        var data = JSON.parse(d);
                       window.selected = data;
                       // $().find().length
                       console.log(window.selected);
                       
                       if(data.length > 0){
                          $("#unexist").hide();
                          $("#PDFViewer").attr("style","display: inline !important;");
                           window.IdFichierPDF = data[0]['IdFichierPDF'];
                           
                           $.post("../inc/functions.inc.php", {
                               function_name: "executeRequete",
                               requet: "SELECT * FROM `fichier` where `idFichier`='" + window.IdFichierPDF + "';"
                           }, function(d) {
                               console.log(d);
                               var data2 = JSON.parse(d);
                               window.UrlFichierPDF = "/inc/"+decodeURIComponent(data2[0]['url']);
                               
                               
                               $("#PDFFrame")[0].src = "/inc/"+decodeURIComponent(data2[0]['url']);
                               
                           });

                       }else{
                        $("#unexist").show();
                       }

                       
                      
                  });

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