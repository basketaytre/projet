<?php
$requete = "select idArticle,titre,dateArticle,villeArticle,departement,descriptionArticle,imageArticle FROM `article` ";
//Exécution de  la requête qui renvoie le résultat dans  $resultats, 
$resultats = $connexion->query($requete);
$article = array();
//On récupère toutes les lignes de la table dans la variable $lignes qui est un tableau associatif
$lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
$cpt = 0;
foreach ($lignes as $ligne) {
    $article[$cpt] = [$ligne['idArticle'], $ligne['titre'], $ligne['dateArticle'], $ligne['villeArticle'], $ligne['departement'], $ligne['descriptionArticle'], $ligne['imageArticle']];
    $cpt=$cpt+1;
}
$nbArticle = count($article);
if (isset($_GET['idArticle'])) {
    $idArticle = $_GET['idArticle'];
    $requete = "delete from article where idArticle=$idArticle";
    $message = "<div class='alert alert-warning'><strong>Traitement effectué !</strong> Un article a été supprimé .</div>";
    $connexion->exec($requete);
}
?>
<br>
<div class="rounded text-center text-white p-3 m-3 mt-5 bg-orange" >
    <h1 style="font-size:2em;"><i>Gestion des articles</i></h1>
</div>
<div class="row m-0">
    <div class="col-12 text-center">
        <input type="button" value="Creer article" class="bouton-design rounded" OnClick="window.location.href = 'index.php?action=creer_article'">
    </div>
</div>
<?php
for ($i = 0; $i < $nbArticle; $i++) {
    echo '<div class="row m-0 mt-4">'
    . '<div class="col-9 offset-1 p-0">'
    . '<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative bg-white ">'
    . '<div class="col-5 mb-auto mt-auto">'
    . '<div class="p-3 d-flex flex-column position-static d-inline">'
    . '<img class="img-responsive img-fluid miniature ombres " src="images/' . $article[$i-1][6] . '">'
    . '</div>'
    . '</div>'
    . '<div class="col-7 p-3 bg-light">'
    . '<div class="row m-0 mt-3 ">'
    . '<small class="mb-0" style="font-size:2rem;">' . $article[$i-1][1] . '</small>'
    . '</div>'
    . '<hr class="hrp bg-dark">'
    . '<div class="row m-">'
    . '<div class="col-lg-12 col-md-12 col-sm-12">'
    . '<h4 class="mb-auto text-center" style="font-size:.9em;">' . $article[$i][2] . '<br></h4>'
    . '<h4 class="mb-auto text-center text-uppercase" style="font-size:.9em;">' . $article[$i][3] . ' - ' . $article[$i][4]
    . '</div>'
    . '</div>'
    . '<hr class="hrp bg-dark">'
    . '<div class="row m-0 mt-3">'
    . '<p class="card-text mb-auto " style="font-size:1em;">' . $article[$i][5] . '</p>'
    . '</div>'
    . '</div>'
    . '</div>'
    . '</div>'
    . '<div class="col-1 mb-auto mt-auto">'
    . '<input type="button" value="Modifier" class="bouton-design rounded" OnClick="window.location.href =' . "'" . 'index.php?action=modifier_article&idArticle=' . $article[$i][0] . "'" . '">'
    . '<input type="button" value="Supprimer" class="bouton-design rounded mt-2" OnClick="window.location.href =' . "'" . 'index.php?action=gestion_article&idArticle=' . $article[$i][0] . "'" . '">'
    . '</div>'
    . '</div>';
}
?>