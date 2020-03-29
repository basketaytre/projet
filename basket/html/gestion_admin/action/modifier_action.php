<?php
$idSponsor = '';
$idArticle = '';
$typeDon = '';
$montant = 0;
$message = '';
$nom = '';
$donneeErreur = '';
$valide = '';
if (isset($_GET['idSponsor']) && isset($_GET['idArticle'])) {
    $idSponsor = $_GET['idSponsor'];
    $idArticle = $_GET['idArticle'];
// Récuperer le sponsor
    $requete = "select idSponsor,nom from sponsor where idSponsor='$idSponsor'";
    $resultats = $connexion->query($requete);
    $listeSponsors = $resultats->fetchALL(PDO::FETCH_ASSOC);
    $listeSponsor = $listeSponsors[0];
    $nom = $listeSponsor['nom'];

// Récupérer l'article
    $requete = "select idArticle,titre from article where idArticle='$idArticle'";
    $resultats = $connexion->query($requete);
    $listeArticles = $resultats->fetchALL(PDO::FETCH_ASSOC);
    $listeArticle = $listeArticles[0];
    $titre = $listeArticle['titre'];

    $requete = "select idArticle,idSponsor,typeDon,montant,date from action where idArticle='$idArticle'";
    $resultats = $connexion->query($requete);
    $lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
    $ligne = $lignes[0];
    $typeDon = $ligne['typeDon'];
    $montant = $ligne['montant'];
    $date = $ligne['date'];
}

if (isset($_GET['valide'])) {
    $titre = $_POST['titre'];
    $nom = $_POST['nom'];
    $idSponsor = $_POST['idSponsor'];
    $idArticle = $_POST['idArticle'];
//    
//    $requete = "select idArticle from article where titre='$titre'";
//    $resultats = $connexion->query($requete);
//    $listeArticles = $resultats->fetchALL(PDO::FETCH_ASSOC);
//    $listeArticle = $listeArticles[0];
//    $idArticle = $listeArticle['idArticle'];
//    

    if (isset($_POST["typeDon"])) {
        $typeDon = $_POST["typeDon"];
    }
    if (isset($_POST["montant"])) {
        $montant = $_POST["montant"];
    }
    $montant = (preg_replace('/\s/', '', $montant));
    if (((int) ($montant) < 1) || ((int) ($montant) > 100000) || (is_numeric($montant) == FALSE)) {
        $donneeErreur = $donneeErreur . "- Montant invalide,<br>";
    }
    if (((strlen($typeDon)) > 20) || (strlen($typeDon)) < 1) {
        $donneeErreur = $donneeErreur . "- Type de don invalide, <br>";
    }
    if ($donneeErreur != '') {
        $message = "<div class='alert alert-danger'><strong>Erreur !</strong> Le sponsor n'a pas pu être modifié.<br> $donneeErreur </div>";
    }
    if ($donneeErreur == '') {

        $requete = "update action set typeDon='$typeDon',montant='$montant' where idSponsor='$idSponsor' and idArticle='$idArticle'";
        $connexion->exec($requete);
        $message = "<div class='alert alert-success'><strong>Traitement effectué !</strong> Votre modification à bien été prise en compte .</div>";
    }
}
?>
<!-------------------------------------------------------Page de modification des action---------------------------------------------------------------->
<div>
    <?= $message ?>
</div>
<div class="mr-5 ml-5">
    <div class="my-3 p-3 rounded box-shadow mr-5 ml-5" style="background-color: #ededed;">

        <div class="rounded text-center text-white p-3 m-3 mt-5 bg-orange mb-5" >
            <h1 style="font-size:2em;"><i>Modifier une action</i></h1>
        </div>
        <!--Form
        <!--Formulaire de modification des action-->
        <form  name="monForm" method="post" action="index.php?action=modifier_action&valide=ok">

            <!-- Champ ID Article -->
            <label class="form_col" for="idArticle">ID Article<span class="important">*</span> : </label>
            <input type="text" name="idArticle" readonly="" style ="background-color: #ccc; width:50px;" value='<?= $idArticle ?>'>
            <br>
            <label class="form_col" for="titre">Article<span class="important">*</span> : </label>
            <input type="text" name="titre" readonly="" style ="background-color: #ccc;" value='<?= $titre ?>'>
            <br>
            <br>
            <!-- Champ ID Sponsors -->
            <label class="form_col" for="idSponsor">ID Sponsor<span class="important">*</span> : </label>
            <input type="text" name="idSponsor" readonly="" style ="background-color: #ccc; width:50px;" value='<?= $idSponsor ?>'>
            <br>
            <label class="form_col" for="nom">Sponsor<span class="important">*</span> : </label>
            <input type="text" name="nom" readonly="" style ="background-color: #ccc;" value='<?= $nom ?>'>
            <br>
            <br>
            <hr class="hrp" style="background-color: black;">
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
            <!-- Button -->
            <div class="row m-0">
                <div class="col-lg-4 offset-1">
                    <input type="submit" value="Enregistrer" class="bouton-design rounded" OnClick="return validFormulaire()">
                    <input type='reset' value="Réinitialiser le formulaire"  class="bouton-design rounded" style="width:200px;"/>
                    <input type='button' value='Retour' class="bouton-design rounded" OnClick="window.location.href = 'index.php?action=gestion_action'" />
                </div>
            </div>
            <br>
        </form>
        <!--Fin du formulaire de modification des action-->
    </div>
</div>
<script src="./js/action/modifier_action.js"></script>
<!-------------------------------------------------------Fin de la page de modification des action---------------------------------------------------------------->
