<html>

    <head>

       
    </head>

    <body>
        <fieldset>
            <legend>Commande Pizza</legend>
            <table>
                <tr>
                    <td>Nom :</td>
                    <td><input type="text" id="nom"></td>
                </tr>
                <tr>
                    <td>Prenom :</td>
                    <td><input type="text" id="prenom"></td>
                </tr>
                <tr>
                    <td>Adresse :</td>
                    <td><textarea  id="adresse" cols="30" rows="10"></textarea></td>
                </tr>
                <tr>
                    <td>Email :</td>
                    <td><input type="email" id="email"></td>
                </tr>
                <tr>
                    <td>Nbre presonne :</td>
                    <td><select id="nbrPerson">
                        <option value="1">un</option>
                        <option value="2">deux</option>
                        <option value="3">trois</option>
                    </select></td>
                </tr>
                <tr>
                    <td>Nbre Pizza :</td>
                    <td><select id="nbrPizza">
                        <option value="1">un</option>
                        <option value="2">deux</option>
                    </select></td>
                </tr>
            </table>
            <div>
                <input type="button" value="valider" onclick="valider()">
                <input type="button" value="Annuler" onclick="annuler()">
            </div>
            
        </fieldset>

        <script>
            let nomI = document.getElementById("nom");
            let prenomI = document.getElementById("prenom");
            let adresseI = document.getElementById("adresse");
            let emailI = document.getElementById("email");
            let nbrPersonI = document.getElementById("nbrPerson");
            let nbrPizzaI = document.getElementById("nbrPizza");
            

            function valider() {
                let nbrPersonVal =  nbrPersonI.value;
                let nbrPizzaVal = parseInt( nbrPizzaI.value );

                if(nbrPersonVal == "1"){
                    alert(25*nbrPizzaVal);
                }else if(nbrPersonVal == "2"){
                    alert(40*nbrPizzaVal);
                }else{
                    alert(55*nbrPizzaVal);
                }
                
            }
            function annuler() {
                nomI.value = ""
                prenomI.value = ""
                adresseI.value = ""
                emailI.value = ""
                nbrPersonI.value = 1
                nbrPizzaI.value = 1
            }
        </script>

    </body>

</html>