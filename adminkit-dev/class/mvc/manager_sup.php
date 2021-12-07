<?php
$bdd = new PDO('mysql:host=localhost;dbname=projet_hsp','root','');
$suppr_id = ($_GET['id']);

$req = $bdd->prepare('DELETE FROM utilisateurs WHERE id = ?');
$req->execute(array($suppr_id));

if ($req) {
 echo 'L utilisateur à été supprimer.';
}else{
 echo "probleme";
}
