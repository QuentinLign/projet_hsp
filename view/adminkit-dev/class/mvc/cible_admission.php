<?php
//Traitement des données entrées dans le form d'inscription
require 'User.php';
require 'Manager_User.php';
session_start();
//Vérification du mdp


  $dossier_admission = new User([
  'nom'=>$_POST['nom'],
  'date_naissance'=>$_POST['date_naissance'],
  'adresse_postale'=>$_POST['adresse_postale'],
  'mutuelle'=>$_POST['mutuelle'],
  'numero_secu'=>$_POST['numero_secu'],
  'option'=>$_POST['option'],
  'regime_specifique'=>$_POST['regime_specifique']]);
  $dossier = new Manager_User();
  $dossier->dossier_admission($dossier_admission);

?>