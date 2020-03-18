<?php
$idUtilisateur = '';
$statut = '';
$pseudonyme = '';
$nom = '';
$prenom = '';
$adresseMail = '';
$mdp = '';
$telephone = '';
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
    if (strlen(preg_replace('/\s/', '', $telephone)) != 10){
        $donneeErreur = $donneeErreur . "- Numero de téléphone invalide, <br>";
    }
    if ($donneeErreur != '') {
        $message = "<div class='alert alert-danger'><strong>Erreur !</strong> Le sponsor n'a pas pu être modifié.<br> $donneeErreur </div>";
    }
    if ($donneeErreur == '') {
        $telephone = (preg_replace('/\s/', '', $telephone));
        $requete = "update utilisateur set statut='$statut',pseudonyme='$pseudonyme',nom='$nom',prenom='$prenom',telephone='$telephone',adresseMail='$adresseMail',mdp='$mdp' where idUtilisateur='$idUtilisateur'";
        $connexion->exec($requete);
        $message="<div class='alert alert-success'><strong>Traitement effectué !</strong> Votre modification à bien été prise en compte .</div>";
    }
}
?>
<form  name="monForm" method="post" action="index.php?action=modifier_utilisateur&valide=ok">
    <br><br>
    <div>
        <?= $message ?>
    </div>
    <h1>Modification d'un sponsor</h1>
    <p>ID Utilisateur : <input type="text" name="idUtilisateur" readonly="" value='<?= $idUtilisateur ?>'  ></p>
    <p>Statut : <input type="text" name="statut" value='<?= $statut ?>'  ></p>
    <p>Pseudonyme : <input type="text" name="pseudonyme" value='<?= $pseudonyme ?>'  ></p>
    <p>Nom : <input type="text" name="nom" value='<?= $nom ?>'  ></p>
    <p>Prenom : <input type="text" name="prenom" value='<?= $prenom ?>'  ></p>
    <p>Telephone : <input type="text" name="telephone" value='<?= $telephone ?>'  ></p>
    <p>Adresse Mail : <input type="text" name="adresseMail" value='<?= $adresseMail ?>'  ></p>
    <p>Mot de passe : <input type="text" name="mdp" value='<?= $mdp ?>'  ></p>
    <br>
    <br>

    <div>
        <input type='submit' value='Enregistrer' />
    </div>
    <br>
</form>
<div>
    <input type='submit' value='Retour' OnClick="window.location.href = 'index.php?action=gestion_utilisateur'"/>
</div>
