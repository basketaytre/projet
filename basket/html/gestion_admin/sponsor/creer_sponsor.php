<?php
$nom = '';
$adresse = '';
$ville = '';
$codePostal = '';
$telephone = '';
$lien = '';
$description = '';
$image = '';
$message = '';
$donneeErreur = '';
$valide = false;

if (isset($_POST['nom'])) {
    $nom = $_POST["nom"];
    $adresse = $_POST["adresse"];
    $ville = $_POST["ville"];
    $codePostal = intval($_POST["codePostal"]);
    $telephone = intval($_POST["telephone"]);
    $lien = ($_POST["lien"]);
    $description = ($_POST["description"]);
    $image = $_POST["image"];

    if ((strlen($codePostal)) != 5) {
        $donneeErreur = $donneeErreur . "- Code postal invalide,<br>";
        $valide = false;
    }
    if (((strlen($telephone)) > 15) || (strlen($telephone)) < 10) {
        $donneeErreur = $donneeErreur . "- Numero de téléphone invalide, <br>";
    }
    if (((strlen($nom)) > 70) || (strlen($nom)) < 1) {
        $donneeErreur = $donneeErreur . "- Nom invalide, <br>";
    }
    if (((strlen($adresse)) > 50) || (strlen($adresse)) < 1) {
        $donneeErreur = $donneeErreur . "- Adresse invalide, <br>";
    }
    if (((strlen($ville)) > 50) || (strlen($ville)) < 1) {
        $donneeErreur = $donneeErreur . "- Ville invalide, <br>";
    }
    if (((strlen($lien)) > 70) || (strlen($lien)) < 1) {
        $donneeErreur = $donneeErreur . "- Lien sponsor invalide, <br>";
    }
    if (((strlen($description)) > 750) || (strlen($description)) < 1) {
        $donneeErreur = $donneeErreur . "- Description invalide, <br>";
    }
    if (((strlen($image)) > 750) || (strlen($image)) < 1) {
        $donneeErreur = $donneeErreur . "- Image invalide, <br>";
    }
    if ($donneeErreur != '') {
        $message = "<div class='alert alert-danger'><strong>Erreur !</strong> Le sponsor n'a pas pu être créé .<br> $donneeErreur </div>";
    }
    if ($donneeErreur == '') {
        $requete = "insert into sponsor (nom,adresse,ville,codePostal,telephone,lien,description,image) values ('$nom','$adresse','$ville',$codePostal,$telephone,'$lien','$description','$image');";
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
    <label class="form_col" for="nom">Nom* : </label><input type="text" name="nom" value='<?= $nom ?>'><span class="tooltip" id="controlNom">Doit être compris entre 1 et 70 caractères</span>
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
        <input type='submit' value='Enregistrer' />
    </div>
    <br>
</form>
<div>
    <input type='button' value='Retour' OnClick="test()"/>
    <!--'index.php?action=gestion_sponsor'"-->
</div>
<script src="../../../js/sponsor/creer_sponsor.js"></script>