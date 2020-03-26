<?php
$idSponsor = 0;
$idArticle = 0;
$typeDon = '';
$montant = 0;
$message = '';
$donneeErreur = '';
$valide = '';


if (isset($_GET['idSponsor'])) {
    $idSponsor = $_GET['idSponsor'];
    $idArticle = $_GET['idArticle'];
    // Récuperer le sponsor
    $requete = "select idSponsor,nom from sponsor where idSponsor='$idSponsor'";
    $resultats = $connexion->query($requete);
    $listeSponsors = $resultats->fetchALL(PDO::FETCH_ASSOC);
    $listeSponsor = $listeSponsors[0];
    $nom = $listeSponsor['nom'];
    
    // Récupérer l'article
    $requete = "select idArticle,titre from article where idArticle='$idArticle'";
    $resultats = $connexion->query($requete);
    $listeArticles = $resultats->fetchALL(PDO::FETCH_ASSOC);
    $listeArticle = $listeArticles[0];
    $titre = $listeArticle['titre'];
    
    $requete = "select typeDon,montant,date from action where idArticle='$idArticle'";
    $resultats = $connexion->query($requete);
    $lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
    $ligne = $lignes[0];
    $typeDon = $ligne['typeDon'];
    $montant = $ligne['montant'];
    $date = $ligne['date'];
}
if (isset($_GET['valide'])) {
    $idSponsor = $_POST['idSponsor'];
    $idArticle = $_POST['idArticle'];
    if (isset($_POST["typeDon"])) {
        $typeDon = $_POST["typeDon"];
    }
    if (isset($_POST["montant"])) {
        $montant = $_POST["montant"];
    }
    if ((strlen($montant)) < 1) {
        $donneeErreur = $donneeErreur . "- Montant invalide,<br>";
    }
    if (((strlen($typeDon)) > 20) || (strlen($typeDon)) < 1) {
        $donneeErreur = $donneeErreur . "- Type de don invalide, <br>";
    }
    if ($donneeErreur != '') {
        $message = "<div class='alert alert-danger'><strong>Erreur !</strong> Le sponsor n'a pas pu être modifié.<br> $donneeErreur </div>";
    }
    if ($donneeErreur == '') {
        $requete = "update action set typeDon='$typeDon',montant='$montant' where idSponsor='$idSponsor' and idArticle='$idArticle'";
        // il faut ajouter a la requette idArticle=$listeArticle['idArticle'] et idSponsor=$listeSponsor['idSponsors']
        $connexion->exec($requete);
        $message = "<div class='alert alert-success'><strong>Traitement effectué !</strong> Votre modification à bien été prise en compte .</div>";
    }
}
?>
<form  name="monForm" method="post" action="index.php?action=modifier_action&valide=ok">
    <div>
        <?= $message ?>
    </div>
    <h1>Modification d'une action</h1>
    <br>
    <br>
    <label class="form_col" for="idArticle">Article* : </label>
    <input type="text" name="idArticle" readonly="" style ="background-color: #ccc;" value='<?= $titre ?>'>
    <br>
    <br>
    <label class="form_col" for="idSponsor">Sponsor* : </label>
    <input type="text" name="idArticle" readonly="" style ="background-color: #ccc;" value='<?= $nom ?>'>

    <br>
    <br>
    <label class="form_col" for="typeDon">Type de don* : </label>
    <input type="text" id="typeDon" name="typeDon" value='<?= $typeDon ?>' onblur="indexDonnees(2, 1)">
    <span class="tooltip" id="tooltipTypeDon">Doit être compris entre 1 et 1000 caractères</span>
    <br>
    <br>
    <label class="form_col" for="montant">Montant* : </label>
    <input type="text" id="montant" name="montant" value='<?= $montant ?>' onblur="indexDonnees(3, 1)">
    <span class="tooltip" id="tooltipMontant">Doit être compris entre 1 et 10000 caractères</span>
    <br>
    <br>
    <div>
        <input type='submit' value='Enregistrer' onclick="return validFormulaire()"/>
        <input type='reset' value="Réinitialiser le formulaire" />
        <input type='button' value='Retour' OnClick="window.location.href = 'index.php?action=gestion_action'" />
    </div>
    <br>
</form>
<script src="./js/action/modifier_action.js"></script>
