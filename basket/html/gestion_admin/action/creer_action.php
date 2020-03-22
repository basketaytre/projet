<?php
$requete = "select * from action ";
//Exécution de  la requête qui renvoie le résultat dans  $resultats, 
$resultats = $connexion->query($requete);
//On récupère toutes les lignes de la table dans la variable $lignes qui est un tableau associatif
$lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);

$idArticle = '';
$idSponsor = '';
$typeDon = '';
$montant = '';
$message = '';
$donneeErreur = '';

if (isset($_POST['idArticle'])) {
    $idArticle = $_POST["idArticle"];
    $idSponsor = $_POST["idSponsor"];
    $typeDon = $_POST["typeDon"];
    $montant = $_POST["montant"];
    //$requete = "select idArticle from article where idArticle=" . $idArticle;
    //$resultats = $connexion->query($requete);
    //$t = $resultats->fetchALL(PDO::FETCH_ASSOC);

    if ((strlen($montant)) < 1 || strlen($montant) > 10000) {
        $donneeErreur = $donneeErreur . "- Montant invalide,<br>";
    }
    if ((strlen($idArticle)) < 1 || strlen($idArticle) > 2) {
        $donneeErreur = $donneeErreur . "- Id Article invalide,<br>";
    }
    if ((strlen($idSponsor)) < 1 || strlen($idSponsor) > 2) {
        $donneeErreur = $donneeErreur . "- Id Sponsor invalide,<br>";
    }
    if ((strlen($typeDon)) < 1 || strlen($typeDon) >1000) {
        $donneeErreur = $donneeErreur . "- Don invalide, <br>";
    }
    if ($donneeErreur != '') {
        $message = "<div class='alert alert-danger'><strong>Erreur !</strong> L'action n'a pas pu être créé .<br> $donneeErreur </div>";
    }
    if ($donneeErreur == '') {
        $requete = "insert into action (idArticle,idSponsor,typeDon,montant,date) values ('$idArticle','$idSponsor','$typeDon',$montant,NOW());";
        $connexion->exec($requete);
        $message = "<div class='alert alert-success'><strong>Traitement effectué !</strong> Votre action à bien été créé .</div>";
    }
}
?>
<form  name="monForm" method="post" action="index.php?action=creer_action" >
    <div>
        <?= $message ?>
    </div>
    <h1>Création d'une action</h1>
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
<script src="./js/action/creer_action.js"></script>
