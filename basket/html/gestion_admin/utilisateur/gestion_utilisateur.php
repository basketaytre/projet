<?php
$message = '';
if (isset($_GET['idUtilisateur'])) {
    $idUtilisateur = $_GET['idUtilisateur'];
    $requete = "delete from utilisateur where idUtilisateur='$idUtilisateur'";
    $message = "<div class='alert alert-warning'><strong>Traitement effectué !</strong> Un utilisateur a été supprimé .</div>";
    $connexion->exec($requete);
}
$requete = "select * from utilisateur";
//Exécution de  la requête qui renvoie le résultat dans  $resultats, 
$resultats = $connexion->query($requete);
//On récupère toutes les lignes de la table dans la variable $lignes qui est un tableau associatif
$lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
?>
<div>
    <?= $message ?>
</div>
<h1>Gestion Utilisateurs</h1>
<br>
<h3>Listes des Utilisateurs</h3>
<?php 
foreach ($lignes as $ligne) {
    //on affiche la ligne qu'on vient de lire
    echo "<p>" . $ligne['statut'] . " " . $ligne['pseudonyme'] . " " . $ligne['nom'] . " " . $ligne['prenom'] . " " . $ligne['adresseMail'] . " " .  $ligne['mdp'] . " " . $ligne['telephone'] . " "
            . "<input type='submit' value='Modifier' OnClick=window.location.href=" . "'index.php?action=modifier_utilisateur&idUtilisateur={$ligne['idUtilisateur']}'" . ">"
            . "<input type='submit' value='Supprimer' OnClick=window.location.href=" . "'index.php?action=gestion_utilisateur&idUtilisateur={$ligne['idUtilisateur']}'>" . "</p>";

}
?>
<input type='button' value='Retour' OnClick="window.location.href='index.php?action=gestion_admin'" />
