<?php
//Traitement des données entrées dans le form d'inscription
require 'User.php';
require 'Manager_User.php';
session_start();
//Vérification du mdp

if($_POST['nom'] != $_POST['nom'])
{
  $_SESSION['erreur_inscr'] = "Erreur dans le mot de passe.";
   echo "<div style='color:#ff0000'>
   ".$_SESSION['erreur_inscr'];
   unset($_SESSION['erreur_inscr']);
}
//ajout dans la bdd
else
{
  $diagnostic = new User(['nom'=>$_POST['nom'],
  'symptomes'=>$_POST['symptomes'],
  'date'=>$_POST['date'],
  'niveau_urgence'=>$_POST['niveau_urgence'],
  'date_rdv'=>$_POST['date_rdv'],
  'heure'=>$_POST['heure']]);
  $diag = new Manager_User;
  $diag->diag($diagnostic);
}

?>
