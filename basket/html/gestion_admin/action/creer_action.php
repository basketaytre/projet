<?php

$idArticle = '';
$idSponsor = '';
$typeDon = '';
$montant = '';
$message = '';
$donneeErreur = '';
$requete = "select idSponsor,nom from sponsor";
$resultats = $connexion->query($requete);
$listeSponsors = $resultats->fetchALL(PDO::FETCH_ASSOC);
$requete = "select idArticle,titre from article";
$resultats = $connexion->query($requete);
$listeArticles = $resultats->fetchALL(PDO::FETCH_ASSOC);
if (isset($_POST['idArticle'])) {
    $idArticle = $_POST["idArticle"];
    $idSponsor = $_POST["idSponsor"];
    $typeDon = $_POST["typeDon"];
    $montant = $_POST["montant"];

    // Vérification de l'ID'articles
    $requete = "select idArticle, idSponsor from action where idArticle=" . $idArticle . " and idSponsor=" . $idSponsor . ";";
    $resultats = $connexion->query($requete);
    $verifIdArti = $resultats->fetchALL(PDO::FETCH_ASSOC);
    $donne = false;
    foreach ($verifIdArti as $ligne) {
        if ($ligne['idArticle'] == $idArticle) {
            $donne = true;
        }
    }
    if ($donne == true) {
        $donneeErreur = $donneeErreur . "- Une action à déjà été créé pour cet article et ce partenaire,<br>";
    }
    
    if ((strlen($montant)) < 1 || strlen($montant) > 10000) {
        $donneeErreur = $donneeErreur . "- Montant invalide,<br>";
    }
    if ((strlen($idArticle)) < 1 || strlen($idArticle) > 2) {
        $donneeErreur = $donneeErreur . "- Id Article invalide,<br>";
    }
    if ((strlen($idSponsor)) < 1 || strlen($idSponsor) > 2) {
        $donneeErreur = $donneeErreur . "- Id Sponsor invalide,<br>";
    }
    if ((strlen($typeDon)) < 1 || strlen($typeDon) > 1000) {
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
    <!-- Champ Article -->
    <label class="form_col" for="idArticle">Article* : </label>
    <select name='idArticle' id="idArti" onblur="indexDonnees(0, 2)">
        <option value="-1">Veuillez faire un choix</option>
        <?php
        foreach ($listeArticles as $listeArticle) {
            echo "<option value={$listeArticle['idArticle']}";
            if ($idArticle == $listeArticle['idArticle'])
                echo ' selected';
            echo ">";
            echo "{$listeArticle['titre']}";
            echo "</option>";
        }
        ?>
    </select>
    <span class="tooltip" id="tooltipIdArticle">Doit être choisi</span>
    <br>
    <br>
    <!--  Champ sponsor-->
    <label class="form_col" for="idSponsor">Sponsor* : </label>
    <select name='idSponsor' id="idSponso"  onblur="indexDonnees(1, 2)" >
        <option value="-1">Veuillez faire un choix</option>
        <?php
        foreach ($listeSponsors as $listeSponsor) {
            echo "<option value={$listeSponsor['idSponsor']}";
            if ($idSponsor == $listeSponsor['idSponsor'])
                echo ' selected';
            echo ">";
            echo "{$listeSponsor['nom']}";
            echo "</option>";
        }
        ?>
    </select>
    <span class="tooltip" id="tooltipIdSponsor">Doit être choisi</span>
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
