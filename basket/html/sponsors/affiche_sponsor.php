<?php 
$requete = "select * from sponsor";
//Exécution de  la requête qui renvoie le résultat dans  $resultats, 
$resultats = $connexion->query($requete);
//On récupère toutes les lignes de la table dans la variable $lignes qui est un tableau associatif
$lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
?>
<h3>Liste des sponsors</h3><br>
<?php
foreach ($lignes as $ligne) {
    //on affiche la ligne qu'on vient de lire
    echo "<p>" . $ligne['nom'] . " " . $ligne['adresse'] . " " . $ligne['ville'] . " " . $ligne['codePostal'] . " " . $ligne['telephone'] . " " ."<a href=".$ligne['lien'] .">". $ligne['lien'] . "</a>" . " " . $ligne['description'] . " " . "<img src=images/". $ligne['image']."> ";
}
?>
<br>
<input type='button' value='Retour' OnClick="window.location.href='index.php'" />
