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
    <link rel="shortcut icon" href="assets/img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>AdminKit Demo - Bootstrap 5 Admin Template</title>

    <link href="assets/css/app.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
<?php include 'src/nav/navadmin.php';?>
<?php include 'src/nav/top_navadmin.php';?>
<?php if(isset($_SESSION['message_mdp']))
{
    echo $_SESSION['message_mdp'];
    unset($_SESSION['message_mdp']);
}


?>

<div class="card card-body">
    <h3>Ajouter un patient</h3>
    <form action="class/mvc/traitement_rdv.php" method="post">
        <div class="mb-3">
            <label class="form-label">Nom</label>
            <input class="form-control form-control-lg" type="text" name="nom" placeholder="Entrer votre nom" required/>
        </div>
        <div class="mb-3">
            <label class="form-label">Prenom</label>
            <input class="form-control form-control-lg" type="text" name="prenom" placeholder="Entrer votre prenom" required/>
        </div>


        <div class="mb-3">
            <label class="form-label">Mot de passe</label>
            <select name="doctorSpecilization" class="form-control"  required="required">
                <option value="">Selectionner la spécialité</option>



                <?php

                require_once 'bdd/bdd.php';


                $bdd = new bdd;
                $req=$bdd->getStart()->prepare("select * from doctorspecilization");
                $req->execute(array(
                ));

                $res=$req->fetchall();
                foreach ($res as $req)
                {
                    ?>
                    <option value="<?php echo ($req['specilization']);?>">
                        <?php echo ($req['specilization']);?>
                    </option>
                <?php } ?>

            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Docteur</label>
            <select name="doctor" class="form-control" id="doctor" required="required">
                <option value="">Choisir le docteur</option>

                <?php

                require_once 'bdd/bdd.php';


                $bdd = new bdd;
                $req=$bdd->getStart()->prepare('SELECT * FROM utilisateurs WHERE role="MED"');
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
            <label class="form-label">Date du rendez-vous </label>
            <input class="form-control form-control-lg" type="date" name="RDVdate" placeholder="Entrer votre date de rendez-vous"/>
        </div>

        <div class="mb-3">
            <label class="form-label">Heure du rendez-vous </label>
            <input class="form-control form-control-lg" type="time" name="RDVheure" placeholder="Entrer l'heure"/>
        </div>

        <div class="col-lg-12 no-pdd">
            <button type="submit" class="btn btn-lg btn-primary" value="submit">Prendre rendez-vous</button>
        </div>

        <?php
        if (isset($_SESSION['erreur_inscr']))
        {
            echo "<div style='color:#ff0000'>
                            ".$_SESSION['erreur_inscr'];
            unset($_SESSION['erreur_inscr']);
        }
        ?>

    </form>

</div>



<script src="../js/app.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/popper.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript" src="../lib/slick/slick.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>

</body>

</html>