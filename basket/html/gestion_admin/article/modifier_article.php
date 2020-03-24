<?php
$idArticle = '';
$dateArticle = '';
$titre = '';
$descriptionArticle = '';
$imageArticle = '';
$villeArticle = '';
$departement = '';
$message = '';
$donneeErreur = '';
$valide = '';

if (isset($_GET['idArticle'])) {
    $idArticle = $_GET['idArticle'];
    $requete = "select * from article where idArticle='$idArticle'";
    $resultats = $connexion->query($requete);
    $lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
    $ligne = $lignes[0];
    $dateArticle = $ligne['dateArticle'];
    $titre = $ligne['titre'];
    $descriptionArticle = $ligne['descriptionArticle'];
    $imageArticle = $ligne['imageArticle'];
    $villeArticle = $ligne['villeArticle'];
    $departement = $ligne['departement'];
}
if (isset($_GET['valide'])) {
    $idArticle = $_POST['idArticle'];
    $dateArticle = $_POST['dateArticle'];
    if (isset($_POST["titre"])) {
        $titre = $_POST["titre"];
    }
    if (isset($_POST["descriptionArticle"])) {
        $descriptionArticle = $_POST["descriptionArticle"];
    }
    if (isset($_POST["imageArticle"])) {
        $imageArticle = $_POST["imageArticle"];
    }
    if (isset($_POST["villeArticle"])) {
        $villeArticle = $_POST["villeArticle"];
    }
    if (isset($_POST["departement"])) {
        $departement = $_POST["departement"];
        $departement = preg_replace('/\s/', '', $departement);
    }
    if ((strlen(preg_replace('/\s/', '', $departement))) != 2) {
        $donneeErreur = $donneeErreur . "- Departement invalide<br>";
    }
    if (((strlen($titre)) > 100) || (strlen($titre)) < 1) {
        $donneeErreur = $donneeErreur . "- Titre invalide <br>";
    }
    if (((strlen($descriptionArticle)) > 10000) || (strlen($descriptionArticle)) < 1) {
        $donneeErreur = $donneeErreur . "- Description invalide <br>";
    }
    if (((strlen($imageArticle)) > 20) || (strlen($imageArticle)) < 1) {
        $donneeErreur = $donneeErreur . "- Image invalide <br>";
    }
    if (((strlen($villeArticle)) > 20) || (strlen($villeArticle)) < 1) {
        $donneeErreur = $donneeErreur . "- Ville invalide<br>";
    }
    if ($donneeErreur != '') {
        $message = "<div class='alert alert-danger'><strong>Erreur !</strong> L'article n'a pas pu être modifié.<br> $donneeErreur </div>";
    }
    if ($donneeErreur == '') {
        $descriptionArticle= addslashes($descriptionArticle);
        $requete = "update article set titre='$titre',descriptionArticle='$descriptionArticle', imageArticle='$imageArticle', villeArticle='$villeArticle', departement='$departement' where idArticle='$idArticle'";
        $connexion->exec($requete);
        $message = "<div class='alert alert-success'><strong>Traitement effectué !</strong> Votre modification à bien été prise en compte .</div>";
    }
}
?>

<form  name="monForm" method="post" action="index.php?action=modifier_article&valide=ok" >
    <div>
        <?= $message ?>
    </div>
    <h1>Page de modification d'article</h1>
    <label class="form_col" for="idArticle">ID Article : </label>
    <input type="text" name="idArticle" readonly="" value='<?= $idArticle ?>'>
    <br>
    <br>
    <label class="form_col" for="dateArticle">Date de l'article : </label>
    <input type="text" name="dateArticle" readonly="" value='<?= $dateArticle ?>'>
    <br>
    <br>
    <label class="form_col" for="titre">Titre* : </label>
    <input type="text" id="titre" name="titre" value='<?= $titre ?>' onblur="indexDonnees(0, 1)">
    <span class="tooltip" id="tooltipTitre">Doit être compris entre 1 et 100 caractères</span>
    <br>
    <br>
    <label class="form_col" for="ville">Ville* : </label>
    <input type="text" id="ville" name="villeArticle" value='<?= $villeArticle ?>' onblur="indexDonnees(1, 1)">
    <span class="tooltip" id="tooltipVille">Doit être compris entre 1 et 50 caractères</span>
    <br>
    <br>
    <label class="form_col" for="departement">Departement : </label>
    <input type="text" id="departement" name="departement" value='<?= $departement ?>' onblur="indexDonnees(2, 1)">
    <span class="tooltip" id="tooltipDepartement">Doit faire 2 caractéres</span>
    <br>
    <br>
    <label class="form_col" for="desArt" >Description* : </label>
    <input type="text" maxlength="10000" id='desArt'  name="descriptionArticle" value='<?= stripslashes($descriptionArticle) ?>' onblur="indexDonnees(3, 1)">
    <span class="tooltip" id="tooltipDescription">Doit être compris entre 1 et 10000 caractères</span>
    <br>
    <br>
    <label class="form_col" for="image">Image : </label>
    <input type="text" id="image" name="imageArticle" value='<?= $imageArticle ?>' onblur="indexDonnees(4, 1)">
    <span class="tooltip" id="tooltipImage">Doit être compris entre 1 et 100 caractères</span>
    <br>
    <br>
    <div>
        <input type='submit' value='Enregistrer' onclick="return validFormulaire()"/>
        <input type='reset' value="Réinitialiser le formulaire" />
        <input type='button' value='Retour' OnClick="window.location.href='index.php?action=gestion_article'" />
    </div>
    <br>
</form>
<script src="./js/article/modifier_article.js">
    
</script>
