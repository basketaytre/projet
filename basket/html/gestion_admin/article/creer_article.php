<?php
$titre = '';
$villeArticle = '';
$departement = '';
$descriptionArticle = '';
$imageArticle = '';
$message = '';
$donneeErreur = '';

if (isset($_POST['titre'])) {
    $titre = $_POST["titre"];
    $villeArticle = $_POST["villeArticle"];
    $departement = $_POST["departement"];
    $departement = preg_replace('/\s/', '', $departement);
    $descriptionArticle = addslashes($_POST["descriptionArticle"]);
    $imageArticle = ($_POST["imageArticle"]);
    $requete = "insert into article (titre,dateArticle,villeArticle,departement,descriptionArticle,imageArticle) values ('$titre',NOW(),'$villeArticle','$departement','$descriptionArticle',";

    if (((strlen($titre)) > 100) || ((strlen($titre)) < 1)) {
        $donneeErreur = $donneeErreur . "- Titre invalide,<br>";
    }
    if (((strlen($villeArticle)) > 50) || (strlen($villeArticle)) < 1) {
        $donneeErreur = $donneeErreur . "- Ville invalide, <br>";
    }
    if ((strlen(preg_replace('/\s/', '', $departement))) != 2) {
        $donneeErreur = $donneeErreur . "- Département invalide, <br>";
    }
    if (((strlen($descriptionArticle)) > 10000) || (strlen($descriptionArticle)) < 2) {
        $donneeErreur = $donneeErreur . "- Description invalide, <br>";
    }
    if (((strlen($imageArticle)) > 500) || (strlen($imageArticle)) < 1) {
        if ((strlen($imageArticle)) > 500) {
            $donneeErreur = $donneeErreur . "- Image invalide, <br>";
        } else {
            $requete = $requete . "NULL);";
        }
    } else {
        $requete = $requete . "'$imageArticle');";
    }

    if ($donneeErreur != '') {
        $message = "<div class='alert alert-danger'><strong>Erreur !</strong> L'article n'a pas pu être créé .<br> $donneeErreur </div>";
    }
    if ($donneeErreur == '') {

        $message = "<div class='alert alert-success'><strong>Traitement effectué !</strong> Votre sponsor à bien été créé .</div>";
        $connexion->exec($requete);
        $descriptionArticle = stripslashes($descriptionArticle);
    }
}
?>
<form  name="monForm" method="post" action="index.php?action=creer_article" >
    <div>
        <?= $message ?>
    </div>
    <h1>Page de création d'article</h1>
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
    <div class="row m-0">
        <div class="col-lg-4 offset-1">
        <input type="submit" value="Enregistrer" class="bouton-design rounded" OnClick="return validFormulaire()">
                <input type='reset' value="Réinitialiser le formulaire"  class="bouton-design rounded" style="width:200px;"/>
        <input type='button' value='Retour' class="bouton-design rounded" OnClick="window.location.href = 'index.php?action=gestion_article'" />
        </div>

    </div>
    <br>
</form>
<script src="./js/article/creer_article.js">

</script>


