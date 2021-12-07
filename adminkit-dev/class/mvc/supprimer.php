<?php
//Traitement des données entrées dans le form d'inscription
require_once '../../Model/User.php';
require_once 'Manager_User.php';
require_once '../../bdd/bdd.php';

$db = new PDO('mysql:host=localhost;dbname=projet_hsp', 'root', '');

$id ='';
if (empty($_GET['id'])){
    $id = $_GET['id'];
}

if (empty($_id)){
    throw new Exception('ID is blank');
}
supprimer($db, $id);
die();

?>
