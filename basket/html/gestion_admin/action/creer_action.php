<?php
//initialisation des variable
$idArticle = '';
$idSponsor = '';
$typeDon = '';
$montant = '';
$message = '';
$donneeErreur = '';
// recuperation de la table sponsors
$requete = "select idSponsor,nom from sponsor";
$resultats = $connexion->query($requete);
$listeSponsors = $resultats->fetchALL(PDO::FETCH_ASSOC);
// recuperation de la table article
$requete = "select idArticle,titre from article";
$resultats = $connexion->query($requete);
$listeArticles = $resultats->fetchALL(PDO::FETCH_ASSOC);
// si le formulaire a etait soumis
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
    $montant = (preg_replace('/\s/', '', $montant));
    if (((int) ($montant) < 1) || ((int) ($montant) > 100000) || (is_numeric($montant) == FALSE)) {
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
<!-------------------------------------------------------Page de creation d'action---------------------------------------------------------------->

<div>
    <?= $message ?>
</div>
<div class="mr-5 ml-5">
    <div class="my-3 p-3 rounded box-shadow mr-5 ml-5" style="background-color: #ededed;">

        <div class="rounded text-center text-white p-3 m-3 mt-5 bg-orange mb-5" >
            <h1 style="font-size:2em;"><i>Créer une action</i></h1>
        </div>
        <!--Formulaire de creation d'action-->
        <form  name="monForm" method="post" action="index.php?action=creer_action" >
            <!-- Champ Article -->
            <label class="form_col" for="idArticle">Article<span class="important">*</span> : </label>
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
            <span class="tooltip" id="tooltipIdArticle">Vous devez faire un choix</span>
            <br>
            <br>
            <!--  Champ sponsor-->
            <label class="form_col" for="idSponsor">Sponsor<span class="important">*</span> : </label>
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
            <span class="tooltip" id="tooltipIdSponsor">Vous devez faire un choix</span>
            <br>
            <br>
            <!-- Champ Type de don -->
            <label class="form_col" for="typeDon">Type de don<span class="important">*</span> : </label>
            <input type="text" id="typeDon" name="typeDon" value='<?= $typeDon ?>' onblur="indexDonnees(2, 1)">
            <span class="tooltip" id="tooltipTypeDon">Doit être compris entre 1 et 1000 caractères</span>
            <br>
            <br>
            <!-- Champ Montant -->
            <label class="form_col" for="montant">Montant<span class="important">*</span> : </label>
            <input type="text" id="montant" name="montant" value='<?= $montant ?>' onblur="indexDonnees(3, 1)">
            <span class="tooltip" id="tooltipMontant">Doit être compris entre 1 et 10000 caractères</span>
            <br>
            <br>
            <!-- Bouton -->
            <div class="row m-0">
                <div class="col-lg-4 offset-1">
                    <input type="submit" value="Enregistrer" class="bouton-design rounded" OnClick="return validFormulaire()">
                    <input type='reset' value="Réinitialiser le formulaire"  class="bouton-design rounded" style="width:200px;"/>
                    <input type='button' value='Retour' class="bouton-design rounded" OnClick="window.location.href = 'index.php?action=gestion_action'" />
                </div>
            </div>
        </form>
        <!--Fin du formulaire de creation d'action-->
    </div>
</div>
<script src="./js/action/creer_action.js"></script>
<!-----------------------------------------------------Fin de la page de creation d'action--------------------------------------------------------->
