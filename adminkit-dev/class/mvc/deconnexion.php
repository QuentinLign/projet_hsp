<?php
  session_start();

  //déconnexion de compte
  session_destroy();
  header('location: ../../view/index.php');
 ?>
