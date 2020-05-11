<!-------------------------------------------------------Page d'affichage de tdrofil---------------------------------------------------------------->
<div class="mx-5 my-5">
    <!--Fond gris-->
    <div class="my-3 p-3 rounded box-shadow mx-5" style="background-color: #ededed;">
        <!--Fond noir titre-->
        <div class="rounded text-center text-white p-3 m-3 mt-2 bg-dark">
            <h1><i>Bienvenue sur votre profil</i></h1>
        </div>
        <!--Fond orande sous-titre-->
        <div class="rounded text-center text-white p-3 m-3 mt-5 bg-orange" >
            <h1 style="font-size:2em;"><i>Mes Informations</i></h1>
        </div>
        <!--Fond blanc-->
        <div class="mx-5 mt-5 border rounded shadow-sm  mb-4 bg-white" >
            <!-- Pseudonyme -->
            <div class="py-5">
                <table class="mx-auto" style="border-spacing : 20px;border-collapse : separate;">

                    <tr class="">
                        <td class="text-right "><strong>Pseudonyme :</strong></td>
                        <td class="pl-3">  <?= $_SESSION['pseudonyme'] ?></td>
                    </tr>
                    <!-- statut -->
                    <tr>
                        <td class="text-right"><strong>Statut :</strong> </td>
                        <td class="pl-3"><?= $_SESSION['statut'] ?></td>
                    </tr>
                    <!-- Email -->
                    <tr>
                        <td class="text-right"><strong>Email :</strong> </td>
                        <td class="pl-3"><?= $_SESSION['email'] ?></td>

                    </tr>
                    <!-- Nom -->
                    <tr>
                        <td class="text-right"><strong>Nom :</strong> </td>
                        <td class="pl-3"><?= $_SESSION['nom'] ?></td>

                    </tr>
                    <!-- Prenom -->
                    <tr>
                        <td class="text-right"><strong>Prénom :</strong></td>
                        <td class="pl-3"> <?= $_SESSION['prenom'] ?></td>
                    </tr>
                    <!-- Telephone -->
                    <tr>
                        <td class="text-right"><strong>Telephone : </td>
                        <td class="pl-3"><?= $_SESSION['telephone'] ?></td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>
<!--------------Fin de la page d'affichage du tdrofil-------------------------->
