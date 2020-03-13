<?php
$pseudonyme = '';
$nom = '';
$prenom = '';
$adresseMail='';
$telephone='';
$message = '';
$donneeErreur = '';

if (isset($_POST['pseudonyme'])) {
    $pseudonyme = $_POST["pseudonyme"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $adresseMail = $_POST["adresse"];
    $telephone = $_POST["telephone"];
    $anonyme = ($_POST["anonyme"]);

    if ((strlen($pseudonyme) > 30) || (strlen($nom)) < 1)  {
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
    if (((strlen($description)) > 750) || (strlen($description)) < 1) {
        $donneeErreur = $donneeErreur . "- Description invalide, <br>";
    }
    if (((strlen($image)) > 750) || (strlen($image)) < 1) {
        $donneeErreur = $donneeErreur . "- Image invalide, <br>";
    }
    if (isset($_POST['anonyme'])){
        $anonyme=1;
    }
    else{
        $anonyme=0;
    }        
    if ($donneeErreur != '') {
        $message = "<div class='alert alert-danger'><strong>Erreur !</strong>Votre profil n'a pas pu être créé.<br> $donneeErreur </div>";
    }
    if ($donneeErreur == '') {
        $telephone=(preg_replace('/\s/', '', $telephone));
        $requete = "insert into utilisateur (pseudonyme,nom,prenom,adresseMail,telephone,lien,description,image) values ('$nom','$adresse','$ville',$codePostal,$telephone,'$lien','$description','$image');";
        $message = "<div class='alert alert-success'><strong>Traitement effectué !</strong> Votre sponsor à bien été créé .</div>";
        $connexion->exec($requete);
    }
}
?>

<form  name="monForm" method="post" action="index.php?action=creer_sponsor" >
    <div>
        <?= $message ?>
    </div>
    <h1>Création d'un sponsor</h1>
    <label class="form_col" for="nom">Nom* : </label>
    <input name="nom" id="nom" type="text"  value='<?= $ville ?>'>
    <!--<span class="tooltip" id="tooltipnom">Doit être compris entre 1 et 70 caractères</span>-->
    <p>Adresse* : <input type="text" name="adresse" value='<?= $adresse ?>'   ></p>
    <p>Ville* : <input type="text" name="ville" value='<?= $ville ?>'  ></p>
    <p>Code Postal* : <input type="text" name="codePostal" value='<?= $codePostal ?>'   ></p>
    <p>Téléphone* : <input type="text" name="telephone" value='<?= $telephone ?>' </p>
    <p>Lien sponsor* : <input type="text" name="lien" value='<?= $lien ?>'  </p>
    <p>Description* : <input type="text" name="description" value='<?= $description ?>' ></p>
    <p>Lien image : <input type="text" name="image" value='<?= $image ?>'  </p>
    <br>
    <br>
    <div>
        <input type='submit' value='Enregistrer' OnClick="validform()" />
    </div>
    <br>
</form>
<div>
    <input type='button' value='Retour' OnClick="window.location.href='index.php?action=gestion_sponsor'" />
    <!--'index.php?action=gestion_sponsor'"-->
</div>
<!--<script src="js/sponsor/creer_sponsor.js">
</script>-->
