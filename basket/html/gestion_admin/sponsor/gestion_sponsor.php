<h1>Gestion sponsors</h1>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" OnClick="window.location.href='index.php?action=creer_sponsor'">
    <span class="title">Créer un SP</span>
</button> 
<?php
    $supprime='';
    $idSponsor='';
    if (isset($_GET['supprime'])){
        $idSponsor=$_GET['idSponsor'];
        $requete="delete from sponsor where idSponsor='$idSponsor'";
        echo $requete;
    $connexion->exec($requete);
    }
    include 'connexion.php';
    $requete = "select * from sponsor";
    //Exécution de  la requête qui renvoie le résultat dans  $resultats, 
    $resultats = $connexion->query($requete);
    echo "<h2>Listes des sponsors</h2>";
    //On récupère toutes les lignes de la table dans la variable $lignes qui est un tableau associatif
    $lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
    foreach ($lignes as $ligne) {
        //on affiche la ligne qu'on vient de lire
        echo "<p>",$ligne['nom']," ",$ligne['adresse']," ",$ligne['ville']," ",$ligne['codePostal']," ",$ligne['telephone']," ",$ligne['lien']," ",$ligne['description']," ","<img style="."'width: 10%'"."src='http://localhost/basket/basket/images/".$ligne['image']."'>"
        ,"<button class='navbar-toggler' type='button' data-toogle='collapse' data-target='#navbarToggleExternalContent' aria-controls='navbarToggleExternalContent' aria-expanded='false' aria-label='Toggle navigation' ","OnClick=window.location.href="."'index.php?action=modifier_sponsor&idSponsor={$ligne['idSponsor']}'"."><span class='title'>Modifier</span></button>"
        ,"<button class='navbar-toggler' type='button' data-toogle='collapse' data-target='#navbarToggleExternalContent' aria-controls='navbarToggleExternalContent' aria-expanded='false' aria-label='Toggle navigation' ","OnClick=window.location.href="."'index.php?action=gestion_sponsor&idSponsor={$ligne['idSponsor']}&supprime=ok'"."><span class='title'>Supprimer</span></button></p>";
    }
?>
