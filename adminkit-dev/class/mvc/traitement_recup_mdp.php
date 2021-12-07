<?php
//Traitement des données entrées dans le form d'inscription
require 'Model/User.php';
require 'Manager_User.php';
session_start();
//Vérification du mdp

if($_POST['mdp'] != $_POST['confirmmdp'])
{
  $_SESSION['erreur_change'] = "Erreur dans le mot de passe.";
  header('Location: ../view/recup_mdp.php');
}
//ajout dans la bdd
else
{
  $user = new User(['mdp'=>$_POST['mdp']]);
  $change = new Manager_User;
  $change->recup_mdp($user, $_SESSION['email']);
}

?>
