<h1>Page d'affichage des articles</h1>
<h3>Listes des Articles</h3>
<?php
    $requete = "select * from article";
    //Exécution de  la requête qui renvoie le résultat dans  $resultats, 
    $resultats = $connexion->query($requete);
    //On récupère toutes les lignes de la table dans la variable $lignes qui est un tableau associatif
    $lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
    foreach ($lignes as $ligne) {
        //on affiche la ligne qu'on vient de lire
        echo "<p>",$ligne['titre'],$ligne['dateArticle']," ",$ligne['villeArticle'],$ligne['departement']," ",$ligne['descriptionArticle']," ","<img style="."'width: 10%'"."src='http://localhost/basket/basket/images/".$ligne['imageArticle']."'></p>";
    }
?>
