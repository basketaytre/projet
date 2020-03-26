<?php
$idArticle = '';
$dateArticle = '';
$titre = '';
$descriptionArticle = '';
$imageArticle = '';
$villeArticle = '';
$departement = '';
$message = '';
$donneeErreur = '';
$valide = '';

if (isset($_GET['idArticle'])) {
    $idArticle = $_GET['idArticle'];
    $requete = "select * from article where idArticle='$idArticle'";
    $resultats = $connexion->query($requete);
    $lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
    $ligne = $lignes[0];
    $dateArticle = $ligne['dateArticle'];
    $titre = $ligne['titre'];
    $descriptionArticle = $ligne['descriptionArticle'];
    $imageArticle = $ligne['imageArticle'];
    $villeArticle = $ligne['villeArticle'];
    $departement = $ligne['departement'];
}
if (isset($_GET['valide'])) {
    $idArticle = $_POST['idArticle'];
    $dateArticle = $_POST['dateArticle'];
    if (isset($_POST["titre"])) {
        $titre = $_POST["titre"];
    }
    if (isset($_POST["descriptionArticle"])) {
        $descriptionArticle = $_POST["descriptionArticle"];
    }
    if (isset($_POST["imageArticle"])) {
        $imageArticle = $_POST["imageArticle"];
    }
    if (isset($_POST["villeArticle"])) {
        $villeArticle = $_POST["villeArticle"];
    }
    if (isset($_POST["departement"])) {
        $departement = $_POST["departement"];
        $departement = preg_replace('/\s/', '', $departement);
    }
    if ((strlen(preg_replace('/\s/', '', $departement))) != 2) {
        $donneeErreur = $donneeErreur . "- Departement invalide<br>";
    }
}
?>
<div class="ml-5 mr-5 mt-5 border rounded shadow-sm  mb-4 bg-white ">

    <div class="row m-0 mt-3 ">
        <div class='col-12'>
            <h1 class="mr-auto ml-auto text-center p-4 cover-heading" style="font-family: 'Baloo Thambi 2', cursive; color:#fe882a;"><strong><?= $titre ?></strong></h1>
        </div>
    </div>
    <div class="row m-0 mt-0 ">
        <hr class="hrp" style="background-color: dark;">
        <div class='col-12'>
            <p class="text-center m-0"><?= $dateArticle ?></p>
        </div>
        <hr class="hrp" style="background-color: dark;">
    </div>
    <div class="row m-0 mt-1 ">
        <img class="img-fluid img-responsive mr-auto ml-auto" src="images/<?= $imageArticle ?>">
    </div>
    <div class="row m-0 mt-1 ">
        <div class='col-12 p-5'>
            <?= $descriptionArticle?>
        </div>
    </div>
</div>



<script src="./js/article/modifier_article.js">

</script>
