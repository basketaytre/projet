<?php
// si le formulaire a été soumis
if (isset($_POST['formconnect'])) {
    $emailconnect = $_POST["emailconnect"];
    $mdpconnect = $_POST["mdpconnect"];
    // si l'email et le mot de passe n'est pas vide
    if (!empty($emailconnect) && !empty($mdpconnect)) {
        // recherche de l'utilisateur qui possede l'email inscrit
        $requete = "select * from utilisateur where adresseMail = '$emailconnect'";
        // execution de la requette
        $resultat = $connexion->query($requete);
        // resultat de la requette inscrit dans un tableau associatif
        $lignes = $resultat->fetchAll(PDO::FETCH_ASSOC);
        // si trouver une ligne
        $valideConnexion = false;
        if ($lignes == true) {
            // recuperation du mot de passe associé au mail
            foreach ($lignes as $ligne) {
                $hasspass = $ligne['mdp'];
            }
            // comparaison du mot de passe crypté et de celui inscrit
            // si indentique
            if (password_verify($mdpconnect, $hasspass)) {
                $_SESSION['idUtilisateur'] = $ligne['idUtilisateur'];
                $_SESSION['pseudonyme'] = $ligne['pseudonyme'];
                $_SESSION['statut'] = $ligne['statut'];
                $_SESSION['nom'] = $ligne['nom'];
                $_SESSION['prenom'] = $ligne['prenom'];
                $_SESSION['email'] = $ligne['adresseMail'];
                $_SESSION['telephone'] = $ligne['telephone'];
                $valideConnexion = true;
                header("Location: index.php?action=mon_profil");
            }
        }
    }
}
?>
