<?php
//Traitement des données entrées dans le form d'inscription
require 'User.php';
require 'Manager_User.php';
session_start();
//Vérification du mdp
if($_POST['mdp'] != $_POST['confirmmdp'])
{
	$_SESSION['message_mdp'] = "<b style='color:#ff0000'>Erreur dans le mot de passe.</b>";
	header('Location: ../../mon-compte.php');
	exit();
}

$donnee = new User(['mdp'=>$_POST['amdp']]);

$verif = new Manager_User;
$verif->modif_mdp($donnee, $_POST['mdp'], $_SESSION['email']);

?>
