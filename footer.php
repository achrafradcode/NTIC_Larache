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
      
         <input type="text" name="" placeholder="enter cin" id="inputTablau" class="cin fs-2 p-3">
         <input type="button" value="Valider" class="btn" id="showTablau">
      >
   </div>

</div>
 
 <!-- Modal -->
 <div class="modal fade" id="tablauxDesNotes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl">
         <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title " id="ModalLabel">Tablau des notes</h1> <span class="badge text-bg-primary" style="font-size: 15px;margin-left: 10px;"><span id="GroupId">DD</span></span>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="ModalBody">
               <style>
                  .table tr td:hover {
                        background-color: #2b7d2e1e;
                  }

                  .table tr td[id="active"] {
                        background-color: #0d5f1125 !important;
                        box-shadow: inset 0px 0px 0px 2px #2b7d2e7e;
                  }

                  .table tr td[id="active"]:hover {
                        background-color: #2b7d2e1e !important;
                        box-shadow: inset 0px 0px 0px 3px #2b7d2e7e;
                  }

                  .table tr td#active[scope="row"] {
                        background-color: #0354B4 !important;

                        box-shadow: inset 0px 0px 0px 2px #2b7d2e7e;
                  }

                  .table tr td#active[scope="row"]:hover {
                        background-color: #0354B4 !important;
                        box-shadow: inset 0px 0px 0px 3px #2b7d2e7e;
                  }


                  .Selecting {
                        transition-duration: all 0.1s;
                        transition-duration: 0.2s;
                        

                  }
                  table td {
                    font-size: 15px;
                    
                        min-width: auto;
                        max-width: auto;
                        min-height: auto;
                        max-height: auto;
                        width: auto;
                        height: auto;

                    }

                  

                  .NoteTable {
                        transition-duration: all 0.1s;
                        transition-duration: 0.2s;
                        display: flex;
                        justify-content: center;
                        flex-wrap: wrap;
                        
                  }

                  
               </style>
            <div id="" class="NoteTable">

               
               <table class="table
                  
                  table-bordered 
                  table-primary
                  align-middle">
                  <thead>
                     <tr class="bg-primary ">
                           <th scope="col" class="bg-primary text-white">La matiere</th>
                           <th scope="col" class="bg-primary text-white ">Control 1</th>
                           <th scope="col" class="bg-primary text-white ">Control 2</th>
                           <th scope="col" class="bg-primary text-white ">Control 3</th>
                           <th scope="col" class="bg-primary text-white ">Control 4</th>
                           <th scope="col" class="bg-primary text-white">Total</th>
                     </tr>
                  </thead>
                  <style>
                     .NameModuleInput {
                           border: none;
                           background-color: transparent;
                           color: inherit;
                     }

                     .NoteTable td {
                           padding: 0;
                     }

                     .NoteTable input[type="number"] {
                           border: none;
                           border-radius: 0;
                           background-color: transparent;
                           color: inherit;
                           appearance: textfield;


                     }
                     .form-control:disabled {
                        background-color: inherit;
                        opacity: 1;
                        font-size: x-large;
                    }

                     .NoteTable input[type="number"].form-control:focus {

                           outline: 0;
                           box-shadow: 0 0 0 .25rem rgba(13, 110, 253, .25);
                     }
                  </style>
                  <tbody>
                     <tr class="">
                           <td scope="row" class="bg-primary text-white NomModule_1"><input disabled type="text" value="" class="NameModuleInput form-control"></td>
                           <td class="note_1_1"><input type="number" disabled class="form-control form-control-sm" value="0"></td>
                           <td class="note_1_2"><input type="number" disabled class="form-control form-control-sm"></td>
                           <td class="note_1_3"><input type="number" disabled class="form-control form-control-sm"></td>
                           <td class="note_1_4"><input type="number" disabled class="form-control form-control-sm"></td>
                           <td class="total_1"><input type="number" disabled class="form-control form-control-sm" value="0"></td>
                     </tr>
                     <tr class="">
                           <td scope="row" class="bg-primary text-white NomModule_2"><input disabled type="text" value="" class="NameModuleInput form-control"></td>
                           <td class="note_2_1"><input type="number" disabled class="form-control form-control-sm"></td>
                           <td class="note_2_2"><input type="number" disabled class="form-control form-control-sm"></td>
                           <td class="note_2_3"><input type="number" disabled class="form-control form-control-sm"></td>
                           <td class="note_2_4"><input type="number" disabled class="form-control form-control-sm"></td>
                           <td class="total_2"><input type="number" disabled class="form-control form-control-sm"></td>
                     </tr>
                     <tr class="">
                           <td scope="row" class="bg-primary text-white NomModule_3"><input disabled type="text" value="" class="NameModuleInput form-control"></td>
                           <td class="note_3_1"><input type="number" disabled class="form-control form-control-sm"></td>
                           <td class="note_3_2"><input type="number" disabled class="form-control form-control-sm"></td>
                           <td class="note_3_3"><input type="number" disabled class="form-control form-control-sm"></td>
                           <td class="note_3_4"><input type="number" disabled class="form-control form-control-sm"></td>
                           <td class="total_3"><input type="number" disabled class="form-control form-control-sm"></td>
                     </tr>
                     <tr class="">
                           <td scope="row" class="bg-primary text-white NomModule_4"><input disabled type="text" value="" class="NameModuleInput form-control"></td>
                           <td class="note_4_1"><input type="number" disabled class="form-control form-control-sm"></td>
                           <td class="note_4_2"><input type="number" disabled class="form-control form-control-sm"></td>
                           <td class="note_4_3"><input type="number" disabled class="form-control form-control-sm"></td>
                           <td class="note_4_4"><input type="number" disabled class="form-control form-control-sm"></td>
                           <td class="total_4"><input type="number" disabled class="form-control form-control-sm"></td>
                     </tr>
                     <tr class="">
                           <td scope="row" class="bg-primary text-white NomModule_5"><input disabled type="text" value="" class="NameModuleInput form-control"></td>
                           <td class="note_5_1"><input type="number" disabled class="form-control form-control-sm"></td>
                           <td class="note_5_2"><input type="number" disabled class="form-control form-control-sm"></td>
                           <td class="note_5_3"><input type="number" disabled class="form-control form-control-sm"></td>
                           <td class="note_5_4"><input type="number" disabled class="form-control form-control-sm"></td>
                           <td class="total_5"><input type="number" disabled class="form-control form-control-sm"></td>
                     </tr>
                     <tr class="">
                           <td scope="row" class="bg-primary text-white NomModule_6"><input disabled type="text" value="" class="NameModuleInput form-control"></td>
                           <td class="note_6_1"><input type="number" disabled class="form-control form-control-sm"></td>
                           <td class="note_6_2"><input type="number" disabled class="form-control form-control-sm"></td>
                           <td class="note_6_3"><input type="number" disabled class="form-control form-control-sm"></td>
                           <td class="note_6_4"><input type="number" disabled class="form-control form-control-sm"></td>
                           <td class="total_6"><input type="number" disabled class="form-control form-control-sm"></td>
                     </tr>
                     <tr class="">
                           <td scope="row" class="bg-primary text-white NomModule_7"><input disabled type="text" value="" class="NameModuleInput form-control"></td>
                           <td class="note_7_1"><input type="number" disabled class="form-control form-control-sm"></td>
                           <td class="note_7_2"><input type="number" disabled class="form-control form-control-sm"></td>
                           <td class="note_7_3"><input type="number" disabled class="form-control form-control-sm"></td>
                           <td class="note_7_4"><input type="number" disabled class="form-control form-control-sm"></td>
                           <td class="total_7"><input type="number" disabled class="form-control form-control-sm"></td>
                     </tr>
                     <tr class="">
                           <td scope="row" class="bg-primary text-white NomModule_8"><inpu disabledt type="text" value="" class="NameModuleInput form-control"></td>
                           <td class="note_8_1"><input type="number" class="form-control form-control-sm"></td>
                           <td class="note_8_2"><input type="number" class="form-control form-control-sm"></td>
                           <td class="note_8_3"><input type="number" class="form-control form-control-sm"></td>
                           <td class="note_8_4"><input type="number" class="form-control form-control-sm"></td>
                           <td class="total_8"><input type="number" disabled class="form-control form-control-sm"></td>
                     </tr>
                  </tbody>
               </table>
               <!-- SOON <table class="table w-50
                  table-bordered 
                  table-primary
                  align-middle">
                  <thead style="opacity: 0; border:none;">
                     <tr style="border:none;">
                           <th scope="col" class="bg-primary text-white">La matiere</th>
                           <th scope="col" class="bg-primary text-white">Control 1</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr class="">
                           <td scope="row" class="bg-primary text-white GNomModule_1"><input type="text" value="" class="NameModuleInput form-control"></td>
                           <td class="Gnote_1"><input type="number" class=" form-control form-control-sm"></td>

                     </tr>
                     <tr class="">
                           <td scope="row" class="bg-primary text-white GNomModule_2"><input type="text" value="" class="NameModuleInput form-control"></td>
                           <td class="Gnote_2"><input type="number" class=" form-control form-control-sm"></td>
                     </tr>

                  </tbody>
               </table> -->



               </div>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            
            </div>
         </div>
      </div>
   </div>
     <!-- Modal -->
     <div class="Confirmation modal fade " id="Confirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-size: x-large;">Error</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="font-size: large;">
        Cette CIN n'exist pas 
      </div>
      <div class="modal-footer">
        
        <button type="button" id="ConfirmationOk"  class="btn btn-danger">Okey</button>
      </div>
    </div>
  </div>
</div>

<script>
    function onCLickAcceder(CartNationel) {
        
        $(".NoteTable").find("input").val("");
        $.post("../inc/functions.inc.php", {
            function_name: "executeRequete",
            requet: "SELECT * from membre where numéro_de_carte='" + CartNationel + "';"
        }, function(d) {
            // Handle the response here
            // console.log(data);
            var _data = JSON.parse(d);
            window.selected = _data;
            console.log(window.selected);
            if(_data.length > 0){
                
                $.post("../inc/functions.inc.php", {
                    function_name: "executeRequete",
                    requet: "SELECT * from tableau_des_points where Membre_IdMembres='" + _data[0]['IdMembres'] + "';"
                }, function(d) {
                    // Handle the response here
                    // console.log(data);
                    var data = JSON.parse(d);
                    window.selected3 = data;
                    console.log(window.selected3);

                    $.post("../inc/functions.inc.php", {
                        function_name: "executeRequete",
                        requet: "SELECT * from enseigner where Membre_IdMembres='" + _data[0]['IdMembres'] + "';"
                    }, function(d) {
                        // Handle the response here
                        // console.log(data);
                        var data2 = JSON.parse(d);
                        
                        console.log(data2);
                        $("#tablauxDesNotes").find('#GroupId').html(window.selected[0]['nom_personnel']+" "+window.selected[0]['prenom']+"["+data2[0]['Groupe_Stagiaires_code_groupe_Groupe']+"]");
                    });

                
                    
                    
                    // les unite des formations
                    $.post("../inc/functions.inc.php", {
                        function_name: "executeRequete",
                        requet: "SELECT * from unité_de_formation where Tableau_des_points_IdTableau_tableau='" + data[0]['IdTableau_tableau'] + "';"
                    }, function(d) {
                        // Handle the response here
                        // console.log(data);
                        var data = JSON.parse(d);
                        window.unites_de_formation = data;
                        console.log(window.unites_de_formation);
                        // Apply
                        // Reset
                        $(".NoteTable").find("td").attr("id", "");
                        
                        
                        window.onFinish = () => {

                            console.log(window.unites_de_formation);
                            //parse information
                            $(".NoteTable").find("td").attr("id", "");
                            $(".NoteTable").find("td input").val("");
                            window.unites_de_formation.forEach((unite, index, arr) => {
                                var total = 0;
                                var _index = (index + 1);
                                if (unite.index != undefined) {
                                    _index = unite.index + 1;
                                }
                                $(".NomModule_" + _index).find("input").val(unite['nom_Unité_de_formation']);
                                unite.notes.forEach((note, index2, arr) => {
                                    var _index2 = (index2 + 1);
                                    if (note.index != undefined) {
                                        _index2 = note.index + 1;
                                    }
                                    $(".note_" + _index + "_" + _index2).find("input").val(note['nomber']);
                                    $(".note_" + _index + "_" + _index2).attr("id", "active");
                                    total += parseFloat(note['nomber']);
                                });
                                $(".total_" + _index).find("input").val(parseInt(total / unite.notes.length));
                            });
                        }
                        
                        var count = 0;
                        window.unites_de_formation.forEach(unite => {
                            unite.notes = [];
                            $.post("../inc/functions.inc.php", {
                                function_name: "executeRequete",
                                requet: "SELECT * from note where Unité_de_formation_IdFormation='" + unite['IdFormation'] + "';"
                            }, function(d) {
                                // Handle the response here
                                // console.log(data);
                                var data = JSON.parse(d);
                                unite.notes = [...unite.notes, ...data];
                                count++;
                                if (window.unites_de_formation.length == count) {
                                    window.onFinish();
                                }
                            });
                        });



                    });
                });
            }else{
                $('#tablauxDesNotes').modal('hide');
                $('#Confirmation').modal('show');
            }
            
        });
    }

    $('#showTablau').on('click',()=>{
        $('#tablauxDesNotes').modal('show');
        onCLickAcceder($('#inputTablau').val());
    });
    $('#ConfirmationOk').on('click',()=>{
        $('#tablauxDesNotes').modal('hide');
        $('#Confirmation').modal('hide');
        
    });
</script>



</section>

<!-- footer section ends -->