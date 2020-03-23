<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title> Club de basket-ball d'Aytré</title> 
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, intitial-scale=1.0">
        <link rel="icon" type="image/png" href="images/logo_mini.png" />
        <link rel="stylesheet" href="css/bootstrap/bootstrap.css" />
        <link rel="stylesheet" href="css/graphisme.css" />
        <!--        Police d'écriture-->
        <link href="https://fonts.googleapis.com/css?family=Kalam&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Baloo+Thambi+2&display=swap" rel="stylesheet"> 
    </head>
    <body>
        <header >
            <div class="row mt-2 mb-2 ">
                <div class="col-8">
                    <div class=" pl-5"><strong class="align-middle">Retrouvez-nous sur Facebook ! </strong><img src="images/f_logo_facebook.png" class="ml-3"></img></div>

                </div>
                <div class=" col-4 text-right">
                    <button type="button" class="bouton-design rounded" href="index.php?action=connexion_utilisateur">Inscription</button>
                    <button type="button" class="bouton-design rounded " href="index.php?action=connexion_utilisateur">Connexion</button>
                    <!--                <a class="btn btn-outline-primary" href="index.php?action=connexion_utilisateur">Se connecter</a>-->
                </div>
            </div>
        </div>
        <div class=" text-center bg-dark row pl-4 pr-4 navigbar">
            <div class="col-5 mt-auto mb-auto">
                <div class="row">
                    <div class="col-4">
                        <a class='p-2 navig-link' href='index.php'>Acceuil</a>
                    </div>
                    <div class="col-4">
                        <a class='p-2 navig-link' href='index.php?action=affiche_article'>Actualité</a>
                    </div>
                    <div class="col-4">
                        <a class='p-2 navig-link' href='index.php?action=affiche_sponsor'>Partenaires</a>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <a class="logo justify-content-center" href="#">
                    <img src="images/logo_grand.PNG" style="width:100px;" id="logonav">
                </a>
            </div>
            <div class="col-5 mt-auto mb-auto">
                <div class="row">
                    <div class="col-4">
                        <a class='p-2 navig-link' href='index.php?action=affiche_utilisateur'>Utilisateurs</a>
                    </div>
                    <div class="col-4">
                        <button class="navbar-toggler text-muted" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" onclick="window.location.href = 'index.php?action=gestion_admin'">
                            <span class="title">Gestion Admin</span>
                        </button>
                    </div>
                    <div class="col-4">
                        <a class='p-2 navig-link' href='index.php?action=affiche_action'>Actions</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
