<?php
$message = '';

if (isset($_POST['formconnect'])) {
    if ($valideConnexion == false) {
        $donneeErreur = "L'email et/ou le mot de passe n'existe pas <br>";
    }
    // si il y a un champ vide
    if ((strlen($emailconnect) < 1) || (strlen($mdpconnect) < 1)) {
        $donneeErreur = $donneeErreur . 'Veuillez saisir les champs requis';
    }
    if ($donneeErreur != '') {
        $message = '<div class="alert alert-danger"><strong>Erreur !</strong><br>' . $donneeErreur . '</div>';
    }
}
?>

<!-------------------------------------------------------Page de connexion---------------------------------------------------------------->
<?= $message ?>
<div class="text-center p-5" >
    <!--Formulaire de connexion-->
    <form  class="form-connexion pt-5 pb-5" method="post" action="index.php?action=connexion_utilisateur">
        <!--Logo ABBA & titre -->
        <img src="images/logo_mini.PNG">
        <h1 class="pb-3">Se connecter</h1>

        <!--Email-->
        <label for="champsemail" class="sr-only">Adresse Mail</label>
        <input type="email" name="emailconnect" id="emailconnect" class="form-control" placeholder="Adresse-mail" required="" autofocus="">

        <!--Mot de passe-->
        <label for="champsmdp" class="sr-only">Mot de passe</label>
        <input type="password" name="mdpconnect" id="mdpconnect" class="form-control" placeholder="Mot de passe" required="" autofocus="">

        <!--Bouton connexion-->
        <button class="btn btn-lg btn-primary btn-block mt-4" type="submit" name="formconnect">Connexion</button>
    </form>
    <!--Fin du formulaire de connexion-->
</div>
<!-----------------------------------------------------Fin de la page de connexion--------------------------------------------------------->
