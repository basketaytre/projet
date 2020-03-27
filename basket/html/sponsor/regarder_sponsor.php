<?php
$idSponsor = '';
$nom = '';
$adresse = '';
$ville = '';
$codePostal = 0;
$telephone = '';
$lien = '';
$description = '';
$image = '';
$message = '';
$succes = '';
$donneeErreur = '';
$valide = '';
$idSponsor = $_GET['idSponsor'];
    $requete = "select idArticle,typeDon,montant,date from action where idSponsor='$idSponsor'";
    $resultats = $connexion->query($requete);
    $lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
    $ligne = $lignes[0];
    $idArticle = $ligne['idArticle'];
    $typeDon = $ligne['typeDon'];
    $montant = $ligne['montant'];
    $date = $ligne['date'];

if (isset($_GET['idSponsor'])) {
    $idSponsor = $_GET['idSponsor'];
    $requete = "select idSponsor, nom, adresse, ville, codePostal, telephone, lien, description, image from sponsor where idSponsor='$idSponsor'";
    $resultats = $connexion->query($requete);
    $lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
    $ligne = $lignes[0];
    $nom = $ligne['nom'];
    $adresse = $ligne['adresse'];
    $ville = $ligne['ville'];
    $codePostal = $ligne['codePostal'];
    $telephone = $ligne['telephone'];
    $lien = $ligne['lien'];
    $description = $ligne['description'];
    $image = $ligne['image'];
}
if (isset($_GET['valide'])) {
    $idSponsor = $_POST['idSponsor'];
    if (isset($_POST["nom"])) {
        $nom = $_POST["nom"];
    }
    if (isset($_POST["adresse"])) {
        $adresse = $_POST["adresse"];
    }
    if (isset($_POST["ville"])) {
        $ville = $_POST["ville"];
    }
    if (isset($_POST["codePostal"])) {
        $codePostal = $_POST["codePostal"];
    }
    if (isset($_POST["telephone"])) {
        $telephone = $_POST["telephone"];
    }
    if (isset($_POST["lien"])) {
        $lien = $_POST["lien"];
    }
    if (isset($_POST["description"])) {
        $description = $_POST["description"];
    }
    if (isset($_POST["image"])) {
        $image = $_POST["image"];
    }
}
?>
<div class="ml-5 mr-5 mt-5 border rounded shadow-sm  mb-4 bg-white ">

    <div class="row m-0 mt-5 mb-4 ">
        <div class='col-12'>
            <h1 class="mr-auto ml-auto text-center p-4 cover-heading" style="font-family: 'Baloo Thambi 2', cursive; color:#fe882a;"><strong><?= $nom ?></strong></h1>
        </div>
    </div>
    <div class="row m-0 mt-5">
        <div class="col-lg-6">
            <div class="row m-0">
                <div class="col-10 offset-1">
                    <img class="img-fluid img-responsive" src="images/<?= $image ?>">
                    <p class="mt-5 mb-1"><?= $adresse ?></p>
                    <p class=" text-uppercase"><?= $codePostal ?> -  <?= $ville ?> </p>
                    <p class="mt-4 mb-4">Tél. <?= $telephone ?></p>
                    <a class="mt-5" href="<?= $lien ?>"> <?= $lien ?></a>
                </div>
            </div>

        </div>
        <div class="col-lg-6 mt-md-4 mt-sm-4">
            <div class="row m-0">
                <div class="col-10 offset-1">
                    <p class="mb-5"><?= $description ?></p>
                    <h4 class="mt-5">Actions réalisées pour le club </h4>
                    <p><ul><li><?= $typeDon ?> : <?= $montant ?>  - <input type="button" value="En savoir plus" class="bouton-design rounded mt-3 " OnClick="window.location.href ='index.php?action=regarder_article&idArticle=<?= $idArticle?>'"></li></ul>
                    
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row m-0 mt-0 ">
        <hr class="hrp" style="background-color: dark;">
        <div class='col-12'>
            <p class="text-center m-0"> ... </p>
        </div>
        <hr class="hrp" style="background-color: dark;">
    </div>
    <div class="row m-0 mt-5 ">
        <div class="col-6 offset-3">
            <img class="img-fluid img-responsive mr-auto ml-auto" src="images/<?= $image ?>">
        </div>
    </div>
    <div class="row m-0 mt-1">
        <div class='col-12 p-5'>
            ...
        </div>
    </div>
</div>



<script src="./js/article/modifier_article.js">

</script>
