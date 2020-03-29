<?php
$message = '';
//$idArticle=0;
//$idSponsor=0;
if (isset($_GET['idArticle']) && isset($_GET['idSponsor'])) {
    $idSponsor = $_GET['idSponsor'];
    $idArticle = $_GET['idArticle'];
    $requete = "delete from action where idSponsor='$idSponsor' and idArticle='$idArticle'";
    $connexion->exec($requete);
    $message = "<div class='alert alert-warning'><strong>Traitement effectué !</strong> Un article a été supprimé .</div>";
}
$requete = "select * from action";
//Exécution de  la requête qui renvoie le résultat dans  $resultats, 
$resultats = $connexion->query($requete);
//On récupère toutes les lignes de la table dans la variable $lignes qui est un tableau associatif
$lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
$cpt = 0;
foreach ($lignes as $ligne) {
    $actions[$cpt] = [$ligne['idArticle'], $ligne['idSponsor'], $ligne['typeDon'], $ligne['montant'], $ligne['date']];


    // Récuperer le sponsor
    $requete2 = "select idSponsor,nom from sponsor where idSponsor=" . $actions[$cpt][1];
    $resultats2 = $connexion->query($requete2);
    $listeSponsors = $resultats2->fetchALL(PDO::FETCH_ASSOC);
    foreach ($listeSponsors as $listeSponsor) {
        $sponsor[$cpt] = [$listeSponsor['idSponsor'], $listeSponsor['nom']];
    }



    // Récuperer l'article
    $requete3 = "select idArticle,titre from article where idArticle=" . $actions[$cpt][0];
    $resultats3 = $connexion->query($requete3);
    $listeArticles = $resultats3->fetchALL(PDO::FETCH_ASSOC);
    foreach ($listeArticles as $listeArticle) {
        $article[$cpt] = [$listeArticle['idArticle'], $listeArticle['titre']];
    }





    $cpt = $cpt + 1;
}
$nbActions = count($actions);
?>
<!-------------------------------------------------------Page de gestion des action---------------------------------------------------------------->
<div>
    <?= $message ?>
</div>
<div class="rounded text-center text-white p-3 m-3 mt-5 bg-orange" >
    <h1 style="font-size:2em;"><i>Gestion des actions</i></h1>
</div>
<div class="row m-0">
    <div class="col-12 text-center">
        <input type="button" value="Creer action" class="bouton-design rounded" OnClick="window.location.href = 'index.php?action=creer_action'">
    </div>
</div>
<div class="row m-2 mt-4">
    <?php
    for ($i = 0; $i < $nbActions; $i++) {
        echo
        '<div class="col-md-6">'
        . '<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative bg-white ">'
        . '<div class="col-9 p-3 bg-light">'
        . '<div class="row m-0 mt-3 ">'
        . '<div class="col-lg-12 col-md-12 col-sm-12">'
        . '<h3 class="mr-auto ml-auto text-center" style="font-size:2rem;">' . 'Action</h3>'
        . '</div>'
        . '</div>'
        . '<hr class="hrp bg-dark">'
        . '<div class="row m-">'
        . '<div class="col-lg-12 col-md-12 col-sm-12">'
        . '<h4 class="mb-auto text-center" style="font-size:.9em;">' . $actions[$i][4] . '<br></h4>' . '</div>'
        . '</div>'
        . '<hr class="hrp bg-dark">'
        . '<div class="row m-">'
        . '<div class="col-lg-12 col-md-12 col-sm-12">'
        . '<h4 class="mb-auto text-center" style="font-size:.9em;">' . $actions[$i][2] . ' - ' . $actions[$i][3] . '<br></h4>'
        . '</div>'
        . '</div>'
        . '<hr class="hrp bg-dark">'
        . '<div class="row m-0 mt-3">'
        . '<p class="card-text mb-auto " style="font-size:1em;"><ul><li> Sponsor : ' . $sponsor[$i][1] . '</li><li>' . 'Article : ' . $article[$i][1] . '</li></ul></p>'
        . '</div>'
        . '</div>'
        . '<div class="col-3 text-center my-auto p-1">'
        . '<input type="button" value="Modifier" class="bouton-design rounded " OnClick="window.location.href =' . "'" . 'index.php?action=modifier_action&idArticle=' . $actions[$i][0] . "&idSponsor=" . $actions[$i][1] ."'".'">'
        . '<input type="button" value="Supprimer" class="bouton-design rounded mt-2 "  OnClick="window.location.href =' . "'" . 'index.php?action=gestion_action&idArticle=' . $actions[$i][0] . "&idSponsor=" . $actions[$i][1] ."'".'">'
        . '</div>'
        . '</div>'
        . '</div>';
    }
    ?>
</div>

<!-------------------------------------------------------Fin de la page de gestion des action---------------------------------------------------------------->
