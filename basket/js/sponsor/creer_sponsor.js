// ERREUR nom
function VerifNom() {
    var tooltipnom = document.getElementById('tooltipnom');
    var nom = document.getElementById("nom");
    if ((nom.value.length >= 1) && (nom.value.length <= 70)) {    
        nom.className = 'correct';
        tooltipnom.style.display = 'none';
        return true;
    }
    else {
        nom.className = 'incorrect';
        tooltipnom.style.display = 'inline-block';
        return false;
    }
}

// ERREUR adresse
function VerifAdresse() {
    var tooltipadresse = document.getElementById('tooltipadresse');
    var adresse = document.getElementById("adresse");
    if ((adresse.value.length >= 1) && (adresse.value.length <= 50)) {    
        adresse.className = 'correct';
        tooltipadresse.style.display = 'none';
        return true;
    } 
    else {
        adresse.className = 'incorrect';
        tooltipadresse.style.display = 'inline-block';
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

// ERREUR codepostal
function VerifCodePostal() {
    var tooltipcodepostal = document.getElementById('tooltipcodepostal');
    var codepostal = document.getElementById("codepostal");
    if ((codepostal.value.length == 5)) {    
        codepostal.className = 'correct';
        tooltipcodepostal.style.display = 'none';
        return true;
    } 
    else {
        codepostal.className = 'incorrect';
        tooltipcodepostal.style.display = 'inline-block';
        return false;
    }
}

// ERREUR telephone
function VerifTelephone() {
    var tooltiptelephone = document.getElementById('tooltiptelephone');
    var telephone = document.getElementById("telephone");
    if ((telephone.value.length == 10)) {    
        telephone.className = 'correct';
        tooltiptelephone.style.display = 'none';
        return true;
    } 
    else {
        telephone.className = 'incorrect';
        tooltiptelephone.style.display = 'inline-block';
        return false;
    }
}

// ERREUR liensponsors
function VerifLienSponsors() {
    var tooltipliensponsors = document.getElementById('tooltipliensponsors');
    var liensponsors = document.getElementById("liensponsors");
    if ((liensponsors.value.length >= 1) && (liensponsors.value.length <= 70)) {    
        liensponsors.className = 'correct';
        tooltipliensponsors.style.display = 'none';
        return true;
    } 
    else {
        liensponsors.className = 'incorrect';
        tooltipliensponsors.style.display = 'inline-block';
        return false;
    }
}

// ERREUR description
function VerifDescription() {
    var tooltipdescription = document.getElementById('tooltipdescription');
    var description = document.getElementById("description");
    if ((description.value.length >= 1) && (description.value.length <= 750)) {    
        description.className = 'correct';
        tooltipdescription.style.display = 'none';
        return true;
    } 
    else {
        description.className = 'incorrect';
        tooltipdescription.style.display = 'inline-block';
        return false;
    }
}

// ERREUR image
function VerifImage() {
    var tooltipimage = document.getElementById('tooltipimage');
    var image = document.getElementById("image");
    if ((image.value.length >= 1) && (image.value.length <= 750)) {    
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
function ValidFormCreerSponsors() {
    var coderet = true;
    VerifNom();
    if (VerifNom()==false){
        coderet =false;
    }
    VerifAdresse();
    if (VerifAdresse()==false){
        coderet =false;
    }
    VerifVille();
    if (VerifVille()==false){
        coderet =false;
    }
    VerifCodePostal();
    if (VerifCodePostal()==false){
        coderet =false;
    }
    VerifTelephone();
    if (VerifTelephone()==false){
        coderet =false;
    }
    VerifLienSponsors();
    if (VerifLienSponsors()==false){
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
