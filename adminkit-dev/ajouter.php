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
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

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
<p>

    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#adm" aria-expanded="false" aria-controls="c">
        Créer un compte administrateur
    </button>

    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#p" aria-expanded="false" aria-controls="c">
        Créer un compte patient
    </button>
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#m" aria-expanded="false" aria-controls="c">
        Créer un compte médecin
    </button>
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#u" aria-expanded="false" aria-controls="c">
        Créer un compte urgentiste
    </button>
</p>


<div class="collapse" id="adm">
    <div class="card card-body">
        <h3>Ajouter un administrateur</h3>
        <div class="card">
            <div class="card-body">
                <div class="m-sm-4">
                    <form action="class/mvc/cible_adm.php" method="post">
                        <div class="mb-3">
                            <label class="form-label">Nom</label>
                            <input class="form-control form-control-lg" type="text" name="nom" placeholder="Entrer votre nom" required/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Prenom</label>
                            <input class="form-control form-control-lg" type="text" name="prenom" placeholder="Entrer votre prenom" required/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input class="form-control form-control-lg" type="email" name="email" placeholder="Entrer votre email" required/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mot de passe</label>
                            <input class="form-control form-control-lg" type="password" name="mdp" placeholder="Entrer votre mot de passe" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Valider mot de passe</label>
                            <input class="form-control form-control-lg" type="password" name="confirmmdp" placeholder="valider votre mot de passe" required/>
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

<div class="collapse" id="p">
    <div class="card card-body">
        <h3>Ajouter un patient</h3>
        <div class="card">
            <div class="card-body">
                <div class="m-sm-4">
                    <form action="class/mvc/cible_patient_admin.php" method="post">
                        <div class="mb-3">
                            <label class="form-label">Nom</label>
                            <input class="form-control form-control-lg" type="text" name="nom" placeholder="Entrer votre nom" required/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Prenom</label>
                            <input class="form-control form-control-lg" type="text" name="prenom" placeholder="Entrer votre prenom" required/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input class="form-control form-control-lg" type="email" name="email" placeholder="Entrer votre email" required/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mot de passe</label>
                            <input class="form-control form-control-lg" type="password" name="mdp" placeholder="Entrer votre mot de passe" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Valider mot de passe</label>
                            <input class="form-control form-control-lg" type="password" name="confirmmdp" placeholder="valider votre mot de passe" required/>
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

<div class="collapse" id="m">
    <div class="card card-body">
        <h3>Ajouter un médecin</h3>
        <div class="card">
            <div class="card-body">
                <div class="m-sm-4">
                    <form action="class/mvc/cible_inscrimed.php" method="post">
                        <div class="mb-3">
                            <label class="form-label">Nom</label>
                            <input class="form-control form-control-lg" type="text" name="nom" placeholder="Entrer votre nom" required/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Prenom</label>
                            <input class="form-control form-control-lg" type="text" name="prenom" placeholder="Entrer votre prenom" required/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input class="form-control form-control-lg" type="email" name="email" placeholder="Entrer votre email" required/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mot de passe</label>
                            <input class="form-control form-control-lg" type="password" name="mdp" placeholder="Entrer votre mot de passe" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Valider mot de passe</label>
                            <input class="form-control form-control-lg" type="password" name="confirmmdp" placeholder="valider votre mot de passe" required/>
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

<div class="collapse" id="u">
    <div class="card card-body">
        <h3>Ajouter un urgentiste</h3>
        <div class="card">
            <div class="card-body">
                <div class="m-sm-4">
                    <form action="class/mvc/cible_ins_urg.php" method="post">
                        <div class="mb-3">
                            <label class="form-label">Nom</label>
                            <input class="form-control form-control-lg" type="text" name="nom" placeholder="Entrer votre nom" required/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Prenom</label>
                            <input class="form-control form-control-lg" type="text" name="prenom" placeholder="Entrer votre prenom" required/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input class="form-control form-control-lg" type="email" name="email" placeholder="Entrer votre email" required/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mot de passe</label>
                            <input class="form-control form-control-lg" type="password" name="mdp" placeholder="Entrer votre mot de passe" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Valider mot de passe</label>
                            <input class="form-control form-control-lg" type="password" name="confirmmdp" placeholder="valider votre mot de passe" required/>
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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>