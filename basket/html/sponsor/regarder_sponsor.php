<?php
$idSponsor = $_GET['idSponsor'];

// Récupération des données sur le sponsor
$requete = "select idSponsor, nom, adresse, ville, codePostal, telephone, lien, description, image from sponsor where idSponsor=$idSponsor";
$resultats = $connexion->query($requete);
$lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
$cpt = 0;
foreach ($lignes as $ligne) {
    $sponsor[$cpt] = [$ligne['idSponsor'], $ligne['nom'], $ligne['adresse'], $ligne['ville'], $ligne['codePostal'], $ligne['telephone'], $ligne['lien'], $ligne['description'], $ligne['image']];
    //  Mise en forme du numéro de téléphone
    $telephone = '';
    for ($i = 0; $i < 10; $i += 2) {
        $telephone = $telephone . substr($sponsor[$cpt][5], $i, 2);
        if ($i < 8) {
            $telephone = $telephone . ".";
        }
    }
    $sponsor[$cpt][5] = $telephone;
    $cpt = $cpt + 1;
}

// Récupération des données sur l'action en rapport avec le sponsor
$requete = "select idArticle,idSponsor,typeDon,montant,date from action where idSponsor=$idSponsor;";
$resultats = $connexion->query($requete);
$lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
$cpt = 0;
foreach ($lignes as $ligne) {
    $actions[$cpt] = [$ligne['idArticle'], $ligne['idSponsor'], $ligne['typeDon'], $ligne['montant'], $ligne['date']];
    $cpt = $cpt + 1;
}
$nbActions=count($actions);
?>
<div class="ml-5 mr-5 mt-5 border rounded shadow-sm  mb-4 bg-white ">

    <div class="row m-0 mt-5 mb-4 ">
        <div class='col-12'>
            <h1 class="mr-auto ml-auto text-center p-4 cover-heading" style="font-family: 'Baloo Thambi 2', cursive; color:#fe882a;"><strong><?= $sponsor[0][1] ?></strong></h1>
        </div>
    </div>
    <div class="row m-0 mt-5">
        <div class="col-lg-6">
            <div class="row m-0">
                <div class="col-10 offset-1">
                    <img class="img-fluid img-responsive" src="images/<?= $sponsor[0][8] ?>">
                    <p class="mt-5 mb-1"><?= $sponsor[0][2] ?></p>
                    <p class=" text-uppercase"><?= $sponsor[0][3] ?> - <?= $sponsor[0][4] ?></p>
                    <p class="mt-4 mb-4">Tél. <?= $sponsor[0][5] ?></p>
                    <a class="mt-5" href="<?= $sponsor[0][6] ?>"></a>
                </div>
            </div>

        </div>
        <div class="col-lg-6 mt-md-4 mt-sm-4">
            <div class="row m-0">
                <div class="col-10 offset-1">
                    <p class="mb-5">...</p>
                    <h4 class="mt-5">Actions réalisées pour le club </h4>
                    <p><ul>
                        <?php
                        for ($i = 0; $i < $nbActions; $i++) {
                        echo '<li>'
                        . $actions[$i][2] . ' : ' . $actions[$i][3] . ' - ' . '<input type="button" value="En savoir plus" class="bouton-design rounded mt-3 " OnClick="window.location.href ='. "'" . 'index.php?action=regarder_article&idArticle=' . $actions[$i][0] . "'" . '">'
                        . '</li>';
                        }
                        ?>
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
            <img class="img-fluid img-responsive mr-auto ml-auto" src="images/...">
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
