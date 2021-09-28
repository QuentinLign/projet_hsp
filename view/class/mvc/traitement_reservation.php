<?php
require_once 'model_reservation.php';
require_once 'manager_reservation.php';

$reservation = new reservation($_POST["nom"], $_POST["prenom"], $_POST["mail"], $_POST["mdp"]);
$co = new Manager();
$co->reservation($reservation);
?>
