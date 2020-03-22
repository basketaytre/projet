<?php
$message = '';
if (isset($_GET['idSponsor'])) {
    $idSponsor = $_GET['idSponsor'];
    $requete = "delete from sponsor where idSponsor='$idSponsor'";
    $message = "<div class='alert alert-warning'><strong>Traitement effectué !</strong> Un sponsor a été supprimé .</div>";
    $connexion->exec($requete);
}
$requete = "select * from sponsor";
//Exécution de  la requête qui renvoie le résultat dans  $resultats, 
$resultats = $connexion->query($requete);
//On récupère toutes les lignes de la table dans la variable $lignes qui est un tableau associatif
$lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
?>
<div>
    <?= $message ?>
</div>
<h1>Gestion sponsors</h1>
<input type='submit' value='Créer un sponsor' OnClick="window.location.href = 'index.php?action=creer_sponsor'"><br><br>
<h3>Listes des sponsors</h3>
<?php 
foreach ($lignes as $ligne) {
    //on affiche la ligne qu'on vient de lire
    echo "<p>" . $ligne['nom'] . " " . $ligne['adresse'] . " " . $ligne['ville'] . " " . $ligne['codePostal'] . " " . $ligne['telephone'] . " " ."<a href=".$ligne['lien'] .">". $ligne['lien'] . "</a>" . " " . $ligne['description'] . " " . "<img src=images/". $ligne['image']."> " 
            . "<input type='submit' value='Modifier' OnClick=window.location.href=" . "'index.php?action=modifier_sponsor&idSponsor={$ligne['idSponsor']}'" . ">"
            . "<input type='submit' value='Supprimer' OnClick=window.location.href=" . "'index.php?action=gestion_sponsor&idSponsor={$ligne['idSponsor']}'>" . "</p>";

}
?>
<input type='button' value='Retour' OnClick="window.location.href='index.php?action=gestion_admin'" />
