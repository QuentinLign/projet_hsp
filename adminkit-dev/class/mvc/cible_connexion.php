<?php

//Traitement des données entrées dans le form de connexion
require_once 'Model/User.php';
require_once 'Manager_User.php';
session_start();
//Vérification du compte dans la bdd
$donnee = new User(['email'=>$_POST['email'],
                    'mdp'=>$_POST['mdp']]);

$connexion = new Manager_User;
$connexion->connexion($donnee);

?>
 <?php
                        if (isset($_SESSION['erreur_co']))
                        {
                          echo "<div style='color:#ff0000'>
                          Mauvais Mail ou mot de passe</div>";

                          unset($_SESSION['erreur_co']);
                        }
                        ?>
<html>
<a href="../../connexion.php">Retour</a>