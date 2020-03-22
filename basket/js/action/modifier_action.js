//Rassemble toutes les données pour pouvoir les réutiliser ensuite dans différentes fonctions
function indexDonnees(nb,choix)  {
    // choix == 0 : Renvoie le nombre de liste de données
    // choix == 1 : Renvoie à la vérification du champ
    let donnees=[
        // [nom_tooltip, id, min, max] 
        ['tooltipIdArticle','idArticle',1,2],                   // 0
        ['tooltipIdSponsor','idSponsor',1,2],                   // 1
        ['tooltipTypeDon','typeDon',1,1000],                    // 2
        ['tooltipMontant','montant',1,10000],                   // 3
    ];
    if (choix==0){
        return donnees.length;
    }
    if (choix==1){
        return verifTaille(donnees[nb][0],donnees[nb][1],donnees[nb][2],donnees[nb][3]);
    }
}

// ERREUR taille de champ.
function verifTaille(toolName, name, min, max) {
    // min : Nombre minimum de caractères que doit contenir le champ
    // max : Nombre maximum de caractères que doit contenir le champ
    var tooltipname = document.getElementById(toolName);
    var nom = document.getElementById(name);
    if ((nom.value.length >= min) && (nom.value.length <= max)) {
        nom.className = 'correct';
        tooltipname.style.display = 'none';
        return true;
    } else {
        nom.className = 'incorrect';
        tooltipname.style.display = 'inline-block';
        return false;
    }
}

// ERREUR formulaire
function validFormulaire() {
    var coderet = true;
    for (let i=0; i<indexDonnees(0,0); i++){
        if (indexDonnees(i,1)==false){
        coderet =false;
        }
    }
    return coderet;
}

