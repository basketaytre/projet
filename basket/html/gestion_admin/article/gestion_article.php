<h1>Gestion article</h1>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" OnClick="window.location.href='index.php?action=creer_article'">
    <span class="title">Créer des articles</span>
</button>
<?php
    $supprime='';
    $idArticle='';
    if (isset($_GET['supprime'])){
        $idArticle=$_GET['idArticle'];
        $requete="delete from article where idArticle='$idArticle'";
        echo $requete;
    $connexion->exec($requete);
    }
    include 'connexion.php';
    $requete = "select * from article";
    //Exécution de  la requête qui renvoie le résultat dans  $resultats, 
    $resultats = $connexion->query($requete);
    echo "<h2>Listes des Articles</h2>";
    //On récupère toutes les lignes de la table dans la variable $lignes qui est un tableau associatif
    $lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
    foreach ($lignes as $ligne) {
        //on affiche la ligne qu'on vient de lire
        echo "<p>",$ligne['titre'],$ligne['dateArticle']," ",$ligne['villeArticle'],$ligne['departement']," ",$ligne['descriptionArticle']," ","<img style="."'width: 10%'"."src='http://localhost/basket/basket/images/".$ligne['imageArticle']."'>"
        ,"<button class='navbar-toggler' type='button' data-toogle='collapse' data-target='#navbarToggleExternalContent' aria-controls='navbarToggleExternalContent' aria-expanded='false' aria-label='Toggle navigation' ","OnClick=window.location.href="."'index.php?action=modifier_article&idArticle={$ligne['idArticle']}'"."><span class='title'>Modifier</span></button>"
        ,"<button class='navbar-toggler' type='button' data-toogle='collapse' data-target='#navbarToggleExternalContent' aria-controls='navbarToggleExternalContent' aria-expanded='false' aria-label='Toggle navigation' ","OnClick=window.location.href="."'index.php?action=gestion_article&idArticle={$ligne['idArticle']}&supprime=ok'"."><span class='title'>Supprimer</span></button></p>";
    }
?>
