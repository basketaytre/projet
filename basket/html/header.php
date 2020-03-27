<!-------------------------------------------------------Page du header---------------------------------------------------------------->
<html>
    <head>
        <title> Club de basket-ball d'Aytré</title> 
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, intitial-scale=1.0">
        <link rel="icon" type="image/ico" href="images/logo2.ico" />
        <link rel="stylesheet" href="css/bootstrap/bootstrap.css" />

        <!--        Police d'écriture-->
        <link href="https://fonts.googleapis.com/css?family=Kalam&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Baloo+Thambi+2&display=swap" rel="stylesheet"> 
        <?php
        $texte = '';
        if (isset($_GET['texte'])) {
            $texte = $_GET['texte'];
            if ($texte == 'ok') {
                echo '<!-- Editeur de texte -->'
                . '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">'
                . ' <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">';
            }
        }
        ?>
        <link rel="stylesheet" href="css/graphisme.css" />
    </head>
    <body>
        <header >
            <div class="row mt-2 mb-2 m-0">
                <div class="col-8">
                    <a target="blank" href="https://www.facebook.com/aytrebasket/"><div class=" pl-5"><strong class="align-middle">Retrouvez-nous sur Facebook ! </strong><img src="images/f_logo_facebook.png" class="ml-3"></img></a></div>

                </div>
                <div class=" col-4 text-right">
                    <input type="button" value="Inscription" class="bouton-design rounded" OnClick="window.location.href = 'index.php?action=inscription_utilisateur'">
                    <input type="button" value="Connexion"class="bouton-design rounded " OnClick="window.location.href = 'index.php?action=connexion_utilisateur'">
                    <!--<a class="btn btn-outline-primary" href="index.php?action=connexion_utilisateur">Se connecter</a>-->
                </div>
            </div>
        </div>
        <div class=" text-center bg-dark row  navigbar">
            <div class="col-lg-5 col-md-12 mt-auto mb-auto">
                <div class="row">
                    <div class="col-4 col-md-4 col-sm-12 col-xs-12">
                        <a class='p-2 navig-link' href='index.php'>Accueil</a>
                    </div>
                    <div class="col-4 col-md-4 col-sm-12 col-xs-12">
                        <a class='p-2 navig-link' href='index.php?action=affiche_article'>Actualité</a>
                    </div>
                    <div class="col-4 col-md-4 col-sm-12 col-xs-12">
                        <a class='p-2 navig-link' href='index.php?action=affiche_sponsor'>Partenaires</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 d-none d-lg-block ">
                <a class="logo justify-content-center" href="#">
                    <img src="images/logo_grand.PNG" style="width:100px;" id="logonav">
                </a>
            </div>
            <div class="col-lg-5 mt-auto mb-auto">
                <div class="row">
                    <div class="col-4 col-md-4 col-sm-12 col-xs-12">
                        <a class='p-2 navig-link' href='index.php?action=affiche_utilisateur'>Utilisateurs</a>
                    </div>
                    <div class="col-4 col-md-4 col-sm-12 col-xs-12">
                        <a class='p-2 navig-link' href='index.php?action=affiche_action'>Actions</a>
                    </div>
                    <div class="col-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="dropdown">
                            <div class=" boutonmenuprincipal ml-auto mr-auto">
                                <img src="images/menu.svg"></img>
                            </div>
                            <div class=" mt-2 dropdown-child mr-0">
                                <a href="index.php?action=gestion_admin">Mon compte</a>
                                <a href="index.php?action=gestion_article">Gérer articles</a>
                                <a href="index.php?action=gestion_sponsor">Gérer sponsors</a>
                                <a href="index.php?action=gestion_action">Gérer actions</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-------------------------------------------------------Fin de la page du header---------------------------------------------------------------->
