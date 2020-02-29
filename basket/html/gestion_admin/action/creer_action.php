<?php
$idArticle=0;
$idSponsor=0;
$typeDon='';
$montant=0;
$message = '';
$donneeErreur = '';
$valide = false;

if (isset($_POST['idArticle'])) {
    $idArticle = $_POST["idArticle"];
    $idSponsor = $_POST["idSponsor"];
    $typeDon = $_POST["typeDon"];
    $montant = $_POST["montant"];

    if ((strlen($montant)) < 1) {
        $donneeErreur = $donneeErreur . "Montant invalide,<br>";
    }
    if ((strlen($idArticle)) < 1) {
        $donneeErreur = $donneeErreur . "Id Article invalide,<br>";
    }
    if ((strlen($idSponsor)) < 1) {
        $donneeErreur = $donneeErreur . "Id Sponsor invalide,<br>";
    }
    if (((strlen($typeDon)) > 20) || (strlen($typeDon)) < 1) {
        $donneeErreur = $donneeErreur . "Numero de téléphone invalide, <br>";
    }
    if ($donneeErreur != '') {
        $message = "Erreur,<br>" . $donneeErreur;
    }
    if ($donneeErreur==''){
        $requete = "insert into action (idArticle,idSponsor,typeDon,montant,date) values ('$idArticle','$idSponsor','$typeDon',$montant,NOW());";
        echo $requete;
        $connexion->exec($requete);
        $message = 'Traitement effectué';
    }
}
?>
<form  name="monForm" method="post" action="index.php?action=creer_action" >
    <h1>Création d'une action</h1>
    <p>ID Article* : <input type="text" name="idArticle" value='<?= $idArticle ?>'  ></p>
    <p>ID Sponsor* : <input type="text" name="idSponsor" value='<?= $idSponsor ?>'   ></p>
    <p>Type de don* : <input type="text" name="typeDon" value='<?= $typeDon ?>'  ></p>
    <p>Montant* : <input type="text" name="montant" value='<?= $montant ?>'   ></p>
    <br>
    <br>
    <strong><?= $message ?></strong>
    <div>
        <input type='submit' value='Enregistrer' />
    </div>
    <br>
</form>
