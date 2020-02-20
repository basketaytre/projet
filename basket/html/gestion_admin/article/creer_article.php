<?php
$article = '';
$dateArticle = '';
$titre = '';
$descriptionArticle = '';
$imageArticle = '';
$villeArticle = '';
$departement = '';
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
        $donneeErreur = $donneeErreur . "Code postal invalide,<br>";
        $valide = false;
    }
    if (((strlen($telephone)) > 15) || (strlen($telephone)) < 10) {
        $donneeErreur = $donneeErreur . "Numero de téléphone invalide, <br>";
    }
    if (((strlen($nom)) > 70) || (strlen($nom)) < 1) {
        $donneeErreur = $donneeErreur . "Nom invalide, <br>";
    }
    if (((strlen($adresse)) > 50) || (strlen($adresse)) < 1) {
        $donneeErreur = $donneeErreur . "Adresse invalide, <br>";
    }
    if (((strlen($ville)) > 50) || (strlen($ville)) < 1) {
        $donneeErreur = $donneeErreur . "Ville invalide, <br>";
    }
    if (((strlen($lien)) > 70) || (strlen($lien)) < 1) {
        $donneeErreur = $donneeErreur . "Lien sponsor invalide, <br>";
    }
    if (((strlen($description)) > 750) || (strlen($lien)) < 1) {
        $donneeErreur = $donneeErreur . "Description invalide, <br>";
    }
    if (((strlen($image)) > 750) || (strlen($image)) < 1) {
        $donneeErreur = $donneeErreur . "Image invalide, <br>";
    } else {
        $requete = "insert into sponsor (nom,adresse,ville,codePostal,telephone,lien,description,image) values ('$nom','$adresse','$ville',$codePostal,$telephone,'$lien','$description','$image');";
        echo $requete;
        $connexion->exec($requete);
        $message = 'Traitement effectué';
    }
    if ($donneeErreur != '') {
        $message = "Erreur,<br>" . $donneeErreur;
    }
}
?>
<form  name="monForm" method="post" action="index.php?action=creer_sponsor" >
    <h1>Page de création d'article</h1>
    <p>Titre* : <input type="text" name="nom" value='<?= $nom ?>'  ></p>
    <p>Ville* : <input type="text" name="nom" value='<?= $nom ?>'  ></p>
    <p>Departement : <input type="text" name="nom" value='<?= $nom ?>'  ></p>
    <p>Description* : <input type="text" name="nom" value='<?= $nom ?>'  ><p/>
    <br>
    <br>
    <strong><?= $message ?></strong>
    <div>
        <input type='submit' value='Enregistrer' />
    </div>
    <br>
</form>
