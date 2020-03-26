<?php
    
    if(isset($_POST['formconnect'])){
        if(!empty($emailconnect) && !empty($mdpconnect)){
            $requete = "select * from utilisateur where adresseMail = '$emailconnect'";
            $resultats->exec($requete);
            $lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
            if($lignes == true){
                $hasspass = $lignes['mdp'];
                if(password_verify($mdpconnect,$hasspass)){
                    echo "le mot de passe est bon";
                }
                else{
                    echo "le mot de passe n'est pas bon";
                    $_SESSION['emailconnect']= $lignes['adresseMail'];
                }
            }
            else{
                echo "l'email '$emailconnect' n'existe pas";
            }
        }
        else{
            echo"Veuillez completer l'ensemble des champs";
        }
    }

?>
<div class="text-center p-5" action="index.php?action=connexion_utilisateur">
    <form  class="form-connexion pt-5 pb-5">
        <img src="images/logo_mini.PNG">
        <h1 class="pb-3">Se connecter</h1>
        <label for="champsemail" class="sr-only">Email address</label>
        <input type="email" name="emailconnect" id="emailconnect" class="form-control" placeholder="Adresse-mail" required="" autofocus="">
        <label for="champsmdp" class="sr-only">Mot de passe</label>
        <input type="password" name="mdpconnect" id="mdpconnect" class="form-control" placeholder="Mot de passe" required="" autofocus="">
        <button class="btn btn-lg btn-primary btn-block mt-4" type="submit" name="formconnect">Connexion</button>
    </form>
</div>
