<?php
$message = '';
if (isset($_GET['idUtilisateur'])) {
    $idUtilisateur = $_GET['idUtilisateur'];
    $requete = "delete from utilisateur where idUtilisateur='$idUtilisateur'";
    $message = "<div class='alert alert-warning'><strong>Traitement effectué !</strong> Un utilisateur a été supprimé .</div>";
    $connexion->exec($requete);
}
$requete = "select statut,pseudonyme,nom,prenom,adresseMail,anonyme from utilisateur";
//Exécution de  la requête qui renvoie le résultat dans  $resultats, 
$resultats = $connexion->query($requete);
//On récupère toutes les lignes de la table dans la variable $lignes qui est un tableau associatif
$lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
$cpt = 0;
foreach ($lignes as $ligne) {
    $utilisateur[$cpt] = [$ligne['statut'], $ligne['pseudonyme'], $ligne['nom'], $ligne['prenom'], $ligne['adresseMail'], $ligne['anonyme']];
    $cpt = $cpt + 1;
}
$nbUtilisateur = count($utilisateur);
?>
<!-------------------------------------------------------Page d'affichage d'utilisateur---------------------------------------------------------------->
<div>
    <?= $message ?>
</div>
<br>
<div class="rounded text-center text-white p-3 m-3 mt-5 bg-orange" >
    <h1 style="font-size:2em;"><i>Gestion des utilisateurs</i></h1>
</div>
<div class="row m-0">
    <div class="col-12 text-center">
        <input type="button" value="Creer article" class="bouton-design rounded" OnClick="window.location.href = 'index.php?action=creer_article&texte=ok'">
    </div>
</div>
<?php
for ($i = 0; $i < $nbUtilisateur; $i++) {
    echo '<div class="row m-0 mt-4">'
    . '<div class="col-9 offset-1 p-0">'
    . '<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative bg-white ">'
    . '<div class="col-7 p-3 bg-light">'
    . '<div class="row m-0 mt-3 ">'
    . '<div class="col-lg-12 col-md-12 col-sm-12">'
    . '<h3 class="mr-auto ml-auto text-center" style="font-size:2rem;">' . $utilisateur[$i][1] . '</h3>'
    . '</div>'
    . '</div>'
    . '<hr class="hrp bg-dark">'
    . '<div class="row m-">'
    . '<div class="col-lg-12 col-md-12 col-sm-12">'
    . '<h4 class="mb-auto text-center" style="font-size:.9em;">' . $utilisateur[$i][2] . '<br></h4>'
    . '<h4 class="mb-auto text-center text-uppercase" style="font-size:.9em;">' . $utilisateur[$i][3] . ' - ' . $utilisateur[$i][4]
    . '</div>'
    . '</div>'
    . '<hr class="hrp bg-dark">'
    . '<div class="row m-">'
    . '<div class="col-lg-12 col-md-12 col-sm-12">'
    . '<h4 class="mb-auto text-center" style="font-size:.9em;">' . $utilisateur[$i][5] . '<br></h4>'
    . '</div>'
    . '</div>'
    . '<hr class="hrp bg-dark">'
    . '<div class="row m-0 mt-3">'
    . '<p class="card-text mb-auto " style="font-size:1em;">' . $utilisateur[$i][5] . '</p>'
    . '</div>'
    . '</div>'
    . '</div>'
    . '</div>'
    . '<div class="col-1 mb-auto mt-auto">'
    . '<input type="button" value="Modifier" class="bouton-design rounded" OnClick="window.location.href =' . "'" . 'index.php?action=modifier_article&idArticle=' . $utilisateur[$i][0] . "&texte=ok'" . '">'
    . '<input type="button" value="Supprimer" class="bouton-design rounded mt-2"  OnClick="window.location.href =' . "'" . 'index.php?action=gestion_article&idArticle=' . $utilisateur[$i][0] . "'" . '">'
    . '</div>'
    . '</div>';
}
?>
<input type='button' value='Retour' OnClick="window.location.href='index.php?action=gestion_admin'" />
<!-------------------------------------------------------Fin de la page d'affichage d'utilisateur---------------------------------------------------------------->
