	<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								
							</a>
						
						</li>
                        <li class="nav-item dropdown"></li>
							  <?php
            if (isset($_SESSION['nom']))
            {
              echo '<div class="user-info">
              <i class="la la-sort-down"></i>
              </div>
              <li>
              <div class="user-account-settingss">
              <h5><a href="../mon_compte/mon-compte.php">Mon Compte</a></h5>
              
              <h5 class="tc"><a href="../class/mvc/deconnexion.php" title="">Se déconnecter</a></h5>
              </div></li><!--fin des paramètres du compte utilisateur-->';
            }
            else
            {
              echo '<div class="user-info">
              <i class="la la-sort-down"></i>
              </div>
              <div class="user-account-settingss">
              <h5><a href="../../connexion.php" title="">Connexion</a></h5>
              <h5><a href="../../inscription.php" title="">Inscription</a></h5>
              </div><!--fin des paramètres du compte utilisateur-->';
            }
            ?>
							
              </a>
							
						
					</ul>
				</div>
			</nav>