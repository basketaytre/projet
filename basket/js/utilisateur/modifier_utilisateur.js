//Rassemble toutes les données pour pouvoir les réutiliser ensuite dans différentes fonctions
function indexDonnees(nb,choix)  {
    // choix == 0 : Renvoie le nombre de liste de données
    // choix == 1 : Renvoie à la vérification du champ
    let donnees=[
        // [nom_tooltip, id, min, max] 
        ['tooltipPseudonyme','pseudonyme',1,30],        // 0
        ['tooltipStatut','statut',1,30],                // 1
        ['tooltipNom','nom',1,50],                      // 2
        ['tooltipPrenom','prenom',1,50],                // 3
        ['tooltipAdresseMail','adresseMail',6,50],      // 4
        ['tooltipMdp','mdp',6,255],                      // 5
        ['tooltipTelephone','telephone',10,10],         // 6
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

//ERREUR MDP2
function validMdp() {
    var tooltipMdp2 = document.getElementById('tooltipMdp2');
    var mdp = document.getElementById('mdp');
    var mdp2 = document.getElementById('mdp2');
    if (mdp.value == mdp2.value) {
        mdp2.className = 'correct';
        tooltipMdp2.style.display = 'none';
        return true;
    } else {
        mdp2.className = 'incorrect';
        tooltipMdp2.style.display = 'inline-block';
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



