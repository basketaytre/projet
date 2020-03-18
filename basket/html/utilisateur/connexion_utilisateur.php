<?php
$adresseMail= '';

if (isset($_POST['pseudonyme']) {
    $pseudonyme = $_POST["pseudonyme"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $adresseMail = $_POST["adresseMail"];
    $telephone = $_POST["telephone"];

    if ((strlen($pseudonyme) > 30) || (strlen($pseudonyme)) < 1)  {
        $donneeErreur = $donneeErreur . "- Pseudonyme invalidde,<br>";
    }

    if (((strlen($nom)) > 50) || (strlen($nom)) < 1) {
        $donneeErreur = $donneeErreur . "- Nom invalide, <br>";
    }
    if (((strlen($prenom)) > 50) || (strlen($prenom)) < 1) {
        $donneeErreur = $donneeErreur . "- Prénom invalide, <br>";
    }
    if (((strlen($adresseMail)) > 50) || (strlen($adresseMail)) < 6) {
        $donneeErreur = $donneeErreur . "- Adresse mail invalide, <br>";
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
        $message = "<div class='alert alert-danger'><strong>Erreur ! </strong>Votre profil n'a pas pu être créé.<br> $donneeErreur </div>";
    }
    if ($donneeErreur == '') {
        echo $anonyme;
        $telephone=(preg_replace('/\s/', '', $telephone));
        $requete = "insert into utilisateur (pseudonyme,nom,prenom,adresseMail,telephone,anonyme) values ('$pseudonyme','$nom','$prenom','$adresseMail',$telephone,$anonyme);";
        $message = "<div class='alert alert-success'><strong>Traitement effectué !</strong> Votre sponsor à bien été créé .</div>";
        $connexion->exec($requete);
    }
}
?>

<form  name="monForm" method="post" action="index.php?action=inscription_utilisateur" >
    <div>
        <?= $message ?>
    </div>
    <h1>S'inscrire</h1>
    <label class="form_col" for="nom">Pseudonyme: </label>
    <input name="pseudonyme" id="pseudonyme" type="text"  value='<?= $pseudonyme ?>'>
    <!--<span class="tooltip" id="tooltipnom">Doit être compris entre 1 et 70 caractères</span>-->
    <p>Nom* : <input type="text" name="nom" value='<?= $nom ?>'   ></p>
    <p>Prénom* : <input type="text" name="prenom" value='<?= $prenom ?>'  ></p>
    <p>Adresse mail* : <input type="email" name="adresseMail" value='<?= $adresseMail ?>'   ></p>
    <p>Téléphone* : <input type="text" name="telephone" value='<?= $telephone ?>' </p>
    <p>Anonyme <input type="checkbox" name='anonyme' <?php if ($anonyme) echo 'checked'; ?>/><p>
    <div>
        <input type='submit' value='Enregistrer' OnClick="validform()" />
    </div>
    <br>
</form>
<div>
    <input type='button' value='Retour' OnClick="window.location.href='index.php'" />
    <!--'index.php?action=gestion_sponsor'"-->
</div>
<!--<script src="js/sponsor/creer_sponsor.js">
</script>-->
