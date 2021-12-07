<?php
//Traitement des données entrées dans le form d'inscription
require_once 'Model/model_dossier_admission.php';
require_once 'Manager_User.php';
session_start();
//Vérification du mdp


  $dossier_admission = new Dossier_admission([
  'nom'=>$_POST['nom'],
  'date_naissance'=>$_POST['date_naissance'],
  'adresse_postale'=>$_POST['adresse_postale'],
  'mutuelle'=>$_POST['mutuelle'],
  'numero_secu'=>$_POST['numero_secu'],
  'option'=>$_POST['option'],
  'regime_specifique'=>$_POST['regime_specifique']]);
  $dossier = new Manager_User();
  $dossier->Dossier_admission($dossier_admission);

?>