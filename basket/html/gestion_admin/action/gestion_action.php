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
?>
<br><br>
<div>
    <?= $message ?>
</div>
<h1>Gestion action</h1>
<input type='submit' value='Créer une action' OnClick="window.location.href = 'index.php?action=creer_action'"/><br><br>
<h3>Liste des actions</h3>
<?php
foreach ($lignes as $ligne) {
    //on affiche la ligne qu'on vient de lire
    echo "<p>", $ligne['typeDon'], " ", $ligne['montant'], " ", $ligne['date'] . ">"
    , "<input type='submit' value='modifier' OnClick=window.location.href=" . "'index.php?action=modifier_action&idSponsor={$ligne['idSponsor']}&idArticle={$ligne['idArticle']}'" . ">"
    , "<input type='submit' value='Supprimer' OnClick=window.location.href=" . "'index.php?action=gestion_action&idSponsor={$ligne['idSponsor']}&idArticle={$ligne['idArticle']}'" . ">";
}
?>
<input type='button' value='Retour' OnClick="window.location.href='index.php?action=gestion_admin'" />
