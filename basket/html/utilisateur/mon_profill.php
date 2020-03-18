<?php
$requete = "select * from sponsor";
//Exécution de  la requête qui renvoie le résultat dans  $resultats, 
$resultats = $connexion->query($requete);
//On récupère toutes les lignes de la table dans la variable $lignes qui est un tableau associatif
$lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
?>
<br><br>
<h1>Bienvenue sur votre profil, </h1><br>
<h3>Vos informations</h3><br>
<?php
foreach ($lignes as $ligne) {
    //on affiche la ligne qu'on vient de lire
    echo "<p>" . $ligne['pseudonyme'] . " " . $ligne['nom'] . " " . $ligne['prenom'] . " " . $ligne['adresseMail'] . " " . $ligne['telephone'];
}
?>

