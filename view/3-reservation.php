<?php
session_start();

?>
<!DOCTYPE html>
<html>
  <head>
    <title>
      <?php 
          if (isset($_SESSION['nom']))
                {
          echo htmlspecialchars($_SESSION['nom']);
          }
          else {
          echo '';
          }
          ?> | Votre réservation
    </title>
    <link href="3-theme.css" rel="stylesheet">
    </script>
  </head>
  <body>


    <!-- (B) RESERVATION FORM -->
    <h1>RESERVATION</h1>
    <form id="resForm" action="adminkit-dev/class/mvc/cible_rdv.php" method="post" target="_self">
     

      <label for="res_tel">Médecin</label>
      <select name="medecin" id="pet-select">
          <option value="">test</option>
        
      </select>

      <label for="res_tel">Salle</label>
      <select name="salle" id="pet-select">
          <option value="">test</option>
        
      </select>

      <?php
      // @TODO - MINIMUM DATE (TODAY)
      // $mindate = date("Y-m-d", strtotime("+2 days"));
      $mindate = date("d-m-Y");
      ?>
      <label>Date</label>
      <input type="date" required id="res_date" name="date"
             min="<?=$mindate?>">

      <label>Heure</label>
      <input type="time" required id="time" name="date"
             min="<?=$mindate?>">

      <input type="submit" value="Submit"/>
    </form>

  </body>
</html>
