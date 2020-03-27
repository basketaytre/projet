<?php
$titre = '';
$villeArticle = '';
$departement = '';
$descriptionArticle = '';
$resumeArticle = '';
$imageArticle = '';
$message = '';
$donneeErreur = '';

if (isset($_POST['titre']) && isset($_POST["descriptArticle"])) {
    $titre = $_POST["titre"];
    $villeArticle = $_POST["villeArticle"];
    $departement = $_POST["departement"];
    $departement = preg_replace('/\s/', '', $departement);
    $descriptionArticle = $_POST["descriptArticle"];
    $resumeArticle = addslashes($_POST["resumeArticle"]);
    $imageArticle = ($_POST["imageArticle"]);
    $requete = "insert into article (titre,dateArticle,villeArticle,departement,descriptionArticle,resumeArticle,imageArticle) values ('$titre',NOW(),'$villeArticle','$departement','$descriptionArticle','$resumeArticle'";

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
    if (((strlen($resumeArticle)) > 400) || (strlen($resumeArticle)) < 2) {
        $donneeErreur = $donneeErreur . "- Résumé invalide, <br>";
    }
    if (((strlen($imageArticle)) > 500) || (strlen($imageArticle)) < 1) {
        if ((strlen($imageArticle)) > 500) {
            $donneeErreur = $donneeErreur . "- Image invalide, <br>";
        } else {
            $requete = $requete . "NULL);";
        }
    } else {
        $requete = $requete . ",'$imageArticle');";
    }

    if ($donneeErreur != '') {
        $message = "<div class='alert alert-danger'><strong>Erreur !</strong> L'article n'a pas pu être créé .<br> $donneeErreur </div>";
    }
    if ($donneeErreur == '') {
        $message = "<div class='alert alert-success'><strong>Traitement effectué !</strong> Votre sponsor à bien été créé .</div>";
        $connexion->exec($requete);
        $resumeArticle = stripslashes($resumeArticle);
    }
}
?>
<div>
    <?= $message ?>
</div>
<br>
<div class="rounded text-center text-white p-3 m-3 mt-5 bg-orange mb-5" >
    <h1 style="font-size:2em;"><i>Créer un article</i></h1>
</div>
<form  name="monForm" method="post" action="index.php?action=creer_article&texte=ok" >

    <br>
    <label class="form_col" for="titre">Titre de l'article<span class="important">*</span> : </label>
    <input type="text" id="titre" name="titre" value='<?= $titre ?>' onblur="indexDonnees(0, 1)">
    <span class="tooltip" id="tooltipTitre">Doit être compris entre 1 et 100 caractères</span>
    <br>
    <br>
    <label class="form_col" for="ville">Ville<span class="important">*</span> : </label>
    <input type="text" id="ville" name="villeArticle" value='<?= $villeArticle ?>' onblur="indexDonnees(1, 1)">
    <span class="tooltip" id="tooltipVille">Doit être compris entre 1 et 50 caractères</span>
    <br>
    <br>
    <label class="form_col" for="departement">Département : </label>
    <input type="text" id="departement" name="departement" value='<?= $departement ?>' onblur="indexDonnees(2, 1)">
    <span class="tooltip" id="tooltipDepartement">Doit faire 2 caractères</span>
    <br>
    <br>
    <label class="form_col" for="resume">Résumé : </label>
    <textarea id="resume" name="resumeArticle" onblur="indexDonnees(3, 1)"  style='width:400px;' ><?= $resumeArticle ?> </textarea>
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
    <div class="row m-0">
        <div class="col-lg-4 offset-1">
            <input type="submit" value="Enregistrer" class="bouton-design rounded" OnClick="return validFormulaire()">
            <input type='reset' value="Réinitialiser le formulaire"  class="bouton-design rounded" style="width:200px;"/>
            <input type='button' value='Retour' class="bouton-design rounded" OnClick="window.location.href = 'index.php?action=gestion_article'" />
        </div>
    </div>
    <br>

</form>



<script src="./js/article/verif_article.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>
<script>
                $(document).ready(function () {
                    $('#summernote').summernote({
                        height: 400
                    });
                });
</script>


