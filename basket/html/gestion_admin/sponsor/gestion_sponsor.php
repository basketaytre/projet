<h1>Gestion sponsors</h1>
<?php
    include 'connexion.php';
    $requete = "select * from sponsor";
    //Exécution de  la requête qui renvoie le résultat dans  $resultats, 
    $resultats = $connexion->query($requete);
    echo "<h2>Listes des sponsors</h2>";
    //On récupère toutes les lignes de la table dans la variable $lignes qui est un tableau associatif
    $lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
    foreach ($lignes as $ligne) {
        //on affiche la ligne qu'on vient de lire
        echo $ligne['idSponsor']," ",$ligne['nom']," ",$ligne['adresse']," ",$ligne['ville']," ",$ligne['codePostal']," ",$ligne['telephone']," ",$ligne['lien']," ",$ligne['description']," ","<img style="."'width: 10%'"."src='http://localhost/basket/basket/images/".$ligne['image']."'>"," <br/>\n";
    }
?>
