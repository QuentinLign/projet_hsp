<?php
$bdd = new PDO('mysql:host=localhost;dbname=projet_hsp','root','');
$suppr_id = ($_GET['id']);

$req = $bdd->prepare('DELETE FROM rendezvous WHERE id = ?');
$req->execute(array($suppr_id));

if ($req) {
    echo 'Le rendez-vous à été supprimer.';
}else{
    echo "probleme";
}
