
<?php
session_start();
include 'html/header.php';
//include 'connexion.php';

$action='';
if(isset($_GET['action'])){
    $action=$_GET['action'];
}
if($action==''){
    include 'html/acceuil/accueil.php';
}
if($action=='creer_sponsor'){
    include 'html/gestion_admin/sponsor/creer_sponsor.php';
}
if($action=='supprimer_sponsor'){
    include 'html/gestion_admin/sponsor/supprimer_sponsor.php';
}
elseif ($action=='creer_article') {
    include './html/gestion_admin/article/creer_article.php';
}
elseif ($action=='affiche_sponsor') {
    include './html/sponsors/affiche_sponsor.php';
}
//elseif($action=='exercice1'){
//    include 'exercice1.php';
//}
//if{
  // 
//}
include 'html/footer.php';
?>
