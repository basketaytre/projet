
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
    include 'html/gestion_admin/creer_sponsor.php';
}
//elseif($action=='exercice1'){
//    include 'exercice1.php';
//}
//else{
  //  include 'page_erreur.php';
//}
include 'html/footer.php';
?>