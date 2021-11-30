<?php
//Traitement des données entrées dans le form d'inscription
require 'User.php';
require 'Manager_User.php';
session_start();
//Vérification du mdp


  $activ = new Etat([
  'nom'=>$_POST['nom'],
  'verif'=>$_POST['verif']]);
  $activation = new Manager_User();
  $activation->Etat($activ);

?>