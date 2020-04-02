<?php
$idArticle = '';
$dateArticle = '';
$titre = '';
$descriptionArticle = '';
$imageArticle = '';
$villeArticle = '';
$departement = '';
$actions = [];
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

    // Récupération des données sur l'action en rapport avec l'article
    $requete = "select idArticle,idSponsor,typeDon,montant,date from action where idArticle=$idArticle;";
    $resultats = $connexion->query($requete);
    $lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
    $cpt = 0;
    foreach ($lignes as $ligne) {
        $actions[$cpt] = [$ligne['idArticle'], $ligne['idSponsor'], $ligne['typeDon'], $ligne['montant'], $ligne['date']];
        $cpt = $cpt + 1;
    }
    if (count($actions) != 0) {
        $nbActions = count($actions);
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
            <?= $descriptionArticle ?>
        </div>
    </div>
    <div class="row m-0 mt-1 text-center ">
        <div class="col-12">
            <hr class="hrp" style="background-color: dark;">
            <p><ul>
                <?php
                if (count($actions) != 0) {
                    for ($i = 0; $i < $nbActions; $i++) {
                        echo '<li>'
                        . $actions[$i][2] . ' : ' . $actions[$i][3] . ' - ' . '<input type="button" value="En savoir plus" class="bouton-design rounded mt-3 " OnClick="window.location.href =' . "'" . 'index.php?action=regarder_sponsor&idSponsor=' . $actions[$i][1] . "'" . '">'
                        . '</li>';
                    }
                }
                ?>
            </ul>
            </p>
        </div>
    </div>
</div>



<script src="./js/article/modifier_article.js">

</script>
