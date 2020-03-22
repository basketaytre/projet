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
    $requete = "select * from action where idSponsor='$idSponsor' and idArticle='$idArticle'";
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
    $date = $_POST['date'];
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
        $connexion->exec($requete);
        $message="<div class='alert alert-success'><strong>Traitement effectué !</strong> Votre modification à bien été prise en compte .</div>";

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
    <label class="form_col" for="idArticle">ID Article* : </label>
    <input type="text" id="idArticle" name="idArticle" value='<?= $idArticle ?>' onblur="indexDonnees(0, 1)">
    <span class="tooltip" id="tooltipIdArticle">Doit être choisis</span>
    <br>
    <br>
    <label class="form_col" for="idSponsor">ID Sponsor* : </label>
    <input type="text" id="idSponsor" name="idSponsor" value='<?= $idSponsor ?>' onblur="indexDonnees(1, 1)">
    <span class="tooltip" id="tooltipIdSponsor">Doit être choisis</span>
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
