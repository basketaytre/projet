<?php   
$requete = "select idSponsor,nom,adresse,ville,codePostal,description,image FROM `sponsor` ";
//Exécution de  la requête qui renvoie le résultat dans  $resultats, 
$resultats = $connexion->query($requete);
$sponsor = array();
//On récupère toutes les lignes de la table dans la variable $lignes qui est un tableau associatif
$lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
foreach ($lignes as $ligne) {
    $sponsor[] = [$ligne['idSponsor'], $ligne['nom'], $ligne['adresse'], $ligne['ville'], $ligne['codePostal'], $ligne['description'], $ligne['image']];
}
$nbSponsor = count($sponsor);
?>
<!-------------------------------------------------------Page d'affichage des sponsors---------------------------------------------------------------->
<br><br>
<div class="rounded text-center text-white p-3 m-3 mt-5 bg-dark">
    <h1><i>Partenaires</i></h1>
    <h4>de l'équipe</h4>
</div>
<?php
for ($i = 1; $i <= $nbSponsor; $i++) {
    if ($i % 2 != 0 ) {
        echo '<div class="row mr-0 ml-0">';
    }
    echo '<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 mt-5 flex-md-row ">'
    . '<div class="hovereffect ml-auto mr-auto ">'
    . '<img class="img-responsive img-fluid" src="images/' . $sponsor[$i - 1][6] . '" alt="">'
    . '<div class="overlay">'
    . '<h2>' . $sponsor[$i - 1][1] . '</h2>'
    . "<a class='info' href='index.php?action=regarder_sponsor&idSponsor=" . $sponsor[$i - 1][0] . "'" . ">Plus d'informations</a>"
    . '</div>'
    . '</div>'
    . '</div>';
    if ($i % 2 == 0 or $i == $nbSponsor) {
        echo '</div>';
    }
}
?>
<!-------------------------------------------------------Fin de la page d'affichage des sponsors---------------------------------------------------------------->
<!--test-->