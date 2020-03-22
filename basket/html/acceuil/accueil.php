<?php
$requete = " SELECT idArticle,titre,dateArticle,VilleArticle,departement,descriptionArticle FROM `article` ";

// On récupère la liste des 2 derniers articles en date.
$requeteRecher = $requete . "ORDER BY `dateArticle` DESC LIMIT 2 ;";
$resultats = $connexion->query($requeteRecher);
$article = array();
$lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
foreach ($lignes as $ligne) {
    $article[] = $ligne['idArticle'];
}

// Récupèration des informations de l'article le plus récent :
$requeteArtiUn = $requete . "WHERE idArticle=" . $article[0] . ";";
$resultArtiUn = $connexion->query($requeteArtiUn);
$articleUn = $resultArtiUn->fetch();
$articleUn_date = explode(' ', $articleUn['dateArticle']);

// Récupèration des informations de l'article le second article le plus récent :
$requeteArtiDeux = $requete . "WHERE idArticle=" . $article[1] . ";";
$resultArtiDeux = $connexion->query($requeteArtiDeux);
$articleDeux = $resultArtiDeux->fetch();
$articleDeux_date = explode(' ', $articleDeux['dateArticle']);
?>

<!--Image d'acceuil-->
<div class="fond">
    <div class="cover-container d-flex h-100 p-5 flex-column">
        <div class="inner-cover text-center mt-auto mb-auto">
            <h1 class="cover-heading mb-1 titre">Basket Aytré</h1>
            <h2 class="lead text-white">Acceuil du site</h2>
        </div>
        <div class="bouton text-center">
            <button class="btn btn-outline-light pr-5 pl-5 mt-3">Nous contacter</button>
        </div>
    </div>
</div>
<div class="categ text-center text-white p-3 m-3 mt-5">
    <h1><i>Actualité</i></h1>
</div>
<div class="row m-2">
    <!--Premier article-->
    <div class="col-md-6 mt-4 ">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative bg-white">
            <div class="col p-4 d-flex flex-column position-static d-inline">
                <h3 class="mb-0"><?= $articleUn['titre'] ?></h3>
                <div class="mb-1 text-muted"><?= $articleUn_date[0] ?></div>
                <p class="card-text mb-auto"><?= substr(stripcslashes($articleUn['descriptionArticle']), 0, 300); ?>...</p>
                <a href="#" class="stretched-link text-right">Continuer à lire</a>
                <div class="col-auto d-none d-lg-block">
<!--                <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>-->
                    <img src="images/fond2.jpg" class="img-actu">
                </div>
            </div>

        </div>
    </div>
    <!--Second article-->
    <div class="col-md-6 mt-4">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative bg-white">
            <div class="col p-4 d-flex flex-column position-static">
                <h3 class="mb-0"><?= $articleDeux['titre'] ?></h3>
                <div class="mb-1 text-muted"><?= $articleDeux_date[0] ?></div>
                <p class="card-text mb-auto"><?= substr(stripcslashes($articleDeux['descriptionArticle']), 0, 300); ?>...</p>
                <a href="#" class="stretched-link text-right">Continuer à lire</a>
            </div>
            <div class="col-auto d-none d-lg-block">
                <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            </div>
        </div>
    </div>
</div>
<script src="js/accueil.js"></script>