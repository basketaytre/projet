<h3>Listes des Actions</h3><br>
<?php
    $requete = "select * from action";
    //Exécution de  la requête qui renvoie le résultat dans  $resultats, 
    $resultats = $connexion->query($requete);
    //On récupère toutes les lignes de la table dans la variable $lignes qui est un tableau associatif
    $lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
    foreach ($lignes as $ligne) {
        //on affiche la ligne qu'on vient de lire
        echo "<p>",$ligne['typeDon']," ",$ligne['montant']," ",$ligne['date'],"</p>";
    }
?>
<br>
<input type='button' value='Retour' OnClick="window.location.href='index.php'" />

