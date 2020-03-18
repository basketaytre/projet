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
    $departement=preg_replace('/\s/', '', $departement);
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
        $descriptionArticle=stripslashes($descriptionArticle);
        echo $descriptionArticle;
    }
}
echo $descriptionArticle;
?>
<form  name="monForm" method="post" action="index.php?action=creer_article" >
    <br><br>
    <div>
        <?= $message ?>
    </div>
    <h1>Page de création d'article</h1>
    <p>Titre* : <input type="text" name="titre" value='<?= $titre ?>'  ></p>
    <p>Ville* : <input type="text" name="villeArticle" value='<?= $villeArticle ?>'  ></p>
    <p>Departement : <input type="text" name="departement" value='<?= $departement ?>'  ></p>
    <div><label for="desArt" >Description* : </label><input type="text" maxlength="10000" id='desArt'  name="descriptionArticle" value='<?= stripslashes($descriptionArticle) ?>'></div>
    <p>Image : <input type="text"  name="imageArticle" value='<?= $imageArticle ?>'  ><p/>
    <br>
    <div>
        <input type='submit' value='Enregistrer' />
    </div>
    <br>
</form>
<div>
    <input type='button' value='Retour' OnClick="window.location.href='index.php?action=gestion_article'" />
</div>
