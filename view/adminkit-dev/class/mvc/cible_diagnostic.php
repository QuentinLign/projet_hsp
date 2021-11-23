<?php
//Traitement des données entrées dans le form d'inscription
require 'User.php';
require 'Manager_User.php';
session_start();
//Vérification du mdp


  $diagnostic = new User(['nom'=>$_POST['nom'],
  'symptomes'=>$_POST['symptomes'],
  'date'=>$_POST['date'],
  'niveau_urgence'=>$_POST['niveau_urgence'],
  'date_rdv'=>$_POST['date_rdv'],
  'heure'=>$_POST['heure'],
<<<<<<< Updated upstream
  'enregistrement'=>$_POST['enregistrement'],
  'id_cabinet'=>$_POST['id_cabinet']]);
=======
  'enregistrement'=>$_POST['enregistrement']]);
>>>>>>> Stashed changes
  $diag = new Manager_User;
  $diag->diag($diagnostic);

?>
