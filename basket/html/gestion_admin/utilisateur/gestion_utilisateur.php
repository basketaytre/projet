<?php
$message = '';
if (isset($_GET['idUtilisateur'])) {
    $idUtilisateur = $_GET['idUtilisateur'];
    $requete = "delete from utilisateur where idUtilisateur='$idUtilisateur'";
    $connexion->exec($requete);
    $message = "<div class='alert alert-warning'><strong>Traitement effectué !</strong> Un utilisateur a été supprimé .</div>";
}
$requete = "select idUtilisateur,statut,pseudonyme,nom,prenom,adresseMail,anonyme from utilisateur";
//Exécution de  la requête qui renvoie le résultat dans  $resultats, 
$resultats = $connexion->query($requete);
//On récupère toutes les lignes de la table dans la variable $lignes qui est un tableau associatif
$lignes = $resultats->fetchALL(PDO::FETCH_ASSOC);
$cpt = 0;
foreach ($lignes as $ligne) {
    $utilisateur[$cpt] = [$ligne['idUtilisateur'], $ligne['statut'], $ligne['pseudonyme'], $ligne['nom'], $ligne['prenom'], $ligne['adresseMail'], $ligne['anonyme']];
    if ($utilisateur[$cpt][6] == 1) {
        $utilisateur[$cpt][6] = 'oui';
        $utilisateur[$cpt][3] = '...';
    } else {
        $utilisateur[$cpt][6] = 'non';
    }
    $cpt = $cpt + 1;
}
$nbUtilisateur = count($utilisateur);
?>
<!-------------------------------------------------------Page d'affichage d'utilisateur---------------------------------------------------------------->
<div>
    <?= $message ?>
</div>
<br>
<div class="rounded text-center text-white p-3 m-3 mt-5 bg-orange" >
    <h1 style="font-size:2em;"><i>Gestion des utilisateurs</i></h1>
</div>

<div class="mr-5 ml-5 ">
    <div class="my-3 p-3 rounded box-shadow mr-5 ml-5 overflow-hidden" style="background-color: #ededed;">


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Statut</th>
                    <th scope="col">Pseudo</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">@</th>
                    <th scope="col">Anonyme</th>
                    <th scope="col text-center">Options</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < $nbUtilisateur; $i++) {
                    if (($i % 2) == 0) {
                        echo '<tr style = "background-color: white;">';
                    } else {
                        echo '<tr>';
                    }
                    echo '<th scope = "row">' . $i . '</th>'
                    . '<td>' . $utilisateur[$i][1] . '</td>'
                    . '<td>' . $utilisateur[$i][2] . '</td>'
                    . '<td>' . $utilisateur[$i][3] . '</td>'
                    . '<td>' . $utilisateur[$i][4] . '</td>'
                    . '<td>' . $utilisateur[$i][5] . '</td>'
                    . '<td>' . $utilisateur[$i][6] . '</td>'
                    . '<td class = " mt-1" >'
                    . '<input type = "button" value = "Éditer" class = "bouton-design rounded" OnClick = "window.location.href = ' . "'" . 'index.php?action=modifier_utilisateur&idUtilisateur=' . $utilisateur[$i][0] . "'" . '">'
                    . '<input type = "button" value = "Supprimer" class = "bouton-design rounded ml-1" OnClick = "window.location.href =' . "'" . 'index.php?action=gestion_utilisateur&idUtilisateur=' . $utilisateur[$i][0]. "'" . '">'
                    . '</td>'
                    . '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-------------------------------------------------------Fin de la page d'affichage d'utilisateur---------------------------------------------------------------->
