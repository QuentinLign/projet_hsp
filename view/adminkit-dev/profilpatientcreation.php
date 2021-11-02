<?php
session_start();
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

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-up.html" />

	<title>Inscription</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">C'est parti</h1>
							<p class="lead">
								Commencez à créer la meilleure expérience utilisateur possible pour vos clients.
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form action="class/mvc/cible_inscription.php" method="post">
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
										<div class="col-lg-12 no-pdd">
                            <button type="submit" class="btn btn-lg btn-primary" value="submit">Commencer</button>
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
	</main>

	<script src="js/app.js"></script>

</body>

</html>
