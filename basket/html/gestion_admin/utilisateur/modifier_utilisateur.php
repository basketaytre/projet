<?php
$idUtilisateur = '';
$statut = '';
$pseudonyme = '';
$nom = '';
$prenom = '';
$adresseMail = '';
$mdp = '';
$mdp2 = '';
$telephone = '';
$anonyme = 0;
$message = '';
$succes = '';
$donneeErreur = '';
$valide = '';

if (isset($_GET['idUtilisateur'])) {
    $idUtilisateur = $_GET['idUtilisateur'];
    $requete = "select * from utilisateur where idUtilisateur='$idUtilisateur'";
    $resultats = $connexion->query($requete);
    $lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
    $ligne = $lignes[0];
    $statut = $ligne['statut'];
    $pseudonyme = $ligne['pseudonyme'];
    $nom = $ligne['nom'];
    $prenom = $ligne['prenom'];
    $adresseMail = $ligne['adresseMail'];
    $mdp = $ligne['mdp'];
    $mdp2 = $ligne['mdp'];
    $anonyme = $ligne['anonyme'];
    $telephone = $ligne['telephone'];
}
if (isset($_GET['valide'])) {
    $idUtilisateur = $_POST['idUtilisateur'];
    if (isset($_POST["statut"])) {
        $statut = $_POST["statut"];
    }
    if (isset($_POST["pseudonyme"])) {
        $pseudonyme = $_POST["pseudonyme"];
    }
    if (isset($_POST["nom"])) {
        $nom = $_POST["nom"];
    }
    if (isset($_POST["prenom"])) {
        $prenom = $_POST["prenom"];
    }
    if (isset($_POST["adresseMail"])) {
        $adresseMail = $_POST["adresseMail"];
    }
    if (isset($_POST["mdp"])) {
        $mdp = $_POST["mdp"];
    }
    if (isset($_POST["mdp2"])) {
        $mdp2 = $_POST["mdp2"];
    }
    if (isset($_POST["telephone"])) {
        $telephone = $_POST["telephone"];
    }
    if (((strlen($statut)) > 30) || (strlen($statut)) < 1) {
        $donneeErreur = $donneeErreur . "- Statut invalide, <br>";
    }
    if (((strlen($pseudonyme)) > 30) || (strlen($pseudonyme)) < 1) {
        $donneeErreur = $donneeErreur . "- Pseudonyme invalide, <br>";
    }
    if (((strlen($nom)) > 50) || (strlen($nom)) < 1) {
        $donneeErreur = $donneeErreur . "- Nom invalide, <br>";
    }
    if (((strlen($prenom)) > 30) || (strlen($prenom)) < 1) {
        $donneeErreur = $donneeErreur . "- Prenom invalide, <br>";
    }
    if (((strlen($adresseMail)) > 50) || (strlen($adresseMail)) < 1) {
        $donneeErreur = $donneeErreur . "- Adresse mail invalide, <br>";
    }
    if (((strlen($mdp)) > 50) || (strlen($mdp)) < 6) {
        $donneeErreur = $donneeErreur . "- Mot de passe invalide, <br>";
    }
    if (strlen($mdp)!= strlen($mdp2))  {
        $donneeErreur = $donneeErreur . "- Vos mots de passes ne correspondent pas <br>";
    }
    if (strlen(preg_replace('/\s/', '', $telephone)) != 10){
        $donneeErreur = $donneeErreur . "- Numero de téléphone invalide, <br>";
    }
    if (isset($_POST['anonyme'])){
        $anonyme=1;
    }
    else{
        $anonyme=0;
    }   
    if ($donneeErreur != '') {
        $message = "<div class='alert alert-danger'><strong>Erreur !</strong> Le sponsor n'a pas pu être modifié.<br> $donneeErreur </div>";
    }
    if ($donneeErreur == '') {
        $option = ['cost' => 12,];
        $mdp = password_hash($mdp,PASSWORD_BCRYPT,$option);
        $telephone = (preg_replace('/\s/', '', $telephone));
        $requete = "update utilisateur set statut='$statut',pseudonyme='$pseudonyme',nom='$nom',prenom='$prenom',telephone='$telephone',adresseMail='$adresseMail',mdp='$mdp',anonyme='$anonyme' where idUtilisateur='$idUtilisateur'";
        $connexion->exec($requete);
        $message="<div class='alert alert-success'><strong>Traitement effectué !</strong> Votre modification à bien été prise en compte .</div>";
    }
}
?>
<!-------------------------------------------------------Page de modification d'utilisateur---------------------------------------------------------------->
<!-- Formulaire de modofication d'utilisateur-->
<form  name="monForm" method="post" action="index.php?action=modifier_utilisateur&valide=ok">
    <div>
        <?= $message ?>
    </div>
    <h1>Modification d'un utilisateur</h1>
    <br>
    <br>
    <!-- Champ -->
    <label class="form_col" for="pseudonyme">ID Utilisateur : </label>
    <input type="text" name="idUtilisateur" readonly="" value='<?= $idUtilisateur ?>'>
    <br>
    <br>
    <!-- Champ pseudonyme -->
    <label class="form_col" for="pseudonyme">Pseudonyme: </label>
    <input name="pseudonyme" id="pseudonyme" type="text"  value='<?= $pseudonyme ?>' onblur="indexDonnees(0, 1)">
    <span class="tooltip" id="tooltipPseudonyme">Doit être compris entre 1 et 30 caractères</span>
    <br>
    <br>
    <!-- Champ statut-->
    <label class="form_col" for="statut">Statut: </label>
    <input name="statut" id="statut" type="text"  value='<?= $statut ?>' onblur="indexDonnees(1, 1)">
    <span class="tooltip" id="tooltipStatut">Doit être compris entre 1 et 30 caractères</span>
    <br>
    <br>
    <!-- Champ nom-->
    <label class="form_col" for="nom">Nom* : </label>
    <input type="text" id="nom" name="nom" value='<?= $nom ?>' onblur="indexDonnees(2, 1)">
    <span class="tooltip" id="tooltipNom">Doit être compris entre 1 et 50 caractères</span>
    <br>
    <br>
    <!-- Champ prenom-->
    <label class="form_col" for="prenom">Prénom* : </label>
    <input type="text" id="prenom" name="prenom" value='<?= $prenom ?>' onblur="indexDonnees(3, 1)">
    <span class="tooltip" id="tooltipPrenom">Doit être compris entre 1 et 50 caractères</span>
    <br>
    <br>
    <!-- Champ adresse mail-->
    <label class="form_col" for="adresseMail">Adresse mail* : </label>
    <input type="email" id="adresseMail" name="adresseMail" value='<?= $adresseMail ?>' onblur="indexDonnees(4, 1)">
    <span class="tooltip" id="tooltipAdresseMail">Doit être compris entre 6 et 50 caractères</span>
    <br>
    <br>
    <!-- Champ mot de passe-->
    <label class="form_col" for="mdp">Mot de passe* : </label>
    <input type="password" id="mdp" name="mdp" value='<?= $mdp ?>' onblur="indexDonnees(5, 1)">
    <span class="tooltip" id="tooltipMdp">Doit être compris entre 6 et 50 caractères</span>
    <br>
    <br>
    <!-- Champ verif mot de passe-->
    <label class="form_col" for="mdp2">Verification mot de passe* : </label>
    <input type="password" id="mdp2" name="mdp2" value='<?= $mdp2 ?>' onblur="validMdp()">
    <span class="tooltip" id="tooltipMdp2">Doit être identique</span>
    <br>
    <br>
    <!-- Champ telephone-->
    <label class="form_col" for="telephone">Téléphone* : </label>
    <input type="text" id="telephone" name="telephone" value='<?= $telephone ?>' onblur="indexDonnees(6, 1)">
    <span class="tooltip" id="tooltipTelephone">Doit faire 10 caractères</span>
    <br>
    <br>
    <!-- Case anonyme -->
    <label class="form_col" for="anonyme">Anonyme </label>
    <input type="checkbox" id="anonyme" name='anonyme' <?php if ($anonyme) echo 'checked'; ?>/>
    <!-- Bouton -->
    <div>
        <input type='submit' value='Enregistrer' OnClick="return validFormulaire()"/>
        <input type='reset' value="Réinitialiser le formulaire" />
        <input type='button' value='Retour' OnClick="window.location.href='index.php?action=gestion_utilisateur'" />
    </div>
    <br>
</form>
<!-- Fin du formulaire de modification d'utilisateur-->
<script src="js/utilisateur/modifier_utilisateur.js"></script>
<!-------------------------------------------------------Fin de la page de modification d'utilisateur--------------------------------------------------------------->
