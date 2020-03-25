<?php
    
    

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
