<?php
session_start();

if(!isset($_SESSION['email']))
{
    header('location: ../connexion.php');
}
?>
<!DOCTYPE html>
<html lang="fr">

<?php
require_once '../bdd/bdd.php';
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="../img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/ui-buttons.html" />

    <title>Buttons | AdminKit Demo</title>

    <link href="../css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
<?php include '../src/nav/navadmin.php';?>
<?php include '../src/nav/top_navadmin.php';?>

 <div>
     <?php if(isset($_SESSION['message_mdp']))
                          {
                            echo $_SESSION['message_mdp'];
                            unset($_SESSION['message_mdp']);
                          } 
                          

                          ?>
                              <?php
                require_once '../bdd/bdd.php';


                $bdd = new bdd;
                $req=$bdd->getStart()->prepare('SELECT nom, verif FROM utilisateurs');
                $req->execute(array(
                ));

                $res=$req->fetchall();
                ?>
                 <form action="../class/mvc/action-compte.php" method="post">
                 <label class="form-label">Nom</label>
                      <select name="nom" class="form-control" required="required">
                            <option value="">Selectionner le patient</option>



                            <?php

                            require_once '../bdd/bdd.php';


                            $bdd = new bdd;
                            $req=$bdd->getStart()->prepare("select nom, verif from utilisateurs");
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
                        <label class="form-label">Etat du compte</label>
                         <select name="verif">
                                <option value="1">Activer</option>
                                <option value="0">Désactiver</option>
                        
                        </select>
                          
                        <ul>
                          <li><button type="submit">Sauvegarder</button></li>

                          <?php if(isset($_SESSION['succes_modif']))
                          {
                            echo $_SESSION['succes_modif'];
                            unset($_SESSION['succes_modif']);
                          } ?>

                        </ul>
                         </form>
                      </div><!--save-stngs end-->

                   
<div class="main">


    <main class="content">
        <div class="container-fluid p-0">

            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">Administrateur</h1>
                </a>
            </div>


            <?php
            require_once '../bdd/bdd.php';


            $bdd = new bdd;
            $req=$bdd->getStart()->prepare('SELECT * FROM utilisateurs ORDER BY id DESC');
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
                <h3 align="center">Données des administrateur</h3>
                <br />
                <div class="table-responsive">
                    <table id="employee_data" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <td>Nom</td>
                            <td>Prenom</td>
                            <td>E-mail</td>
                            <td>Derniere connexion</td>
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
								<td>'.$row["date_connexion"].'</td>
					            <td><a href="../class/mvc/manager_sup.php?id='.$row["id"].'">Supprimer</td>



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
    </main>

    <footer class="footer">
        <div class="container-fluid">
            <div class="row text-muted">
                <div class="col-6 text-start">
                    <p class="mb-0">
                        <a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>AdminKit Demo</strong></a> &copy;
                    </p>
                </div>
                <div class="col-6 text-end">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>
</div>

<script src="../js/app.js"></script>

</body>

</html>