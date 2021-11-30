<?php
session_start();

if(!isset($_SESSION['email']))
{
    header('location: connexion.php');
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>AdminKit Demo - Bootstrap 5 Admin Template</title>

    <link href="css/app.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div style="text-align: center;">
<button class="btn btn-primary" data-bs-toggle="collapse" href="#d" role="button" aria-expanded="false" aria-controls="de">
    Les patients
  </button>
  <button class="btn btn-primary" href="http://google.fr">
    Pas d'hospitalisation
  </button>
  <div class="collapse" id="d">
                    <div class="card card-body">
                      

                   <div class="container-fluid p-0">
                   <div class="m-sm-4">
                    <form action="class/mvc/cible_diagnostic.php" method="post">
                      <div class="mb-3">
                      <label class="form-label">Nom</label>
                         <select name="nom" class="form-control" required="required">
                                                    <option value="">Selectionner le patient</option>



                                                    <?php

                                                    require_once '../adminkit-dev/bdd/bdd.php';


                                                    $bdd = new bdd;
                                                    $req=$bdd->getStart()->prepare("select nom from utilisateurs WHERE role='PAT'");
                                                    $req->execute(array(
                                                    ));

                                                    $res=$req->fetchall();
                                                    foreach ($res as $req)
                                                    {
                                                        ?>
                                                        <option value="<?php echo ($req['nom']);?>">
                                                            <?php echo ($req['nom']);?>
                                                        </option>
                                                    <?php } ?>

                                                </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Symptomes</label>
                      <textarea class="form-control" name="symptomes" placeholder="Indiquez les symptomes du patient">
                  </textarea>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Date du diagnostic</label>
                      <input class="form-control form-control-lg" type="date" name="date" placeholder="Entrer votre adresse postale" required/>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Niveau</label>
                     
  <input class="form-check-input" type="radio" name="niveau_urgence" id="inlineRadio1" value="vert">
  <img for="inlineRadio1" src="img/icons/green.png">
  <input class="form-check-input" type="radio" name="niveau_urgence" id="inlineRadio2" value="orange">
  <img for="inlineRadio2" src="img/icons/orange.png">
   <input class="form-check-input" type="radio" name="niveau_urgence" id="inlineRadio3" value="rouge">
  <img for="inlineRadio3" src="img/icons/red.png">
</div>

                      <div class="mb-3">
                      <label class="form-label">Date du rendez-vous (facultatif)</label>
                      <input class="form-control form-control-lg" type="date" name="date_rdv" placeholder="Entrer votre adresse postale"/><input class="form-control form-control-lg" type="time" name="heure" min="09:00" max="18:00" placeholder="Entrer votre adresse postale"/>
                    </div>

              

</div>

                    <div class="col-lg-12 no-pdd">
                            <button type="submit" class="btn btn-lg btn-primary" value="submit">Suivant</button>
                          </div>
                           <div class="mb-3">
                      
                                      
              <?php
                          if (isset($_SESSION['erreur_inscr']))
                          {
                            echo "<div style='color:#ff0000'>
                            ".$_SESSION['erreur_inscr'];
                            unset($_SESSION['erreur_inscr']);
                          }
                          ?>
                </div>

                  </form>
                </div>
</div>
         </div>
         <script src="js/app.js"></script>
 <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../js/popper.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/jquery.mCustomScrollbar.js"></script>
  <script type="text/javascript" src="../lib/slick/slick.min.js"></script>
  <script type="text/javascript" src="../js/script.js"></script>
  
</body>

</html>