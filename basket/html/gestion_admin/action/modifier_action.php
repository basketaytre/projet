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
    <br><br>
    <div>
        <?= $message ?>
    </div>
    <h1>Modification d'une action</h1>
    <p>ID Sponsor : <input type="text" name="idSponsor" readonly="" value='<?= $idSponsor ?>'  ></p>
    <p>ID Article : <input type="text" name="idArticle" readonly="" value='<?= $idArticle ?>'  ></p>
    <p>Type de don* : <input type="text" name="typeDon" value='<?= $typeDon ?>'   ></p>
    <p>Montant* : <input type="text" name="montant" value='<?= $montant ?>'  ></p>
    <p>date : <input type="text" name="date" readonly="" value='<?= $date ?>'   ></p>
    <br>
    <br>
    <div>
        <input type='submit' value='Enregistrer' />
    </div>
    <br>
</form>
