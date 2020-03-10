<h1>Gestion action</h1>
<h3>Créer des actions</h3>
<input type='submit' value='Créer une action' OnClick="window.location.href='index.php?action=creer_action'"/><br><br>
<?php
    //$supprime='';
    //$idArticle=0;
    //$idSponsor=0;
    if (isset($_GET['supprime'])){
        $idSponsor=$_GET['idSponsor'];
        $idSponsor=$_GET['idArticle'];
        $requete="delete from sponsor where idSponsor='$idSponsor' and idArticle='$idArticle'";
        echo $requete;
        $connexion->exec($requete);
    }
    $requete = "select * from action";
    //Exécution de  la requête qui renvoie le résultat dans  $resultats, 
    $resultats = $connexion->query($requete);
    //On récupère toutes les lignes de la table dans la variable $lignes qui est un tableau associatif
    $lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
    foreach ($lignes as $ligne) {
        //on affiche la ligne qu'on vient de lire
        echo "<p>",$ligne['typeDon']," ",$ligne['montant']," ",$ligne['date'].">"
        ,"<input type='submit' value='modifier' OnClick=window.location.href="."'index.php?action=action=modifier_action&idSponsor={$ligne['idSponsor']}&idArticle={$ligne['idArticle']}'".">"
        ,"<input type='submit' value='Supprimer' OnClick=window.location.href="."'index.php?action=gestion_sponsor&idSponsor={$ligne['idSponsor']}&idArticle={$ligne['idArticle']}'"."/>";
        }
?>
