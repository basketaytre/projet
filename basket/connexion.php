<?php
//début connexion	
$user = 'root'; // nom d'utilisateur pour se connecter
$pass = ''; // mot de passe de l'utilisateur pour se connecter
$connexion = new PDO('mysql:host=localhost;dbname=basketaytre', $user, $pass);
// Paramètre la connexion pour travailler avec un encodage en utf8 ((pour éviter les problèmes d'accents))
$pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES 'UTF8'";
$connexion = new PDO('mysql:host=localhost;dbname=basketaytre', $user, $pass, $pdo_options);
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
