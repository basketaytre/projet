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
        <div class="conteneur">
            <header class="fixed-top">
                <div class="pos-f-t">
                    <div class="collapse" id="navbarToggleExternalContent"></div>
                    <nav class="navbar navbar-dark bg-dark">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" OnClick="window.location.href = 'index.php?action=gestion_sponsor'">
                            <span class="title">Gestion Sponsors</span>
                        </button>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" onclick="window.location.href = 'index.php?action=affiche_sponsor'">
                            <span class="title">Sponsors</span>
                        </button>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" OnClick="window.location.href = 'index.php?action=gestion_article'">
                            <span class="title">Gestion articles</span>
                        </button>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" onclick="window.location.href = 'index.php?action=affiche_article'">
                            <span class="title">Articles</span>
                        </button>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" OnClick="window.location.href = 'index.php?action=gestion_action'">
                            <span class="title">Gestion actions</span>
                        </button>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" onclick="window.location.href = 'index.php?action=affiche_action'">
                            <span class="title">Action</span>
                        </button>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" onclick="window.location.href = 'index.php?action=gestion_utilisateur'">
                            <span class="title">Gestion utilisateurs</span>
                        </button>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" onclick="window.location.href = 'index.php?action=affiche_utilisateur'">
                            <span class="title">Utilisateurs</span>
                        </button>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" onclick="window.location.href = 'index.php?action=inscription_utilisateur'">
                            <span class="title">Inscription</span>
                        </button>
                    </nav>
                </div>
            </header>
