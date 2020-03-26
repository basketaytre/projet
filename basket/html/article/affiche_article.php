
<?php
$requete = "select idArticle,titre,dateArticle,villeArticle,departement,descriptionArticle,resumeArticle,imageArticle from article";
//Exécution de  la requête qui renvoie le résultat dans  $resultats, 
$resultats = $connexion->query($requete);
//On récupère toutes les lignes de la table dans la variable $lignes qui est un tableau associatif
$lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
$cpt = 0;
foreach ($lignes as $ligne) {
    $article[$cpt] = [$ligne['idArticle'], $ligne['titre'], $ligne['dateArticle'], $ligne['villeArticle'], $ligne['departement'], $ligne['descriptionArticle'], $ligne['resumeArticle'], $ligne['imageArticle']];
    $cpt = $cpt + 1;
}
$nbArticle = count($article);

?>
<div class="mr-5 ml-5">
    <div class="my-3 p-3 rounded box-shadow mr-5 ml-5" style="background-color: #ededed;">
      
    <div class="rounded text-center text-white p-3 m-3 mt-2 bg-dark">
    <h1><i>Actualité du club</i></h1>
</div>
<br>
<?php
for ($i = $nbArticle-1; $i >= 0; $i--) {
    echo '<div class="row m-0">'
    .'<hr class="hrp bg-dark">'
    .'<div class="row m-0 mt-4">'
        . '<div class="col-12 p-0">'
            . '<div class=" ml-5 mr-5  border no-gutters rounded overflow-hidden shadow-sm flex-md-row mb-4  h-md-250 position-relative bg-white ">'
                . '<div class="row m-3 ">'
                    . '<div class="col-8 p-3 text-center mt-auto mb-auto border shadow-sm ">'
                        . '<div class="row m-0 mt-0 mb-3 ">'
                            . '<div class="col-lg-12 col-md-12 col-sm-12">'
                                . '<h2 class="mb-0 " style="font-size:2rem; ">' . $article[$i][1] . '</h2>'
                            . '</div>'
                        . '</div>'
                        . '<div class="row m-1">'
                            . '<div class="col-lg-12 col-md-12 col-sm-12">'
                                . '<h4 class="mb-auto text-uppercase" style="font-size:.9em;">' . $article[$i][2]
                                . '<h4 class="mb-auto mt-2" style="font-size:.9em;">' . $article[$i][4]. ' - '. $article[$i][3]  . '<br></h4>'
                            . '</div>'
                        . '</div>'
                        . '<input type="button" value="Lire plus" class="bouton-design rounded mt-3 " OnClick="window.location.href =' . "'" . 'index.php?action=regarder_article&idArticle=' . $article[$i][0] . "'". '">'

                    . '</div>'
                    . '<div class="col-4 mb-auto mt-auto">'
                        . '<div class="p-3 d-flex flex-column position-static d-inline">'
                            . '<img class="img-responsive img-fluid miniature ombres " src="images/' . $article[$i][7] . '">'
                        . '</div>'
                    . '</div>'  
                . '</div>'  
                . '<div class="row ml-0 mt-2 p-4 bg-grey  border shadow-sm">'
                    . '<div class="col-lg-12 col-md-12 col-sm-12>'
                        . '<p class="card-text mb-auto p-5 " style="font-size:1em;";>' . $article[$i][6] . '... </p>'
                    . '</div>'
                . '</div>'
            . '</div>'
        . '</div>'
    . '</div>'
    . '</div>';
}
?>
    </div>
</div>