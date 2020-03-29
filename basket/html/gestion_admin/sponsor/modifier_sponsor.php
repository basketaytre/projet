<?php
$idSponsor = '';
$nom = '';
$adresse = '';
$ville = '';
$codePostal = 0;
$telephone = '';
$lien = '';
$description = '';
$image = '';
$message = '';
$succes = '';
$donneeErreur = '';
$valide = '';

if (isset($_GET['idSponsor'])) {
    $idSponsor = $_GET['idSponsor'];
    $requete = "select idSponsor, nom, adresse, ville, codePostal, telephone, lien, description, image from sponsor where idSponsor='$idSponsor'";
    $resultats = $connexion->query($requete);
    $lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
    $ligne = $lignes[0];
    $nom = $ligne['nom'];
    $adresse = $ligne['adresse'];
    $ville = $ligne['ville'];
    $codePostal = $ligne['codePostal'];
    $telephone = $ligne['telephone'];
    $lien = $ligne['lien'];
    $description = $ligne['description'];
    $image = $ligne['image'];
}
if (isset($_GET['valide'])) {
    $idSponsor = $_POST['idSponsor'];
    if (isset($_POST["nom"])) {
        $nom = $_POST["nom"];
    }
    if (isset($_POST["adresse"])) {
        $adresse = $_POST["adresse"];
    }
    if (isset($_POST["ville"])) {
        $ville = $_POST["ville"];
    }
    if (isset($_POST["codePostal"])) {
        $codePostal = $_POST["codePostal"];
    }
    if (isset($_POST["telephone"])) {
        $telephone = $_POST["telephone"];
    }
    if (isset($_POST["lien"])) {
        $lien = $_POST["lien"];
    }
    if (isset($_POST["description"])) {
        $description = $_POST["description"];
    }
    if (isset($_POST["image"])) {
        $image = $_POST["image"];
    }
    if ((strlen($codePostal)) != 5) {
        $donneeErreur = $donneeErreur . "- Code postal invalide,<br>";
    }
    if (strlen(preg_replace('/\s/', '', $telephone)) != 10) {
        $donneeErreur = $donneeErreur . "- Numero de téléphone invalide, <br>";
    }
    if (((strlen($nom)) > 70) || (strlen($nom)) < 1) {
        $donneeErreur = $donneeErreur . "- Nom invalide, <br>";
    }
    if (((strlen($adresse)) > 50) || (strlen($adresse)) < 1) {
        $donneeErreur = $donneeErreur . "- Adresse invalide, <br>";
    }
    if (((strlen($ville)) > 50) || (strlen($ville)) < 1) {
        $donneeErreur = $donneeErreur . "- Ville invalide, <br>";
    }
    if (((strlen($lien)) > 70) || (strlen($lien)) < 1) {
        $donneeErreur = $donneeErreur . "- Lien sponsor invalide, <br>";
    }
    if (((strlen($description)) > 1000) || (strlen($description)) < 1) {
        $donneeErreur = $donneeErreur . "- Description invalide, <br>";
    }
    if (((strlen($image)) > 750) || (strlen($image)) < 1) {
        $donneeErreur = $donneeErreur . "- Image invalide, <br>";
    }
    if ($donneeErreur != '') {
        $message = "<div onload='validForm()' class='alert alert-danger'><strong>Erreur !</strong> Le sponsor n'a pas pu être modifié.<br> $donneeErreur </div>";
    }
    if ($donneeErreur == '') {
        $telephone = (preg_replace('/\s/', '', $telephone));
        $requete = "update sponsor set nom='$nom',adresse='$adresse',ville='$ville',codePostal='$codePostal',telephone='$telephone',lien='$lien',description='$description',image='$image' where idSponsor='$idSponsor'";
        $connexion->exec($requete);
        $message = "<div class='alert alert-success'><strong>Traitement effectué !</strong> Votre modification à bien été prise en compte .</div>";
    }
}
?>
<!-------------------------------------------------------Page de modification de sponsors---------------------------------------------------------------->
<div>
    <?= $message ?>
</div>
<div class="mr-5 ml-5">
    <div class="my-3 p-3 rounded box-shadow mr-5 ml-5" style="background-color: #ededed;">
        <div class="rounded text-center text-white p-3 m-3 mt-5 bg-orange mb-5" >
            <h1 style="font-size:2em;"><i>Modifier un sponsor</i></h1>
        </div>
        <!-- Formulaire de modification de sponsors -->
        <form  name="monForm" method="post" action="index.php?action=modifier_sponsor&valide=ok">

            <br>
            <br>
            <!-- Champ id sponsor -->
            <label class="form_col" for="idsponsor">ID Sponsor : </label>
            <input type="text" class="bg-grey" name="idSponsor" readonly="" value='<?= $idSponsor ?>'>
            <br>
            <br>
            <hr class="hrp" style='background-color:grey;'>
            <br>
            <br>
            <!-- Champ nom -->
            <label class="form_col" for="nom">Nom<span class="important">*</span> : </label>
            <input name="nom" id="nom" type="text" value='<?= $nom ?>' onblur="indexDonnees(0, 1)">
            <span class="tooltip" id="tooltipNom">Doit être compris entre 1 et 70 caractères</span>
            <br>
            <br>
            <!-- Champ adresse-->
            <label class="form_col" for="adresse">Adresse<span class="important">*</span> : </label>
            <input type="text" id="adresse" name="adresse" value='<?= $adresse ?>' onblur="indexDonnees(1, 1)">
            <span class="tooltip" id="tooltipAdresse">Doit être compris entre 1 et 50 caractères</span>
            <br>
            <br>
            <!-- Champ ville-->
            <label class="form_col" for="ville">Ville<span class="important">*</span> : </label> 
            <input type="text" id="ville" name="ville" value='<?= $ville ?>' onblur="indexDonnees(2, 1)">
            <span class="tooltip" id="tooltipVille">Doit être compris entre 1 et 50 caractères</span>
            <br>
            <br>
            <!-- Champ codepostal-->
            <label class="form_col" for="codePostal">Code Postal<span class="important">*</span> : </label>
            <input type="text" id="codePost" name="codePostal" value='<?= $codePostal ?>' onblur="indexDonnees(3, 1)">
            <span class="tooltip" id="tooltipCodePost">Doit faire 5 caractéres</span>
            <br>
            <br>
            <!-- Champ telephone-->
            <label class="form_col" for="telephone">Téléphone<span class="important">*</span> : </label> 
            <input type="text" id="telephone" name="telephone" value='<?= $telephone ?>' onblur="indexDonnees(4, 1)">
            <span class="tooltip" id="tooltipTelephone">Doit faire 10 caractéres</span>
            <br>
            <br>
            <!-- Champ lien sponsors-->
            <label class="form_col" for="lien">Lien sponsor<span class="important">*</span> : </label> 
            <input type="text" id="lien" name="lien" value='<?= $lien ?>' onblur="indexDonnees(5, 1)">
            <span class="tooltip" id="tooltipLien">Doit être compris entre 1 et 70 caractères</span>
            <br>
            <br>
            <!-- Champ description-->
            <label class="form_col" for="description">Description<span class="important">*</span> : </label>
            <input type="text" id="description" name="description" value='<?= $description ?>' onblur="indexDonnees(6, 1)">
            <span class="tooltip" id="tooltipDescription">Doit être compris entre 1 et 750 caractères</span>
            <br>
            <br>
            <!-- Champ lien image -->
            <label class="form_col" for="lienimage">Lien image<span class="important">*</span> : </label>
            <input type="text" id="image" name="image" value='<?= $image ?>' onblur="indexDonnees(7, 1)">
            <span class="tooltip" id="tooltipImage">Doit être compris entre 1 et 750 caractères</span>
            <br>
            <br>
            <!-- Bouton -->
            <div class="row m-0">
                <div class="col-lg-4 offset-1">
                    <input type="submit" value="Enregistrer" class="bouton-design rounded" OnClick="return validFormulaire()">
                    <input type='reset' value="Réinitialiser le formulaire"  class="bouton-design rounded" style="width:200px;"/>
                    <input type='button' value='Retour' class="bouton-design rounded" OnClick="window.location.href = 'index.php?action=gestion_sponsor'" />
                </div>
            </div>
            <br>
        </form>
    </div>
</div>
<!-- Fin du formulaire de modification de sponsors -->
<script src="./js/sponsor/verif_sponsor.js"></script>
<!-------------------------------------------------------Fin de la page de modification de sponsors---------------------------------------------------------------->
