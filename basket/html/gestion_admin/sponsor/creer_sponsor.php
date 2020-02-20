<?php
$nom = '';
$adresse = '';
$ville = '';
$codePostal = '';
$telephone = '';
$lien = '';
$description = '';
$image = '';

if (isset($_POST['nom'])) {
    $nom = $_POST["nom"];
    $adresse = $_POST["adresse"];
    $ville = $_POST["ville"];
    $codePostal = intval($_POST["codePostal"]);
    $telephone = intval($_POST["telephone"]);
    $lien = ($_POST["lien"]);
    $description = ($_POST["description"]);
    $image = $_POST["image"];
    
    $requete = "insert into sponsor (nom,adresse,ville,codePostal,telephone,lien,description,image) values ('$nom','$adresse','$ville',$codePostal,$telephone,'$lien','$description','$image');";
    echo $requete;
    $connexion->exec($requete);
    $message = 'Traitement effectué';
} else {
    $message = "Erreur";
}
?>
<form  name="monForm" method="post" action="index.php?action=creer_sponsor" >
    <h1>Création d'un sponsor</h1>
    <p>Nom* : <input type="text" name="nom" ></p>
    <p>Adresse* : <input type="text" name="adresse"  ></p>
    <p>Ville* : <input type="text" name="ville" ></p>
    <p>Code Postal* : <input type="text" name="codePostal"  ></p>
    <p>Téléphone* : <input type="text" name="telephone" </p>
    <p>Lien sponsor* : <input type="text" name="lien" </p>
    <p>Description* : <input type="text" name="description"></p>
    <p>Lien image : <input type="text" name="image" </p>
    <div>
        <input type='submit' value='Enregistrer' />
    </div>
    <strong><?= $message ?></strong>
    <br>
</form>