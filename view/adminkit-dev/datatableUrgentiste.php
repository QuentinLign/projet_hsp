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
<?php include 'navadmin.php';?>
<?php include 'top_navadmin.php';?>
 <?php if(isset($_SESSION['message_mdp']))
                          {
                            echo $_SESSION['message_mdp'];
                            unset($_SESSION['message_mdp']);
                          } 
                          

                          ?>
           <p>

  <button class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Les patients
  </button>
  <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#c" aria-expanded="false" aria-controls="c">
    Créer un compte patient
  </button>
  <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#d" aria-expanded="false" aria-controls="d">
    Dossiers admissions
  </button>
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
    

 <div class="container-fluid p-0">
                <?php
                require_once '../adminkit-dev/bdd/bdd.php';


                $bdd = new bdd;
                $req=$bdd->getStart()->prepare('SELECT * FROM utilisateurs WHERE role="PAT" ORDER BY id DESC');
                $req->execute(array(
                ));

                $res=$req->fetchall();
                ?>

                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
                    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
                    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
                    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
                <body>
                <br /><br />
                <div class="container">
                    <h3 align="center">Données des utilisateurs</h3>
                    <br />
                    <div class="table-responsive">
                        <table id="employee_data" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <td>Nom</td>
                                <td>Prenom</td>
                                <td>E-mail</td>
                            </tr>
                            </thead>
                            <?php
                            foreach($res as $row )
                            {
                                echo '  
                               <tr>
                <td>'.$row["nom"].'</td>
                <td>'.$row["prenom"].'</td>
                <td>'.$row["email"].'</td>
                </tr>
                ';
                            }
                            ?>
                        </table>
                    </div>
                </div>
                </body>
                </html>
                <script>
                    $(document).ready(function(){
                        $('#employee_data').DataTable();
                    });
                </script>

            </div>



  </div>
</div>

<div class="collapse" id="c">
  <div class="card card-body">
    <h3>Ajouter un patient</h3>
    <div class="card">
              <div class="card-body">
                <div class="m-sm-4">
                  <form action="class/mvc/cible_patient.php" method="post">
                    <div class="mb-3">
                      <label class="form-label">Nom</label>
                      <input class="form-control form-control-lg" type="text" name="nom" placeholder="Entrer votre nom" />
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Prenom</label>
                      <input class="form-control form-control-lg" type="text" name="prenom" placeholder="Entrer votre prenom" />
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Email</label>
                      <input class="form-control form-control-lg" type="email" name="email" placeholder="Entrer votre email" />
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Mot de passe</label>
                      <input class="form-control form-control-lg" type="password" name="mdp" placeholder="Entrer votre mot de passe" />
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Mot de passe</label>
                      <input class="form-control form-control-lg" type="password" name="confirmmdp" placeholder="Entrer votre mot de passe" />
                    </div>
                    <div class="mb-3">
                   <input type="checkbox" name="role"
                           checked disabled>
                    <label for="PAT">Patient</label>
                  </div>
                    <div class="col-lg-12 no-pdd">
                            <button type="submit" class="btn btn-lg btn-primary" value="submit">Créer le compte</button>
                          </div>
                    
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

</div>
<div class="collapse" id="d">
  <div class="card card-body">
      <h3>Ajouter un dossier d'admission</h3>
      <div class="card">
              <div class="card-body">
                <div class="m-sm-4">
                    <form action="class/mvc/cible_patient.php" method="post">
 <div class="mb-3">
                      <label class="form-label">Nom</label>
                     <select id="select-state"  placeholder="Nom prénom" name="id_utilisateurs">
                              <option value="">Nom prénom</option>
                             
                            </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Date de naissance</label>
                      <input class="form-control form-control-lg" type="date" name="date_naissance" placeholder="Entrer votre date de naissance" />
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Adresse postale</label>
                      <input class="form-control form-control-lg" type="text" name="adresse_postale" placeholder="Entrer votre adresse postale" />
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Mutuelle</label>
                      <input class="form-control form-control-lg" type="int" name="mutuelle" placeholder="Entrer votre numéro de Mutuelle" />
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Numéro de sécurité social</label>
                      <input class="form-control form-control-lg" type="int" name="numero_secu" placeholder="Entrer votre numéro de sécurité social" />
                    </div>
                     <div class="mb-3">
                      <label class="form-label">Option</label>
                      <input class="form-control form-control-lg" type="int" name="" placeholder="" />
                    </div>
                     <div class="mb-3">
                      <label class="form-label">Régime spécifique</label>
                      <input class="form-control form-control-lg" type="text" name="regime_specifique" placeholder="Entrer si vous avez un Régime spécifique" />
                    </div>
                    <div class="mb-3">
                   <input type="checkbox" name="role"
                           checked disabled>
                    <label for="PAT">Patient</label>
                  </div>
                    <div class="col-lg-12 no-pdd">
                            <button type="submit" class="btn btn-lg btn-primary" value="submit">Créer le compte</button>
                          </div>
                    
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

</div>


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