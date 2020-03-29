<?php
$idArticle = '';
$dateArticle = '';
$titre = '';
$descriptionArticle = '';
$resumeArticle = '';
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
    $resumeArticle = $ligne['resumeArticle'];
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
    if (isset($_POST["descriptArticle"])) {
        $descriptionArticle = $_POST["descriptArticle"];
    }
    if (isset($_POST["resumeArticle"])) {
        $resumeArticle = addslashes($_POST["resumeArticle"]);
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
    if (((strlen($resumeArticle)) > 400) || (strlen($resumeArticle)) < 1) {
        $donneeErreur = $donneeErreur . "- Résumé invalide <br>";
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
        $descriptionArticle = addslashes($descriptionArticle);
        $requete = "update article set titre='$titre',descriptionArticle='$descriptionArticle', imageArticle='$imageArticle', villeArticle='$villeArticle', departement='$departement', resumeArticle='$resumeArticle' where idArticle='$idArticle'";
        $connexion->exec($requete);
        $message = "<div class='alert alert-success'><strong>Traitement effectué !</strong> Votre modification à bien été prise en compte .</div>";
    }
}
?>
<div>
    <?= $message ?>
</div>
<div class="mr-5 ml-5">
    <div class="my-3 p-3 rounded box-shadow mr-5 ml-5" style="background-color: #ededed;">

        <div class="rounded text-center text-white p-3 m-3 mt-5 bg-orange" >
            <h1 style="font-size:2em;"><i>Modifier un article</i></h1>
        </div>
        <form  name="monForm" method="post" action="index.php?action=modifier_article&valide=ok&texte=ok" >
            <div class='mt-5'>
                <label class="form_col" for="idArticle">ID Article : </label>
                <input type="text" name="idArticle" class="bg-grey" readonly="" value='<?= $idArticle ?>'>
                <br>
                <br>
                <label class="form_col" for="dateArticle">Date de l'article : </label>
                <input type="text" name="dateArticle" readonly="" class="bg-grey" value='<?= $dateArticle ?>'>
                <br>
                <br>
                <hr class="hrp" style='background-color:grey;'>
                <br>
                <br>
                <label class="form_col" for="titre">Titre<span class="important">*</span> : </label>
                <input type="text" id="titre" name="titre" value='<?= $titre ?>' onblur="indexDonnees(0, 1)">
                <span class="tooltip" id="tooltipTitre">Doit être compris entre 1 et 100 caractères</span>
                <br>
                <br>
                <label class="form_col" for="ville">Ville<span class="important">*</span> : </label>
                <input type="text" id="ville" name="villeArticle" value='<?= $villeArticle ?>' onblur="indexDonnees(1, 1)">
                <span class="tooltip" id="tooltipVille">Doit être compris entre 1 et 50 caractères</span>
                <br>
                <br>
                <label class="form_col" for="departement">Departement : </label>
                <input type="text" id="departement" name="departement" value='<?= $departement ?>' onblur="indexDonnees(2, 1)">
                <span class="tooltip" id="tooltipDepartement">Doit faire 2 caractères</span>
                <br>
                <br>
                <label class="form_col" for="resume">Résumé : </label>
                <textarea id="resume" name="resumeArticle" onblur="indexDonnees(3, 1)"  style='width:400px;' ><?= stripslashes($resumeArticle) ?> </textarea>
                <span class="tooltip" id="tooltipResume">Doit faire entre 2 et 400 caractères</span>
                <br>
                <br>
                <label class="form_col" for="image">Image de présentation : </label>
                <input type="text" id="image" name="imageArticle" value='<?= $imageArticle ?>' onblur="indexDonnees(4, 1)">
                <span class="tooltip" id="tooltipImage">Doit être compris entre 1 et 100 caractères</span>
                <br>
                <br>
                <div class="row m-0">
                    <div class="col-lg-12 p-5">
                        <textarea id='summernote' name='descriptArticle' >
                <p><?= $descriptionArticle ?></p>
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="row m-0">
                <div class="col-lg-4 offset-1">
                    <input type="submit" value="Enregistrer" class="bouton-design rounded" OnClick="return validFormulaire()">
                    <input type='reset' value="Réinitialiser le formulaire"  class="bouton-design rounded" style="width:200px;"/>
                    <input type='button' value='Retour' class="bouton-design rounded" OnClick="window.location.href = 'index.php?action=gestion_article'" />
                </div>
            </div>
            <br>
        </form>
    </div>
</div>
<script src="./js/article/verif_article.js"></script>
</script>
