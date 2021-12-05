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
	<link rel="shortcut icon" href="../img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>AdminKit Demo - Bootstrap 5 Admin Template</title>

	<link href="../css/app.css" rel="stylesheet">
	  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
<?php include '../src/nav/navadmin.php';?>
<?php include '../src/nav/top_navadmin.php';?>

			<main class="content">
         <div>
     <?php if(isset($_SESSION['message_mdp']))
                          {
                            echo $_SESSION['message_mdp'];
                            unset($_SESSION['message_mdp']);
                          } 
                          

                          ?></div>
				<div class="d-flex align-items-start">
  <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <button class="nav-link active" id="infos" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Mes infos</button>
    <button class="nav-link" id="compte" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Compte</button>
    <button class="nav-link" id="mdp" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Mot de passe</button>
   
  </div>
 
  <div class="tab-content" id="v-pills-tabContent">
    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
    	<h1 class="h3 mb-3"><strong>Mes informations</strong>
					<?php 
					if (isset($_SESSION['nom']))
            		{
					echo htmlspecialchars($_SESSION['nom']);
					}
					?>
					</h1>
					<p>Mon nom : <b><?php echo htmlspecialchars($_SESSION['nom']); ?></b></p>
					<p>Mon prénom : <b><?php echo htmlspecialchars($_SESSION['prenom']); ?></b></p>
					<p>Mon adresse email : <b><?php echo htmlspecialchars($_SESSION['email']); ?></b></p>
            <p>Mon role : <b><?php echo htmlspecialchars($_SESSION['role']); ?></b></p>


    </div>
    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
 <div class="acc-setting">
                    <h3>Mon Compte</h3>
                    <form method="post" action="../class/mvc/traitement_modif.php">
                      <div class="cp-field">
                        <h5>Nom</h5>
                        <div class="cpp-fiel">
                          <input type="text" name="nom" placeholder="Nom" value="<?php echo $_SESSION['nom']; ?>" required>
                        </div>
                      </div>
                      <div class="cp-field">
                        <h5>Prénom</h5>
                        <div class="cpp-fiel">
                          <input type="text" name="prenom" placeholder="Prénom" value="<?php echo $_SESSION['prenom']; ?>" required>
                        </div>
                      </div>
                      <div class="cp-field">
                        <h5>Prénom</h5>
                        <div class="cpp-fiel">
                          <input type="mail" name="email" placeholder="Email" value="<?php echo $_SESSION['email']; ?>" required>
                        </div>
                      </div>
                      <div class="save-stngs pd2">
                        <ul>
                          <li><button type="submit">Sauvegarder</button></li>

                          <?php if(isset($_SESSION['succes_modif']))
                          {
                            echo $_SESSION['succes_modif'];
                            unset($_SESSION['succes_modif']);
                          } ?>

                        </ul>
                      </div><!--save-stngs end-->
                    </form>
                  </div><!--acc-setting end-->

    </div>
    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
      <div class="acc-setting">
                    <h3>Changement de mot de passe</h3>
                    <form method="post" action="../class/mvc/traitement_modif_mdp.php">
                      <div class="cp-field">
                        <h5>Ancien mot de passe</h5>
                        <div class="cpp-fiel">
                          <input type="password" name="amdp" placeholder="" required>
                          <i class="fa fa-lock"></i>
                        </div>
                      </div>
                      <div class="cp-field">
                        <h5>Nouveau mot de passe</h5>
                        <div class="cpp-fiel">
                          <input type="password" name="mdp" placeholder="" required>
                          <i class="fa fa-lock"></i>
                        </div>
                      </div>
                      <div class="cp-field">
                        <h5>Retapez le mot de passe</h5>
                        <div class="cpp-fiel">
                          <input type="password" name="confirmmdp" placeholder="" required>
                          <i class="fa fa-lock"></i>
                        </div>
                      </div>
                      <div class="save-stngs pd2">
                        <ul>
                          <li><button type="submit">Enregistrer</button></li>
                         
                        </ul>
                      </div><!--save-stngs end-->
                    </form>
                  </div><!--acc-setting end-->	


    </div>
    
  </div>
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
 <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../js/popper.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/jquery.mCustomScrollbar.js"></script>
  <script type="text/javascript" src="../lib/slick/slick.min.js"></script>
  <script type="text/javascript" src="../js/script.js"></script>
</body>

</html>