<?php
//Traitement des données entrées dans le form d'inscription
require 'User.php';
require 'Manager_User.php';
session_start();

//ajout dans la bdd{

if($_POST['nom'] != $_POST['nom'])
{
    $_SESSION['erreur_inscr'] = "Erreur dans le mot de passe.";
    echo "<div style='color:#ff0000'>
   ".$_SESSION['erreur_inscr'];
    unset($_SESSION['erreur_inscr']);
}
//ajout dans la bdd
else {
    $rendezvous = new User(['nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'doctorspecilization' => $_POST['doctorspecilization'],
        'RDVdate' => $_POST['RDVdate'],
        'RDVheure' => $_POST['RDVheure']]);
    $rdv = new Manager_User();
    var_dump($rendezvous);
    $rdv->inscription($rendezvous);
}


?>
