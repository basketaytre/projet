<h1>Gestion article</h1>
<input type='submit' value='Créer un article' OnClick="window.location.href='index.php?action=creer_article'"/>

<?php
    //$supprime='';
    //$idArticle='';
    if (isset($_GET['idArticle'])){
    $idArticle=$_GET['idArticle'];
        $requete="delete from article where idArticle=$idArticle";
        //$requete="je suis une requête de bon goût";
        $connexion->exec($requete);
    }
    $requete = "select * from article";
    //Exécution de  la requête qui renvoie le résultat dans  $resultats, 
    $resultats = $connexion->query($requete);
    echo "<h2>Listes des Articles</h2>";
    //On récupère toutes les lignes de la table dans la variable $lignes qui est un tableau associatif
    $lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
    foreach ($lignes as $ligne) {
        //on affiche la ligne qu'on vient de lire
        echo "<p>",$ligne['titre'],$ligne['dateArticle']," ",$ligne['villeArticle'],$ligne['departement']," ",$ligne['descriptionArticle']," ","<img style="."'width: 10%'"."src=".$ligne['imageArticle'].">"
        ,"<input type='submit' value='Modifier' OnClick=window.location.href='index.php?action=modifier_article&idArticle={$ligne['idArticle']}'>
        <input type='submit' value='Supprimer'  OnClick=window.location.href='index.php?action=gestion_article&idArticle={$ligne['idArticle']}'>";
    }
?>