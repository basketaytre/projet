<?php
$requete = "select statut,pseudonyme,nom,prenom,adresseMail,telephone,anonyme from utilisateur";
//Exécution de  la requête qui renvoie le résultat dans  $resultats, 
$resultats = $connexion->query($requete);
//On récupère toutes les lignes de la table dans la variable $lignes qui est un tableau associatif
$lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
?>

<h1>Page d'affichage des utilisateurs</h1><br>
<h3>Liste des utilisateurs</h3><br>
<?php
foreach ($lignes as $ligne) {
    //on affiche la ligne qu'on vient de lire
    if ($ligne['anonyme'] == 0) {
        echo "<p>" . $ligne['pseudonyme'] . " " . $ligne['nom'] . " " . $ligne['prenom'] . " " . $ligne['adresseMail'] . " " . $ligne['telephone'];
    } else {
        echo "<p>" . $ligne['pseudonyme'] ;
    }
}
?>

