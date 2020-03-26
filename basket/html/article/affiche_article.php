
<?php
$requete = "select * from article";
//Exécution de  la requête qui renvoie le résultat dans  $resultats, 
$resultats = $connexion->query($requete);
//On récupère toutes les lignes de la table dans la variable $lignes qui est un tableau associatif
$lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
foreach ($lignes as $ligne) {
    //on affiche la ligne qu'on vient de lire
//        echo "<p>". " " . $ligne['titre'] . " " . $ligne['dateArticle'] . " " . $ligne['villeArticle'] . " " . $ligne['departement'] . " " . $ligne['descriptionArticle'] . " " . "<img src=images/". $ligne['imageArticle'] . "> "."</p>";
    $article[] = [$ligne['titre'], $ligne['dateArticle'], $ligne['villeArticle'], $ligne['departement'], $ligne['descriptionArticle'], $ligne['imageArticle']];
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
for ($i = 0; $i < $nbArticle; $i++) {
    echo '<div class="row m-0">'
    .'<hr class="hrp bg-dark">'
    .'<div class="row m-0 mt-4">'
        . '<div class="col-12 p-0">'
            . '<div class="row ml-5 mr-5  border no-gutters rounded overflow-hidden shadow-sm flex-md-row mb-4  h-md-250 position-relative bg-white ">'
                . '<div class="col-8 p-3 text-center mt-auto mb-auto border shadow-sm ">'
                    . '<div class="row m-0 mt-0 mb-3 ">'
                        . '<div class="col-lg-12 col-md-12 col-sm-12">'
                            . '<h2 class="mb-0 " style="font-size:2rem;">' . $article[$i][0] . '</h2>'
                        . '</div>'
                    . '</div>'
                    . '<div class="row m-1">'
                        . '<div class="col-lg-12 col-md-12 col-sm-12">'
                            . '<h4 class="mb-auto text-uppercase" style="font-size:.9em;">' . $article[$i][1]
                            . '<h4 class="mb-auto" style="font-size:.9em;">' . $article[$i][3]. ' - '. $article[$i][2]  . '<br></h4>'
                        . '</div>'
                    . '</div>'
                . '</div>'
                . '<div class="col-4 mb-auto mt-auto">'
                    . '<div class="p-3 d-flex flex-column position-static d-inline">'
                        . '<img class="img-responsive img-fluid miniature ombres " src="images/' . $article[$i][5] . '">'
                    . '</div>'
                . '</div>'  
                . '<div class="row m-0 mt-3 p-4 bg-grey  border shadow-sm">'
                    . '<p class="card-text mb-auto p-5 " style="font-size:1em;">' . substr(stripcslashes($article[$i][4]), 0, 500) . '... </p>'
                . '</div>'
            . '</div>'
        . '</div>'
    . '</div>'
    . '</div>';
}
?>
    </div>
</div>