<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title> Header du site de Basket </title> 
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, intitial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap/bootstrap.css" />
        <link rel="stylesheet" href="css/graphisme.css" />
        <!--        Police d'écriture-->
        <link href="https://fonts.googleapis.com/css?family=Kalam&display=swap" rel="stylesheet"> 
    </head>
    <body>

        <header >
            <div class="pos-f-t">
                <div class="collapse" id="navbarToggleExternalContent"></div>
                <nav class="navbar navbar-dark bg-dark">
                    <a class='p-2 text-white nav-link' href='index.php'>Acceuil</a>
                    <a class='p-2 text-white nav-link' href='index.php?action=affiche_article'>Actualité</a>
                    <a class='p-2 text-white nav-link' href='index.php?action=affiche_article'>Actualité</a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" onclick="window.location.href = 'index.php?action=affiche_sponsor'">
                        <span class="title">Sponsors</span>
                    </button>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" onclick="window.location.href = 'index.php?action=affiche_action'">
                        <span class="title">Voir les actions</span>
                    </button>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" onclick="window.location.href = 'index.php?action=affiche_utilisateur'">
                        <span class="title">Voir les utilisateurs</span>
                    </button>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" onclick="window.location.href = 'index.php?action=gestion_admin'">
                        <span class="title">Gestion Administrateur</span>
                    </button>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" onclick="window.location.href = 'index.php?action=inscription_utilisateur'">
                        <span class="title">Inscription</span>
                    </button>
                </nav>
            </div>
        </header>
