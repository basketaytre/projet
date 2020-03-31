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
        <?php
        $nav_en_cours='';
        if (isset($_GET['action'])) {
            $nav_en_cours = $_GET['action'];
        }
        ?>
        <header >
            <div class="row mt-2 mb-2 m-0">
                <div class="col-8 my-auto">
                    <div class=" pl-5 "> 
                        <a href="https://www.facebook.com/aytrebasket/" class="lien_neutre" ><strong>Retrouvez-nous sur Facebook ! </strong><img src="images/f_logo_facebook.png" class="ml-3"></img></a>
                    </div>
                </div>
                <div class=" col-4 text-right">
                    <input type="button" value="Inscription" class="bouton-design rounded" OnClick="window.location.href = 'index.php?action=inscription_utilisateur'">
                    <input type="button" value="Connexion"class="bouton-design rounded " OnClick="window.location.href = 'index.php?action=connexion_utilisateur'">
                </div>
            </div>
            <!--            Navbar                -->
            <div class=" text-center bg-dark row navigbar">
                <!-- Ligne vide qui apparait au format réduit--> 
                <div class="row m-0 d-sm-block d-md-none"><small style="color:transparent; font-size:4px;">.</small></div>
                <!-- Partie gauche -->
                <div class="col-lg-5 col-md-12 my-auto ">
                    <div class="row ">
                        <div class="col-lg-4 col-md-4 d-md-block d-none ">
                            <a class='p-2 navig-link' <?php if ($nav_en_cours == '') {
            echo ' id="en_cours"';
        } ?> href='index.php'>Accueil</a>
                        </div>
                        <div class="col-lg-4 col-md-4 d-md-block d-none ">
                            <a class='p-2 navig-link' <?php if ($nav_en_cours == 'affiche_article') {
            echo ' id="en_cours"';
        } ?> href='index.php?action=affiche_article'>Actualité</a>
                        </div>
                        <div class="col-lg-4 col-md-4 d-md-block d-none  ">
                            <a class='p-2 navig-link ' <?php if ($nav_en_cours == 'affiche_sponsor') {
            echo ' id="en_cours"';
        } ?> href='index.php?action=affiche_sponsor'>Partenaires</a>
                        </div>
                    </div>
                </div>
                <!-- Logo central -->
                <div class="col-lg-2 d-none d-lg-block ">
                    <a class="logo justify-content-center" href="#">
                        <img src="images/logo_grand.PNG" style="width:100px;" id="logonav">
                    </a>
                </div>
                <!-- Ligne vide qui apparait au format réduit--> 
                <div class="row m-0 d-md-block d-sm-none d-lg-none"><small style="color:transparent; font-size:10px;">.</small></div>
                <!-- Partie droite -->
                <div class="col-lg-5 col-md-12 my-auto">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 d-md-block d-none my-auto">
                            <a class='p-2 navig-link' href='index.php?action=en_travaux'>[vide]</a>
                        </div>
                        <div class="col-lg-4 col-md-4 d-md-block d-none col-sm-12 my-auto">
                            <a class='p-2 navig-link' href='index.php?action=en_travaux'>Contact</a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 my-auto">
                            <div class="btn-group">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false" style="background-color:#fe882a;">
                                    <img src="images/menu.svg"></img>
                                </button>
                                <div class="dropdown-menu dropdown-menu-center dropdown-menu-md-right dropdown-menu-lg-right">
                                    <button class="dropdown-item d-sm-block d-md-none" type="button" OnClick="window.location.href = 'index.php'">Accueil</button>
                                    <button class="dropdown-item d-sm-block d-md-none" type="button" OnClick="window.location.href = 'index.php?action=affiche_article'">Actualité</button>
                                    <button class="dropdown-item d-sm-block d-md-none" type="button" OnClick="window.location.href = 'index.php?action=affiche_sponsor'">Partenaires</button>
                                    <button class="dropdown-item d-sm-block d-md-none" type="button" OnClick="window.location.href = 'index.php?action=en_travaux'">[vide]</button>
                                    <button class="dropdown-item d-sm-block d-md-none" type="button" OnClick="window.location.href = 'index.php?action=en_travaux'">Contact</button>
                                    <hr class="hrp d-sm-block d-md-none">
                                    <button class="dropdown-item" type="button" OnClick="window.location.href = 'index.php?action=mon_profil'">Mon compte</button>
                                    <hr class="hrp">
                                    <button class="dropdown-item" type="button" OnClick="window.location.href = 'index.php?action=en_travaux'">Contact</button>
                                    <hr class="hrp">
                                    <button class="dropdown-item" type="button" OnClick="window.location.href = 'index.php?action=gestion_article'">Gérer articles</button>
                                    <button class="dropdown-item" type="button" OnClick="window.location.href = 'index.php?action=gestion_sponsor'">Gérer sponsors</button>
                                    <button class="dropdown-item" type="button" OnClick="window.location.href = 'index.php?action=gestion_action'">Gérer actions</button>
                                    <button class="dropdown-item" type="button" OnClick="window.location.href = 'index.php?action=gestion_utilisateur'">Gérer utilisateurs</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Ligne vide qui apparait au format réduit--> 
                <div class="row m-0 d-md-block d-lg-none"><small style="color:transparent; font-size:4px;">.</small></div>
            </div>
        </header>
        <!-------------------------------------------------------Fin de la page du header---------------------------------------------------------------->
