<?php
$message = '';
if (isset($_GET['idArticle'])) {
    $idArticle = $_GET['idArticle'];
    $requete = "delete from article where idArticle=$idArticle";
    $message = "<div class='alert alert-warning'><strong>Traitement effectué !</strong> Un article a été supprimé .</div>";
    $connexion->exec($requete);
}
$requete = "select * from article";
//Exécution de  la requête qui renvoie le résultat dans  $resultats, 
$resultats = $connexion->query($requete);
//On récupère toutes les lignes de la table dans la variable $lignes qui est un tableau associatif
$lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
?>

<div>
    <?= $message ?>
</div>
<h1>Gestion article</h1>
<input type='submit' value='Créer un article' OnClick="window.location.href = 'index.php?action=creer_article'"/><br><br>
<h3>Liste des articles</h3>
<?php
foreach ($lignes as $ligne) {
    //on affiche la ligne qu'on vient de lire
    echo "<p>" . $ligne['titre'] . " " . $ligne['dateArticle'] . " " . $ligne['villeArticle'] . " " . $ligne['departement'] . " " . $ligne['descriptionArticle'] . " " . "<img src=images/". $ligne['imageArticle'] . "> "
            . "<input type='submit' value='Modifier' OnClick=window.location.href='index.php?action=modifier_article&idArticle={$ligne['idArticle']}'>"
            . "<input type='submit' value='Supprimer'  OnClick=window.location.href='index.php?action=gestion_article&idArticle={$ligne['idArticle']}'>";
}
?>