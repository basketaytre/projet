
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
//elseif($action=='exercice1'){
//    include 'exercice1.php';
//}
include 'html/footer.php';
?>