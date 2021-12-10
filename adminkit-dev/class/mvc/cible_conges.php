<?php
//Traitement des données entrées dans le form d'inscription
require 'Model/model_rdv.php';
require 'Manager_User.php';
session_start();

//ajout dans la bdd{


    $rendezvous = new RDV([
        'doctor' => $_POST['doctor'],
        'Date_de_debut' => $_POST['Date_de_debut'],
        'Date_de_fin' => $_POST['Date_de_fin']
    ]);
    $cong = new Manager_User();
    $cong->conges($rendezvous);



?>
