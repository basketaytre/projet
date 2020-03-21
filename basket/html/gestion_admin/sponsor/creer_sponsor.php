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

if (isset($_POST['nom'])) {
    $nom = $_POST["nom"];
    $adresse = $_POST["adresse"];
    $ville = $_POST["ville"];
    $codePostal = $_POST["codePostal"];
    $telephone = $_POST["telephone"];
    $lien = ($_POST["lien"]);
    $description = ($_POST["description"]);
    $image = $_POST["image"];

    if ((strlen($codePostal)) != 5) {
        $donneeErreur = $donneeErreur . "- Code postal invalide,<br>";
    }
    if (strlen(preg_replace('/\s/', '', $telephone)) != 10){
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
        $telephone=(preg_replace('/\s/', '', $telephone));
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
    <br>
    <br>
    <label class="form_col" for="nom">Nom* : </label>
    <input name="nom" id="nom" type="text" value='<?= $nom ?>' onblur="VerifNom()">
    <span class="tooltip" id="tooltipnom">Doit être compris entre 1 et 70 caractères</span>
    <br>
    <br>
    <label class="form_col" for="adresse">Adresse* :</label>
    <input type="text" id="adresse" name="adresse" value='<?= $adresse ?>' onblur="VerifAdresse()">
    <span class="tooltip" id="tooltipadresse">Doit être compris entre 1 et 50 caractères</span>
    <br>
    <br>
    <label class="form_col" for="ville">Ville* :</label> 
    <input type="text" id="ville" name="ville" value='<?= $ville ?>' onblur="VerifVille()">
    <span class="tooltip" id="tooltipville">Doit être compris entre 1 et 50 caractères</span>
    <br>
    <br>
    <label class="form_col" for="codePostal">Code Postal* :</label>
    <input type="text" id="codepostal" name="codePostal" value='<?= $codePostal ?>' onblur="VerifCodePostal()">
    <span class="tooltip" id="tooltipcodepostal">Doit faire 5 caractéres</span>
    <br>
    <br>
    <label class="form_col" for="telephone">Téléphone* :</label> 
    <input type="text" id="telephone" name="telephone" value='<?= $telephone ?>' onblur="VerifTelephone()">
    <span class="tooltip" id="tooltiptelephone">Doit faire 10 caractéres</span>
    <br>
    <br>
    <label class="form_col" for="lien">Lien sponsor* :</label> 
    <input type="text" id="lien" name="lien" value='<?= $lien ?>' onblur="VerifLienSponsors()">
    <span class="tooltip" id="tooltiplien">Doit être compris entre 1 et 70 caractères</span>
    <br>
    <br>
    <label class="form_col" for="description">Description* :</label>
    <input type="text" id="description" name="description" value='<?= $description ?>' onblur="VerifDescription()">
    <span class="tooltip" id="tooltipdescription">Doit être compris entre 1 et 750 caractères</span>
    <br>
    <br>
    <label class="form_col" for="lienimage">Lien image* :</label>
    <input type="text" id="image" name="image" value='<?= $image ?>' onblur="VerifImage()">
    <span class="tooltip" id="tooltipimage">Doit être compris entre 1 et 750 caractères</span>
    <br>
    <br>
    <div>
        <span class="form_col"></span>
        <input type='submit' value='Enregistrer' onclick="return ValidFormCreerSponsors()"/>
        <input type='reset' value="Réinitialiser le formulaire" />
        <input type='button' value='Retour' OnClick="window.location.href='index.php?action=gestion_sponsor'" />
    </div>
    <br>
</form>
<script src="./js/sponsor/creer_sponsor.js">
    
</script>
