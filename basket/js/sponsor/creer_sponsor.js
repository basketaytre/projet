function validform() {
    verifNom();
    
}

// ERREUR nom
function verifNom() {
    var tooltipnom = document.getElementById('tooltipnom');
    var nom = document.getElementById("nom");
    if ((nom.value.length >= 2) && (nom.value.length <= 70)) {    
        nom.className = 'correct';
        tooltipnom.style.display = 'none';
    } else {
        nom.className = 'incorrect';
        tooltipnom.style.display = 'inline-block';
    }
}