<?php
// si le formulaire a été soumis
if (isset($_POST['formconnect'])) {
    // si l'email et le mot de passe n'est pas vide
    if (!empty($emailconnect) && !empty($mdpconnect)) {
        // recherche de l'utilisateur qui possede l'email inscrit
        $requete = "select * from utilisateur where adresseMail = '$emailconnect'";
        // execution de la requette
        $resultats->exec($requete);
        // resultat de la requette inscrit dans un tableau associatif 
        $lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
        // si une ligne existe alors le var_dump seras vrais
        var_dump($lignes);
        // si le var_dump a trouver une ligne
        if ($lignes == true) {
            // recuperation du mot de passe associé au mail
            $hasspass = $lignes['mdp'];
            // comparaison du mot de passe crypté et de celui inscrit
            // si indentique
            if (password_verify($mdpconnect, $hasspass)) {
                echo "le mot de passe est bon";
                $_SESSION['emailconnect'] = $lignes['adresseMail'];
            }
            // si pas identique
            else {
                echo "le mot de passe n'est pas bon";
            }
        }
        // si le var_dump n'as pas trouver de ligne
        else {
            echo "l'email '$emailconnect' n'existe pas";
        }
    }
    // si il y a un champ vide
    else {
        echo"Veuillez completer l'ensemble des champs";
    }
}
?>

<!-------------------------------------------------------Page de connexion---------------------------------------------------------------->
<div class="text-center p-5" >
    <div class="mr-5 ml-5">
        <div class="my-3 p-3 rounded box-shadow mr-5 ml-5" style="background-color: #ededed;">

            <div class="rounded text-center text-white p-3 m-3 mt-5 bg-orange mb-5" >
                <h1 style="font-size:2em;"><i>Page en travaux</i></h1>
            </div>
        </div>
    </div>
    <!--Formulaire de connexion-->
    <form  class="form-connexion pt-5 pb-5" method="post" action="index.php?action=connexion_utilisateur">
        <!--Logo ABBA & titre -->
        <img src="images/logo_mini.PNG">
        <h1 class="pb-3">Se connecter</h1>

        <!--Email-->
        <label for="champsemail" class="sr-only">Email address</label>
        <input type="email" name="emailconnect" id="emailconnect" class="form-control" placeholder="Adresse-mail" required="" autofocus="">

        <!--Mot de passe-->
        <label for="champsmdp" class="sr-only">Password</label>
        <input type="password" name="mdpconnect" id="mdpconnect" class="form-control" placeholder="Mot de passe" required="" autofocus="">

        <!--Bouton connexion-->
        <button class="btn btn-lg btn-primary btn-block mt-4" type="submit" name="formconnect">Connexion</button>
    </form>
    <!--Fin du formulaire de connexion-->
</div>
<!-----------------------------------------------------Fin de la page de connexion--------------------------------------------------------->
