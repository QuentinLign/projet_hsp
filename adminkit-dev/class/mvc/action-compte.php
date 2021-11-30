<?php
//Traitement des données entrées dans le form d'inscription
require 'User.php';
require 'Manager_User.php';
session_start();


$user = new User(['verif'=>$_POST['verif']]);
$modif = new Manager_User;
$modif->modification($user, $_SESSION['email']);
?>