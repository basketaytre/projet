// ERREUR titre
function VerifTitre() {
    var tooltiptitre = document.getElementById('tooltiptitre');
    var titre = document.getElementById("titre");
    if ((titre.value.length >= 1) && (titre.value.length <= 100)) {    
        titre.className = 'correct';
        tooltiptitre.style.display = 'none';
        return true;
    }
    else {
        titre.className = 'incorrect';
        tooltiptitre.style.display = 'inline-block';
        return false;
    }
}

// ERREUR ville
function VerifVille() {
    var tooltipville = document.getElementById('tooltipville');
    var ville = document.getElementById("ville");
    if ((ville.value.length >= 1) && (ville.value.length <= 50)) {    
        ville.className = 'correct';
        tooltipville.style.display = 'none';
        return true;
    }
    else {
        ville.className = 'incorrect';
        tooltipville.style.display = 'inline-block';
        return false;
    }
}

// ERREUR departement
function VerifDepartement() {
    var tooltipdepartement = document.getElementById('tooltipdepartement');
    var departement = document.getElementById("departement");
    if ((departement.value.length == 2)) {    
        departement.className = 'correct';
        tooltipdepartement.style.display = 'none';
        return true;
    } 
    else {
        departement.className = 'incorrect';
        tooltipdepartement.style.display = 'inline-block';
        return false;
    }
}

// ERREUR description
function VerifDescription() {
    var tooltipdescription = document.getElementById('tooltipdescription');
    var desArt = document.getElementById("desArt");
    if ((desArt.value.length >= 1) && (desArt.value.length <= 10000)) {    
        desArt.className = 'correct';
        tooltipdescription.style.display = 'none';
        return true;
    }
    else {
        desArt.className = 'incorrect';
        tooltipdescription.style.display = 'inline-block';
        return false;
    }
}

// ERREUR image
function VerifImage() {
    var tooltipimage = document.getElementById('tooltipimage');
    var image = document.getElementById("image");
    if ((image.value.length >= 1) && (image.value.length <= 50)) {    
        image.className = 'correct';
        tooltipimage.style.display = 'none';
        return true;
    }
    else {
        image.className = 'incorrect';
        tooltipimage.style.display = 'inline-block';
        return false;
    }
}

// ERREUR formulaire
function ValidFormModifierArticle() {
    var coderet = true;
    VerifTitre();
    if (VerifTitre()==false){
        coderet =false;
    }
    VerifVille();
    if (VerifVille()==false){
        coderet =false;
    }
    VerifDepartement();
    if (VerifDepartement()==false){
        coderet =false;
    }
    VerifDescription();
    if (VerifDescription()==false){
        coderet =false;
    }
    VerifImage();
    if (VerifImage()==false){
        coderet =false;
    }
    return coderet;
}
