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
    <?php
    // (A) PROCESS RESERVATION
    if (isset($_POST['date'])) {
      require "2-reserve.php";
      if ($_RSV->save(
        $_POST['date'], $_POST['slot'], $_POST['name'],
        $_POST['email'], $_POST['tel'], $_POST['notes'])) {
        echo "<div class='ok'>Reservation saved.</div>";
      } else { echo "<div class='err'>".$_RSV->error."</div>"; }
    }
    ?>

    <!-- (B) RESERVATION FORM -->
    <h1>RESERVATION</h1>
    <form id="resForm" method="post" target="_self">
      <label for="res_name">Name</label>
      <input type="text" required name="name" value="<?php echo htmlspecialchars($_SESSION['nom']);?>"/>

      <label for="res_email">Email</label>
      <input type="email" required name="email" value="<?php echo htmlspecialchars($_SESSION['email']);?>"/>

      <label for="res_tel">Numéro de téléphone</label>
      <input type="text" required name="tel"/>


      <?php
      // @TODO - MINIMUM DATE (TODAY)
      // $mindate = date("Y-m-d", strtotime("+2 days"));
      $mindate = date("d-m-Y");
      ?>
      <label>Reservation Date</label>
      <input type="date" required id="res_date" name="date"
             min="<?=$mindate?>">

      <label>Reservation Heure</label>
      <input type="time" required id="time" name="date"
             min="<?=$mindate?>">

      <input type="submit" value="Submit"/>
    </form>
  </body>
</html>
