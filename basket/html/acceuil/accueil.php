<?php
$requete = " SELECT idArticle,titre,dateArticle,villeArticle,departement,descriptionArticle,resumeArticle FROM `article` ";
// On récupère la liste des 2 derniers articles en date.
$requeteRecher = $requete . "ORDER BY `dateArticle` DESC LIMIT 2 ;";
$resultats = $connexion->query($requeteRecher);
$article = array();

$lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
$cpt = 0;
foreach ($lignes as $ligne) {
    $article[$cpt] = [$ligne['idArticle'], $ligne['titre'], $ligne['dateArticle'], $ligne['villeArticle'], $ligne['departement'], $ligne['descriptionArticle'], $ligne['resumeArticle']];
    $cpt = $cpt + 1;
}
$articleUn_date = explode(' ', $article[0][2]);
$articleDeux_date = explode(' ', $article[1][2]);
?>
<!-------------------------------------------------------Page de l'accueil---------------------------------------------------------------->
<!--Image d'acceuil-->
<div class="fond p-5">
    <div class="cover-container d-flex p-5 flex-column">
        <div class="inner-cover text-center mt-5 mb-auto">
            <h1 class="cover-heading mb-1 titre">Basket Aytré</h1>
            <h2 class="lead text-white">Accueil du site</h2>
        </div>
        <div class="bouton text-center mt-4 mb-5">
            <input type="button" value="Nous contacter" class="btn btn-outline-light pr-5 pl-5 mt-3" OnClick="window.location.href = 'index.php?action=en_travaux'">
        </div>
    </div>
</div>
<div class="rounded text-center text-white p-3 m-3 mt-5 bg-dark">
    <h1><i>Actualité</i></h1>
</div>
<div class="row m-2">
    <!--Premier article-->
    <div class="col-md-6 mt-4 ">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative bg-white">
            <div class="col p-4 d-flex flex-column position-static d-inline">
                <h3 class="mb-0"><?= $article[0][1] ?></h3>
                <div class="mb-1 text-muted"><?= $articleUn_date[0] ?></div>
                <p class="card-text mb-auto"><?= $article[0][6] ?> ...</p>
                <input type="button" value="Continuer à lire" class="bouton-design rounded ml-auto mr-4 " OnClick="window.location.href = 'index.php?action=regarder_article&idArticle=<?= $article[0][0] ?>'" style='width: 150px;'>
            </div>
        </div>
    </div>
    <!--Second article-->
    <div class="col-md-6 mt-4">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative bg-white">
            <div class="col p-4 d-flex flex-column position-static d-inline">
                <h3 class="mb-0"><?= $article[1][1] ?></h3>
                <div class="mb-1 text-muted"><?= $articleDeux_date[0] ?></div>
                <p class="card-text mb-auto"><?= $article[1][6]; ?> ...</p>
                <input type="button" value="Continuer à lire" class="bouton-design rounded ml-auto mr-4 " OnClick="window.location.href = 'index.php?action=regarder_article&idArticle=<?= $article[1][0] ?>'" style='width: 150px;'>
            </div>
        </div>
    </div>
</div>

<script src="js/accueil.js"></script>
<!-------------------------------------------------------Fin de la page d'accueil---------------------------------------------------------------->
