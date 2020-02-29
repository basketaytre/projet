<h1>Page d'affichage des articles</h1>
<?php
    include 'connexion.php';
    $requete = "select * from action";
    //Exécution de  la requête qui renvoie le résultat dans  $resultats, 
    $resultats = $connexion->query($requete);
    echo "<h2>Listes des sponsors</h2>";
    //On récupère toutes les lignes de la table dans la variable $lignes qui est un tableau associatif
    $lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
    foreach ($lignes as $ligne) {
        //on affiche la ligne qu'on vient de lire
        echo "<p>",$ligne['typeDon']," ",$ligne['montant']," ",$ligne['date'],"</p>";
    }
?>

