<?php
//Traitement des données entrées dans le form d'inscription
require_once 'Model/User.php';
require_once 'Manager_User.php';
session_start();
//Vérification du mdp

if($_POST['mdp'] != $_POST['confirmmdp'])
{
  $_SESSION['erreur_inscr'] = "Erreur dans le mot de passe.";
   echo "<div style='color:#ff0000'>
   ".$_SESSION['erreur_inscr'];
   unset($_SESSION['erreur_inscr']);
}
//ajout dans la bdd
else
{
  $inscrip_patient = new User(['nom'=>$_POST['nom'],
  'prenom'=>$_POST['prenom'],
  'email'=>$_POST['email'],
  'mdp'=>$_POST['mdp'],
  ]);
  $inscription = new Manager_User;
  $inscription->inscrip_patient($inscrip_patient);
}

?>
