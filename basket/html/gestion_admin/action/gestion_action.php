<h1>Gestion action</h1>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" OnClick="window.location.href='index.php?action=creer_action'">
    <span class="title">Créer des actions</span>
</button>
<?php
    $supprime='';
    $idArticle=0;
    $idSponsor=0;
    if (isset($_GET['supprime'])){
        $idSponsor=$_GET['idSponsor'];
        $idSponsor=$_GET['idArticle'];
        $requete="delete from sponsor where idSponsor='$idSponsor' and idArticle='$idArticle'";
        echo $requete;
    $connexion->exec($requete);
    }
    include 'connexion.php';
    $requete = "select * from action";
    //Exécution de  la requête qui renvoie le résultat dans  $resultats, 
    $resultats = $connexion->query($requete);
    echo "<h2>Listes des sponsors</h2>";
    //On récupère toutes les lignes de la table dans la variable $lignes qui est un tableau associatif
    $lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
    foreach ($lignes as $ligne) {
        //on affiche la ligne qu'on vient de lire
        echo "<p>",$ligne['typeDon']," ",$ligne['montant']," ",$ligne['date']," "
        ,"<button class='navbar-toggler' type='button' data-toogle='collapse' data-target='#navbarToggleExternalContent' aria-controls='navbarToggleExternalContent' aria-expanded='false' aria-label='Toggle navigation' ","OnClick=window.location.href="."'index.php?action=modifier_action&idSponsor={$ligne['idSponsor']}&idArticle={$ligne['idArticle']}'"."><span class='title'>Modifier</span></button>"
        ,"<button class='navbar-toggler' type='button' data-toogle='collapse' data-target='#navbarToggleExternalContent' aria-controls='navbarToggleExternalContent' aria-expanded='false' aria-label='Toggle navigation' ","OnClick=window.location.href="."'index.php?action=gestion_sponsor&idSponsor={$ligne['idSponsor']}&idArticle={$ligne['idArticle']}&supprime=ok'"."><span class='title'>Supprimer</span></button></p>";
    }
?>
