<?php
    $idSponsor='';
    $nom='';
    $adresse='';
    $ville='';
    $codePostal=0;
    $telephone='';
    $lien='';
    $description='';
    $image='';
    $message='';
    $succes='';
    $donneeErreur = '';
    $valide='';
    
    if (isset($_GET['idSponsor'])){
        $idSponsor=$_GET['idSponsor'];
        $requete="select idSponsor, nom, adresse, ville, codePostal, telephone, lien, description, image from sponsor where idSponsor='$idSponsor'";
        $resultats = $connexion->query($requete);
        $lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
        $ligne = $lignes[0];
        $nom=$ligne['nom'];
        $adresse=$ligne['adresse'];
        $ville=$ligne['ville'];
        $codePostal=$ligne['codePostal'];
        $telephone=$ligne['telephone'];
        $lien=$ligne['lien'];
        $description=$ligne['description'];
        $image=$ligne['image'];
    }
    if(isset($_GET['valide'])){
        $idSponsor=$_POST['idSponsor'];
        if(isset($_POST["nom"])){
            $nom=$_POST["nom"];
        }
        if(isset($_POST["adresse"])){
            $adresse=$_POST["adresse"];
        }
        if(isset($_POST["ville"])){
            $ville=$_POST["ville"];
        }
        if(isset($_POST["codePostal"])){
            $codePostal=$_POST["codePostal"];
        }
        if(isset($_POST["telephone"])){
            $telephone=$_POST["telephone"];
        }
        if(isset($_POST["lien"])){
            $lien=$_POST["lien"];
        }
        if(isset($_POST["description"])){
            $description=$_POST["description"];
        }
        if(isset($_POST["image"])){
            $image=$_POST["image"];
        }
        if ((strlen($codePostal)) != 5) {
            $donneeErreur = $donneeErreur . "- Code postal invalide,<br>";
        }
        if (((strlen($telephone)) > 15) || (strlen($telephone)) < 10) {
            $donneeErreur = $donneeErreur . - "Numero de téléphone invalide, <br>";
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
        if (((strlen($description)) > 750) || (strlen($description)) < 1) {
            $donneeErreur = $donneeErreur . "- Description invalide, <br>";
        }
        if (((strlen($image)) > 750) || (strlen($image)) < 1) {
            $donneeErreur = $donneeErreur . "- Image invalide, <br>";
        }
        if ($donneeErreur != '') {
            $message = "<div class='alert alert-danger'><strong>Erreur !</strong> Le sponsor n'a pas pu être modifié.<br> $donneeErreur </div>";
        }
        if ($donneeErreur==''){
            $requete="update sponsor set nom='$nom',adresse='$adresse',ville='$ville',codePostal='$codePostal',telephone='$telephone',lien='$lien',description='$description',image='$image' where idSponsor='$idSponsor'";
            $message="<div class='alert alert-success'><strong>Traitement effectué !</strong> Votre modification à bien été prise en compte .</div>";
            $connexion->exec($requete);
        }
    }
?>
<form  name="monForm" method="post" action="index.php?action=modifier_sponsor&valide=ok">
    <div>
        <?= $message ?>
    </div>
    <h1>Modification d'un sponsor</h1>
    <p>ID Sponsor : <input type="text" name="idSponsor" readonly="" value='<?= $idSponsor ?>'  ></p>
    <p>Nom* : <input type="text" name="nom" value='<?= $nom ?>'  ></p>
    <p>Adresse* : <input type="text" name="adresse" value='<?= $adresse ?>'   ></p>
    <p>Ville* : <input type="text" name="ville" value='<?= $ville ?>'  ></p>
    <p>Code Postal* : <input type="text" name="codePostal" value='<?= $codePostal ?>'   ></p>
    <p>Téléphone* : <input type="text" name="telephone" value='<?= $telephone ?>' </p>
    <p>Lien sponsor* : <input type="text" name="lien" value='<?= $lien ?>'  </p>
    <p>Description* : <input type="text" name="description" value='<?= $description ?>' ></p>
    <p>Lien image : <input type="text" name="image" value='<?= $image ?>'  </p>
    <br>
    <br>
    
    <div>
        <input type='submit' value='Enregistrer' />
    </div>
    <br>
</form>
    <div>
        <input type='submit' value='Annuler' OnClick="window.location.href='index.php?action=gestion_sponsor'"/>
    </div>
