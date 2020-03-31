<?php
// si le formulaire a été soumis
if (isset($_POST['formconnect'])) {
    $emailconnect = $_POST["emailconnect"];
    $mdpconnect = $_POST["mdpconnect"];
    // si l'email et le mot de passe n'est pas vide
    if (!empty($emailconnect) && !empty($mdpconnect)) {
        // recherche de l'utilisateur qui possede l'email inscrit
        $requete = "select * from utilisateur where adresseMail = '$emailconnect'";
        // execution de la requette
        $resultat=$connexion->query($requete);
        // resultat de la requette inscrit dans un tableau associatif
        $lignes=$resultat->fetchAll(PDO::FETCH_ASSOC);
        // si le var_dump a trouver une ligne
        if ($lignes == true) {
            // recuperation du mot de passe associé au mail
            foreach ($lignes as $ligne) {
                $hasspass = $ligne['mdp'];
            }
            // comparaison du mot de passe crypté et de celui inscrit
            // si indentique
            if (password_verify($mdpconnect, $hasspass)) {
                echo "<div class='alert alert-success'><strong>Identifiants Corrects</strong>, connexion effectuée  .</div>";
                $_SESSION['pseudonyme'] = $ligne['pseudonyme'];
                $_SESSION['statut'] = $ligne['statut'];
                $_SESSION['nom'] = $ligne['nom'];
                $_SESSION['prenom'] = $ligne['prenom'];
                $_SESSION['email'] = $ligne['adresseMail'];
                $_SESSION['telephone'] = $ligne['telephone'];
            }
            // si pas identique
            else {
                echo "<div class='alert alert-danger'><strong>Erreur !</strong> Le mot de passe est incorrect.</div>";
            }
        }
        // si le var_dump n'as pas trouver de ligne
        else {
            echo "<div class='alert alert-danger'><strong>Erreur !</strong> L'email '$emailconnect' n'existe pas.</div>";
        }
    }
    // si il y a un champ vide
    else {
        echo"<div class='alert alert-danger'><strong>Erreur !</strong> Veuillez completer les champs requis.</div>";
    }
}
?>

<!-------------------------------------------------------Page de connexion---------------------------------------------------------------->
<div class="text-center p-5" >
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
