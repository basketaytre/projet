<?php
$idArticle = '';
$dateArticle = 0;
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
    <br><br>
    <div>
        <?= $message ?>
    </div>
    <h1>Page de modification d'article</h1>
    <p>ID Article : <input type="text" name="idArticle" readonly="" value='<?= $idArticle ?>'  ></p>
    <p>Date Article : <input type="text" name="dateArticle" readonly="" value='<?= $dateArticle ?>'  ></p>
    <p>Titre* : <input type="text" name="titre" value='<?= $titre ?>'  ></p>
    <p>Ville* : <input type="text" name="villeArticle" value='<?= $villeArticle ?>'  ></p>
    <p>Departement : <input type="text" name="departement" value='<?= $departement ?>'  ></p>
    <p>Description* : <input type="text" name="descriptionArticle" value="<?= stripcslashes($descriptionArticle) ?>"  ><p/>
    <p>Image : <input type="text" name="imageArticle" value='<?= $imageArticle ?>'  ><p/>
    <br>
    <div>
        <input type='submit' value='Enregistrer' />
    </div>
    <br>
</form>
<div>
    <input type='submit' value='Retour' OnClick="window.location.href = 'index.php?action=gestion_article'"/>
</div>

