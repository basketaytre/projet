<?php
$requete = "select idSponsor,nom,adresse,ville,codePostal,telephone,lien,description,image FROM `sponsor` ";
//Exécution de  la requête qui renvoie le résultat dans  $resultats, 
$resultats = $connexion->query($requete);
$sponsor = array();
//On récupère toutes les lignes de la table dans la variable $lignes qui est un tableau associatif
$lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
$cpt = 0;
foreach ($lignes as $ligne) {
    $sponsor[$cpt] = [$ligne['idSponsor'], $ligne['nom'], $ligne['adresse'], $ligne['ville'], $ligne['codePostal'], $ligne['telephone'], $ligne['description'], $ligne['image']];

//    Mise en forme du numéro de téléphone
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
$nbSponsor = count($sponsor);
?>
<!-------------------------------------------------------Page de de gestion sponsors---------------------------------------------------------------->
<br>
<div class="rounded text-center text-white p-3 m-3 mt-5 bg-orange" >
    <h1 style="font-size:2em;"><i>Gestion des sponsors</i></h1>
</div>
<div class="row m-0">
    <div class="col-12 text-center">
        <input type="button" value="Creer sponsor" class="bouton-design rounded" OnClick="window.location.href = 'index.php?action=inscription_utilisateur'">
    </div>
</div>
<?php
// affichage du sponsor
for ($i = 0; $i < $nbSponsor; $i++) {
    echo '<div class="row m-0 mt-4">'
    . '<div class="col-9 offset-1 p-0">'
    . '<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative bg-white ">'
    . '<div class="col-5 mb-auto mt-auto">'
    . '<div class="p-3 d-flex flex-column position-static d-inline">'
    . '<img class="img-responsive img-fluid miniature ombres " src="images/' . $sponsor[$i][7] . '">'
    . '</div>'
    . '</div>'
    . '<div class="col-7 p-3 bg-light">'
    . '<div class="row m-0 mt-3 ">'
    . '<small class="mb-0" style="font-size:2rem;">' . $sponsor[$i][1] . '</small>'
    . '</div>'
    . '<hr class="hrp bg-dark">'
    . '<div class="row m-">'
    . '<div class="col-lg-6 col-md-12 col-sm-12">'
    . '<h4 class="mb-auto text-center" style="font-size:.9em;">' . $sponsor[$i][2] . '<br></h4>'
    . '<h4 class="mb-auto text-center text-uppercase" style="font-size:.9em;">' . $sponsor[$i][3] . ' - ' . $sponsor[$i][4]
    . '</div>'
    . '<div class="col-lg-6 col-md-12 col-sm-12 mt-md-1 mt-sm-1 mt-lg-0">'
    . '<h4 class="mb-auto text-center" style="font-size:0.9em;">Tél. ' . $sponsor[$i][5] . '</h4>'
    . '</div>'
    . '</div>'
    . '<hr class="hrp bg-dark">'
    . '<div class="row m-0 mt-3">'
    . '<p class="card-text mb-auto " style="font-size:1em;">' . $sponsor[$i][6] . '</p>'
    . '</div>'
    . '</div>'
    . '</div>'
    . '</div>'
    . '<div class="col-1 mb-auto mt-auto">'
    . '<input type="button" value="Modifier" class="bouton-design rounded" OnClick="window.location.href =' . "'" . 'index.php?action=modifier_sponsor&idSponsor=' . $sponsor[$i][0] . "'" . '">'
    . '<input type="button" value="Supprimer" class="bouton-design rounded mt-2" OnClick="window.location.href =' . "'" . 'index.php?action=gestion_sponsor&idSponsor=' . $sponsor[$i][0] . "'" . '">'
    . '</div>'
    . '</div>';
}
?>
<!-------------------------------------------------------Fin de la page de gestion de sponsors---------------------------------------------------------------->
