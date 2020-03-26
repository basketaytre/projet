//Rassemble toutes les données pour pouvoir les réutiliser ensuite dans différentes fonctions
function indexDonnees(nb,choix)  {
    // choix == 0 : Renvoie le nombre de liste de données
    // choix == 1 : Renvoie à la vérification de la taille du champ
    // choix == 2 : Renvoie à la vérification du choix d'un bouton radio
    let donnees=[
        // [nom_tooltip, id, min, max] 
        ['tooltipIdArticle','idArti',0,0],                   // 0
        ['tooltipIdSponsor','idSponso',0,0],                   // 1
        ['tooltipTypeDon','typeDon',1,1000],                    // 2
        ['tooltipMontant','montant',1,10000]                    // 3
    ];
    if (choix==0){
        return donnees.length;
    }
    if (choix==1 || choix==2){
        return verifChamp(donnees[nb][0],donnees[nb][1],donnees[nb][2],donnees[nb][3], choix);
    }

}

// ERREUR taille de champ.
function verifChamp(toolName, name, min, max, chx) {
    // min : Nombre minimum de caractères que doit contenir le champ
    // max : Nombre maximum de caractères que doit contenir le champ
    var rep=false;
    var tooltipname = document.getElementById(toolName);
    var nom = document.getElementById(name);
    if (chx==2){
        if (nom.value != -1){
            rep=true;
        }
    }else{
        if ((nom.value.length >= min) && (nom.value.length <= max)) {
            rep=true;
        }
    }
    if (rep==true){
        nom.className = 'correct';
        tooltipname.style.display = 'none';
        return true;
    }else {
        nom.className = 'incorrect';
        tooltipname.style.display = 'inline-block';
        return false;
    }
}

// ERREUR formulaire
function validFormulaire() {
    var coderet = true;
    for (let i=0; i<indexDonnees(0,0); i++){
        // Si le champ est une liste déroulante
        if (i<=1){
            if (indexDonnees(i,2)==false){
            coderet =false;
            }
        }
        // Si c'est un champ à remplir
        else{
            if (indexDonnees(i,1)==false){
                coderet =false;
            }
        }
            
    }
    return coderet;
}

