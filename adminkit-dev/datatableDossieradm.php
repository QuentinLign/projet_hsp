<?php
session_start();

if(!isset($_SESSION['email']))
{
    header('location: connexion.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="assets/img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/ui-buttons.html" />



    <title>Buttons | AdminKit Demo</title>

    <link href="assets/css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
<?php include 'src/nav/navadmin.php';?>
<?php include 'src/nav/top_navadmin.php';?>

<div class="main">


    <main class="content">
        <div class="container-fluid p-0">

            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">Dossier de admission</h1>
                </a>
            </div>


            <?php
            require_once 'bdd/bdd.php';


            $bdd = new bdd;
            $req=$bdd->getStart()->prepare('SELECT * FROM dossier_admission');
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
                <h3 align="center">Donn??es des dossiers</h3>
                <br />
                <div class="table-responsive">
                    <table id="employee_data" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <td>Nom</td>
                            <td>Symptomes</td>
                            <td>Date</td>
                            <td>Niveau d'urgence</td>
                            <td>Date RDV</td>
                            <td>Heure RDV</td>
                            <td>Enregistrement</td>
                            <td>Hospitalisation</td>
                        </tr>
                        </thead>
                        <?php
                        foreach($res as $row )
                        {
                            echo '  
                               <tr>
								<td>'.$row["nom"].'</td>
                                    <td>'.$row["symptomes"].'</td>
                                    <td>'.$row["date"].'</td>
                                    <td>'.$row["niveau_urgence"].'</td>
                                    <td>'.$row["date_rdv"].'</td>
                                    <td>'.$row["heure"].'</td>
                                    <td>'.$row["enregistrement"].'</td>
                                    <td>'.$row["id_cabinet"].'</td>
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