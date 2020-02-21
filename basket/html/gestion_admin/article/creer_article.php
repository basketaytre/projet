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
    $departement = intval($_POST["departement"]);
    $descriptionArticle = $_POST["descriptionArticle"];
    $imageArticle = ($_POST["imageArticle"]);
    $requete = "insert into article (titre,dateArticle,villeArticle,departement,descriptionArticle,imageArticle) values ('$titre',NOW(),'$villeArticle','$departement','$descriptionArticle',";
    if (((strlen($titre)) > 100) || ((strlen($titre)) < 1)) {
        $donneeErreur = $donneeErreur . "Titre invalide,<br>";
    }
    if (((strlen($villeArticle)) > 50) || (strlen($villeArticle)) < 1) {
        $donneeErreur = $donneeErreur . "Ville invalide, <br>";
    }
    if ((strlen($departement)) <> 5) {
        $donneeErreur = $donneeErreur . "Département invalide, <br>";
    }
    if (((strlen($descriptionArticle)) > 10000) || (strlen($descriptionArticle)) < 1) {
        $donneeErreur = $donneeErreur . "Description invalide, <br>";
    }
    if (((strlen($imageArticle)) > 500) || (strlen($imageArticle)) < 1) {
        if ((strlen($imageArticle)) > 500) {
            $donneeErreur = $donneeErreur . "Image invalide, <br>";
        } else {
            $requete = $requete . "NULL);";
        }
    } else {
        $requete = $requete . "'$imageArticle');";
    }

    if ($donneeErreur != '') {
        $message = "Erreur,<br>" . $donneeErreur;
    }
    if ($donneeErreur == '') {
        echo $requete;
        $connexion->exec($requete);
        $message = 'Traitement effectué';
    }
}
?>
<form  name="monForm" method="post" action="index.php?action=creer_article" >
    <h1>Page de création d'article</h1>
    <p>Titre* : <input type="text" name="titre" value='<?= $titre ?>'  ></p>
    <p>Ville* : <input type="text" name="villeArticle" value='<?= $villeArticle ?>'  ></p>
    <p>Departement : <input type="text" name="departement" value='<?= $departement ?>'  ></p>
    <p>Description* : <input type="text" name="descriptionArticle" value='<?= $descriptionArticle ?>'  ><p/>
    <p>Image : <input type="text" name="imageArticle" value='<?= $imageArticle ?>'  ><p/>
    <br>
    <strong><?= $message ?></strong>
    <div>
        <input type='submit' value='Enregistrer' />
    </div>
    <br>
</form>