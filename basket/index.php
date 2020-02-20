
<?php
session_start();
include 'connexion.php';
include 'html/header.php';
//include 'connexion.php';

$action='';
if(isset($_GET['action'])){
    $action=$_GET['action'];
}
if($action==''){
    include 'html/acceuil/accueil.php';
}
elseif($action=='creer_sponsor'){
    include 'html/gestion_admin/sponsor/creer_sponsor.php';
}
elseif($action=='gestion_sponsor'){
    include 'html/gestion_admin/sponsor/gestion_sponsor.php';
}
elseif ($action=='modifier_sponsor') {
    include './html/gestion_admin/sponsor/modification_sponsors.php';
}
elseif ($action=='affiche_sponsor') {
    include './html/sponsors/affiche_sponsor.php';
}
elseif($action=='gestion_article'){
    include 'html/gestion_admin/article/gestion_article.php';
}
elseif ($action=='creer_article') {
    include './html/gestion_admin/article/creer_article.php';
}
elseif ($action=='modifier_article') {
    include './html/gestion_admin/article/modification_article.php';
}
elseif ($action=='affiche_article') {
    include './html/article/affiche_article.php';
}
elseif($action=='creer_action'){
    include 'html/gestion_admin/action/creer_action.php';
}
elseif($action=='gestion_action'){
    include 'html/gestion_admin/action/gestion_action.php';
}
elseif ($action=='modifier_action') {
    include './html/gestion_admin/action/modification_action.php';
}
elseif ($action=='affiche_action') {
    include './html/action/affiche_action.php';
}
else{
    include './page_erreur.php';
}
include 'html/footer.php';
?>
