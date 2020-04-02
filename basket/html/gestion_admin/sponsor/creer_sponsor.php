<?php
$nom = '';
$adresse = '';
$ville = '';
$codePostal = '';
$telephone = '';
$lien = '';
$description = '';
$image = '';
$message = '';
$donneeErreur = '';

if (isset($_POST['nom'])) {
    $nom = $_POST["nom"];
    $adresse = $_POST["adresse"];
    $ville = $_POST["ville"];
    $codePostal = $_POST["codePostal"];
    $telephone = $_POST["telephone"];
    $lien = ($_POST["lien"]);
    $description = ($_POST["description"]);
    $image = $_POST["image"];

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
        $message = "<div class='alert alert-danger'><strong>Erreur !</strong> Le sponsor n'a pas pu être créé .<br> $donneeErreur </div>";
    }
    if ($donneeErreur == '') {
        // suppresion des espace
        $telephone = (preg_replace('/\s/', '', $telephone));
        $requete = "insert into sponsor (nom,adresse,ville,codePostal,telephone,lien,description,image) values ('$nom','$adresse','$ville',$codePostal,$telephone,'$lien','$description','$image');";
        $message = "<div class='alert alert-success'><strong>Traitement effectué !</strong> Votre sponsor à bien été créé .</div>";
        $connexion->exec($requete);
    }
}
?>
<!-------------------------------------------------------Page de creation de sponsors---------------------------------------------------------------->
<!-- Formulaire de creation des sponsors -->
<form  name="monForm" method="post" action="index.php?action=creer_sponsor" >
    <div>
        <?= $message ?>
    </div>
    <div class="mr-5 ml-5">
        <div class="my-3 p-3 rounded box-shadow mr-5 ml-5" style="background-color: #ededed;">

            <div class="rounded text-center text-white p-3 m-3 mt-5 bg-orange mb-5" >
                <h1 style="font-size:2em;"><i>Créer un sponsor</i></h1>
            </div>
            <br>
            <br>
            <!-- Champ Nom -->
            <label class="form_col" for="nom">Nom<span class="important">*</span> : </label>
            <input name="nom" id="nom" type="text" value='<?= $nom ?>' onblur="indexDonnees(0, 1)">
            <span class="tooltip" id="tooltipNom">Doit être compris entre 1 et 70 caractères</span>
            <br>
            <br>
            <!-- Champ =Adresse -->
            <label class="form_col" for="adresse">Adresse<span class="important">*</span> : </label>
            <input type="text" id="adresse" name="adresse" value='<?= $adresse ?>' onblur="indexDonnees(1, 1)">
            <span class="tooltip" id="tooltipAdresse">Doit être compris entre 1 et 50 caractères</span>
            <br>
            <br>
            <!-- Champ Ville -->
            <label class="form_col" for="ville">Ville<span class="important">*</span> : </label> 
            <input type="text" id="ville" name="ville" value='<?= $ville ?>' onblur="indexDonnees(2, 1)">
            <span class="tooltip" id="tooltipVille">Doit être compris entre 1 et 50 caractères</span>
            <br>
            <br>
            <!-- Champ Code Postal -->
            <label class="form_col" for="codePostal">Code Postal<span class="important">*</span> : </label>
            <input type="text" id="codePost" name="codePostal" value='<?= $codePostal ?>' onblur="indexDonnees(3, 1)">
            <span class="tooltip" id="tooltipCodePost">Doit faire 5 caractéres</span>
            <br>
            <br>
            <!-- Champ Type de don -->
            <label class="form_col" for="telephone">Téléphone<span class="important">*</span> : </label> 
            <input type="text" id="telephone" name="telephone" value='<?= $telephone ?>' onblur="indexDonnees(4, 1)">
            <span class="tooltip" id="tooltipTelephone">Doit faire 10 caractéres</span>
            <br>
            <br>
            <!-- Champ Lien sponsor -->
            <label class="form_col" for="lien">Lien sponsor<span class="important">*</span> : </label> 
            <input type="text" id="lien" name="lien" value='<?= $lien ?>' onblur="indexDonnees(5, 1)">
            <span class="tooltip" id="tooltipLien">Doit être compris entre 1 et 70 caractères</span>
            <br>
            <br>
            <!-- Champ Description -->
            <label class="form_col" for="description">Description<span class="important">*</span> : </label>
            <textarea id="resume" name="description" onblur="indexDonnees(6, 1)"  style='width:400px;' ><?= $description ?> </textarea>
            <span class="tooltip" id="tooltipDescription">Doit être compris entre 1 et 750 caractères</span>
            <br>
            <br>
            <!-- Champ Lien Image -->
            <label class="form_col" for="lienimage">Lien image<span class="important">*</span> : </label>
            <input type="text" id="image" name="image" value='<?= $image ?>' onblur="indexDonnees(7, 1)">
            <span class="tooltip" id="tooltipImage">Doit être compris entre 1 et 750 caractères</span>
            <br>
            <br>
            <!-- Boutton -->
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
    <!--Fin du formulaire de creation des sponsors-->
    <script src="./js/sponsor/verif_sponsor.js"></script>
    <!-------------------------------------------------------Fin de la page de creation de sponsors---------------------------------------------------------------->
