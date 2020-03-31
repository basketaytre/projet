<!-------------------------------------------------------Page d'affichage de profil---------------------------------------------------------------->
<div class="mr-5 ml-5">
    <!--Fond gris-->
    <div class="my-3 p-3 rounded box-shadow mr-5 ml-5" style="background-color: #ededed;">
        <!--Fond noir titre-->
        <div class="rounded text-center text-white p-3 m-3 mt-2 bg-dark">
            <h1><i>Bienvenue sur votre profil</i></h1>
        </div>
        <!--Fond orande sous-titre-->
        <div class="rounded text-center text-white p-3 m-3 mt-5 bg-orange" >
            <h1 style="font-size:2em;"><i>Vos Informations</i></h1>
        </div>
        <!--Fond blanc-->
        <div class="ml-5 mr-5 mt-5 border rounded shadow-sm  mb-4 bg-white ">
            <h5>
                <br>
                <!-- Pseudonyme -->
                <div>
                    <label class="form_col" for="pseudonyme">Pseudonyme : </label>
                    <span><?php echo $_SESSION['pseudonyme'] ?></span>
                </div>
                <br>
                <!-- statut -->
                <div>
                    <label class="form_col" for="statut">Statut : </label>
                    <span><?php echo $_SESSION['statut'] ?></span>
                </div>
                <br>
                <!-- Email -->
                <div>
                    <label class="form_col" for="email">Email : </label>
                    <span><?php echo $_SESSION['email'] ?></span>
                </div>
                <br>
                <!-- Nom -->
                <div>
                    <label class="form_col" for="nom">Nom : </label>
                    <span><?php echo $_SESSION['nom'] ?></span>
                </div>
                <br>
                <!-- Prenom -->
                <div>
                    <label class="form_col" for="prenom">Prenom : </label>
                    <span><?php echo $_SESSION['prenom'] ?></span>
                </div>
                <br>
                <!-- Telephone -->
                <div>
                    <label class="form_col" for="telephone">Telephone : </label>
                    <span><?php echo $_SESSION['telephone'] ?></span>
                </div>
                <br>
            </h5>
        </div>
    </div>
</div>
<!-------------------------------------------------------Fin de la page d'affichage du profil---------------------------------------------------------------->
