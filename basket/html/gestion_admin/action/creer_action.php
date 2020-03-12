<?php
$idArticle = 0;
$idSponsor = 0;
$typeDon = '';
$montant = 0;
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

    if ((strlen($montant)) < 1) {
        $donneeErreur = $donneeErreur . "- Montant invalide,<br>";
    }
    if ((strlen($idArticle)) < 1) {
        $donneeErreur = $donneeErreur . "- Id Article invalide,<br>";
    }
    if ((strlen($idSponsor)) < 1) {
        $donneeErreur = $donneeErreur . "- Id Sponsor invalide,<br>";
    }
    if ((strlen($typeDon)) < 1) {
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
    <p>ID Article* : <input type="text" name="idArticle" value='<?= $idArticle ?>'  ></p>
    <p>ID Sponsor* : <input type="text" name="idSponsor" value='<?= $idSponsor ?>'   ></p>
    <p>Type de don* : <input type="text" name="typeDon" value='<?= $typeDon ?>'  ></p>
    <p>Montant* : <input type="text" name="montant" value='<?= $montant ?>'   ></p>
    <br>
    <br>
    <div>
        <input type='submit' value='Enregistrer' />
    </div>
    <br>
</form>
<div>
    <input type='button' value='Retour' OnClick="window.location.href = 'index.php?action=gestion_action'" />
</div>
