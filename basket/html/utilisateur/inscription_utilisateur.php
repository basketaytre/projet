<?php
$pseudonyme = '';
$nom = '';
$prenom = '';
$adresseMail = '';
$mdp = '';
$mdp2 = '';
$telephone = '';
$anonyme = '';
$message = '';
$donneeErreur = '';

if (isset($_POST['pseudonyme'])) {
    $pseudonyme = $_POST["pseudonyme"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $adresseMail = $_POST["adresseMail"];
    $mdp = $_POST["mdp"];
    $mdp2 = $_POST["mdp2"];
    $telephone = $_POST["telephone"];

    if ((strlen($pseudonyme) > 30) || (strlen($pseudonyme)) < 1) {
        $donneeErreur = $donneeErreur . "- Pseudonyme invalide,<br>";
    }
    if (((strlen($nom)) > 50) || (strlen($nom)) < 1) {
        $donneeErreur = $donneeErreur . "- Nom invalide <br>";
    }
    if (((strlen($prenom)) > 50) || (strlen($prenom)) < 1) {
        $donneeErreur = $donneeErreur . "- Prénom invalide <br>";
    }
    if (((strlen($adresseMail)) > 50) || (strlen($adresseMail)) < 6) {
        $donneeErreur = $donneeErreur . "- Adresse mail invalide <br>";
    }
    if (((strlen($mdp)) > 50) || (strlen($mdp) < 6)) {
        $donneeErreur = $donneeErreur . "- Mot de passe invalide <br>";
    }
    if (strlen($mdp) != strlen($mdp2)) {
        $donneeErreur = $donneeErreur . "- Vos mots de passes ne correspondent pas <br>";
    }
    if (strlen(preg_replace('/\s/', '', $telephone)) != 10) {
        $donneeErreur = $donneeErreur . "- Numero de téléphone invalide <br>";
    }
    if (isset($_POST['anonyme'])) {
        $anonyme = 1;
    } else {
        $anonyme = 0;
    }
    if ($donneeErreur != '') {
        $message = "<div class='alert alert-danger'><strong>Erreur ! </strong>Votre profil n'a pas pu être créé.<br> $donneeErreur </div>";
    }
    if ($donneeErreur == '') {
        $option = ['cost' => 12,];
        $mdp = password_hash($mdp, PASSWORD_BCRYPT, $option);
        $telephone = (preg_replace('/\s/', '', $telephone));
        $requete2 = "insert into utilisateur (pseudonyme,nom,prenom,adresseMail,mdp,telephone,anonyme) values ('$pseudonyme','$nom','$prenom','$adresseMail','$mdp',$telephone,$anonyme);";
        $message = "<div class='alert alert-success'><strong>Traitement effectué !</strong> Vottre profil a bien été créé .</div>";
        $connexion->exec($requete2);
    }
}
?>
<!-------------------------------------------------------Page d'inscription---------------------------------------------------------------->
<div>
    <?= $message ?>
</div>
<div class="mr-5 ml-5">
    <div class="my-3 p-3 rounded box-shadow mr-5 ml-5" style="background-color: #ededed;">
        <div class="rounded text-center text-white p-3 m-3 mt-5 bg-orange mb-5" >
            <h1 style="font-size:2em;"><i>S'inscrire</i></h1>
        </div>
        <!--Formulaire d'inscription-->
        <form  name="monForm" method="post" action="index.php?action=inscription_utilisateur" >
            <label class="form_col" for="pseudonyme">Pseudonyme<span class="important">*</span> : </label>
            <input name="pseudonyme" id="pseudonyme" type="text"  value='<?= $pseudonyme ?>' onblur="indexDonnees(0, 1)">
            <span class="tooltip" id="tooltipPseudonyme">Doit être compris entre 1 et 30 caractères</span>
            <br>
            <br>
            <label class="form_col" for="nom">Nom<span class="important">*</span> : </label>
            <input type="text" id="nom" name="nom" value='<?= $nom ?>' onblur="indexDonnees(1, 1)">
            <span class="tooltip" id="tooltipNom">Doit être compris entre 1 et 50 caractères</span>
            <br>
            <br>
            <label class="form_col" for="prenom">Prénom<span class="important">*</span> : </label>
            <input type="text" id="prenom" name="prenom" value='<?= $prenom ?>' onblur="indexDonnees(2, 1)">
            <span class="tooltip" id="tooltipPrenom">Doit être compris entre 1 et 50 caractères</span>
            <br>
            <br>
            <label class="form_col" for="adresseMail">Adresse mail<span class="important">*</span> : </label>
            <input type="email" id="adresseMail" name="adresseMail" value='<?= $adresseMail ?>' onblur="indexDonnees(3, 1)">
            <span class="tooltip" id="tooltipAdresseMail">Doit être compris entre 6 et 50 caractères</span>
            <br>
            <br>
            <label class="form_col" for="mdp">Mot de passe<span class="important">*</span> : </label>
            <input type="password" id="mdp" name="mdp" value='<?= $mdp ?>' onblur="indexDonnees(4, 1)">
            <span class="tooltip" id="tooltipMdp">Doit être compris entre 6 et 50 caractères</span>
            <br>
            <br>
            <label class="form_col" for="mdp2">Verification mot de passe<span class="important">*</span> : </label>
            <input type="password" id="mdp2" name="mdp2" value='<?= $mdp2 ?>' onblur="validMdp()">
            <span class="tooltip" id="tooltipMdp2">Doit être identique</span>
            <br>
            <br>
            <label class="form_col" for="telephone">Téléphone<span class="important">*</span> : </label>
            <input type="text" id="telephone" name="telephone" value='<?= $telephone ?>' onblur="indexDonnees(5, 1)">
            <span class="tooltip" id="tooltipTelephone">Doit faire 10 caractères</span>
            <br>
            <br>
            <label class="form_col" for="anonyme">Anonyme </label>
            <input type="checkbox" id="anonyme" name='anonyme' <?php if ($anonyme) echo 'checked'; ?>/>
                <div class="col-lg-4 offset-1">
                    <input type="submit" value="Enregistrer" class="bouton-design rounded" OnClick="return validFormulaire()">
                    <input type='reset' value="Réinitialiser le formulaire"  class="bouton-design rounded" style="width:200px;"/>
                    <input type='button' value='Retour' class="bouton-design rounded" OnClick="window.location.href = 'index.php'" />
                </div>
            </div>
            <br>
        </form>
        <!--Fin du formulaire d'inscription-->
        <script src="js/utilisateur/inscription_utilisateur.js"></script>
        <!-------------------------------------------------------Fin de la page d'inscription---------------------------------------------------------------->
