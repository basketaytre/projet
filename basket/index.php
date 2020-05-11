<?php

session_start();
include 'connexion.php';
$action = '';

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
if ($action=='connexion_utilisateur'){
    if (!empty($_SESSION['idUtilisateur'])){
        header("Location:index.php?action=mon_profil");
    }else{
        include './html/utilisateur/verif_utilisateur.php';
    }
}
if ($action == 'deconnexion') {
    session_destroy();
    header('Location: index.php');
}


include 'html/header.php';
if ($action == '') {
    include 'html/acceuil/accueil.php';
} elseif ($action == 'affiche_sponsor') {
    include './html/sponsor/affiche_sponsor.php';
} elseif ($action == 'affiche_utilisateur') {
    include './html/utilisateur/affiche_utilisateur.php';
} elseif ($action == 'affiche_article') {
    include './html/article/affiche_article.php';
} elseif ($action == 'inscription_utilisateur') {
    include './html/utilisateur/inscription_utilisateur.php';
} elseif ($action == 'connexion_utilisateur') {
    include './html/utilisateur/connexion_utilisateur.php';
} elseif ($action == 'mon_profil') {
    if (!empty($_SESSION['statut'])) {
        include './html/utilisateur/mon_profil.php';
    }else{
            include './html/utilisateur/connexion_utilisateur.php';
    }
} elseif ($action == 'protec_donnees') {
    include './html/information/protec_donnees.php';
} elseif ($action == 'mention_legales') {
    include './html/information/mention_legales.php';
} elseif ($action == 'plan_site') {
    include './html/information/plan_site.php';
} elseif ($action == 'en_travaux') {
    include './html/information/en_travaux.php';
} elseif ($action == 'regarder_article') {
    include './html/article/regarder_article.php';
} elseif ($action == 'regarder_sponsor') {
    include './html/sponsor/regarder_sponsor.php';
} elseif (!empty($_SESSION['idUtilisateur'])) {
    if ($_SESSION['statut'] == 'administrateur') {
        if ($action == 'gestion_admin') {
            include './html/gestion_admin/gestion_admin.php';
        } elseif ($action == 'creer_sponsor') {
            include 'html/gestion_admin/sponsor/creer_sponsor.php';
        } elseif ($action == 'gestion_sponsor') {
            include 'html/gestion_admin/sponsor/gestion_sponsor.php';
        } elseif ($action == 'modifier_sponsor') {
            include './html/gestion_admin/sponsor/modifier_sponsor.php';
        } elseif ($action == 'gestion_article') {
            include 'html/gestion_admin/article/gestion_article.php';
        } elseif ($action == 'creer_article') {
            include './html/gestion_admin/article/creer_article.php';
        } elseif ($action == 'modifier_article') {
            include './html/gestion_admin/article/modifier_article.php';
        } elseif ($action == 'creer_action') {
            include './html/gestion_admin/action/creer_action.php';
        } elseif ($action == 'gestion_action') {
            include 'html/gestion_admin/action/gestion_action.php';
        } elseif ($action == 'modifier_action') {
            include './html/gestion_admin/action/modifier_action.php';
        } elseif ($action == 'affiche_action') {
            include './html/action/affiche_action.php';
        } elseif ($action == 'gestion_utilisateur') {
            include './html/gestion_admin/utilisateur/gestion_utilisateur.php';
        } elseif ($action == 'modifier_utilisateur') {
            include './html/gestion_admin/utilisateur/modifier_utilisateur.php';
        }
    } else {
        include './html/utilisateur/mon_profil.php';
    }
} else {
    include 'html/acceuil/accueil.php';
}
include 'html/footer.php';
?>
