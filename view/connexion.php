<?php
session_start();
?>
<!DOCTYPE html>
<html>



<body class="sign-in">


  <div class="wrapper">


    <div class="sign-in-page">
      <div class="signin-popup">
        <div class="signin-pop">
          <div class="row">
            <div class="col-lg-6">
              <div class="cmp-info">
                  <a href="../index.php">
                    <img src="../images/cm-main-img.png" alt="">
                  </a>
                </div><!--fin cmp-info-->
              </div>
              <div class="col-lg-6">
                <div class="login-sec">
                  <ul class="sign-control">
                    <li class="current"><a href="#" title="">Se connecter</a></li>
                    <li><a href="inscription.php">S'Inscrire</a></li>
                  </ul>
                  <div class="sign_in_sec current" id="tab-1">

                    <h3>Se Connecter</h3>
                    <form method="post" action="class/mvc/cible_connexion.php">
                      <div class="row">
                        <div class="col-lg-12 no-pdd">
                          <div class="sn-field">
                            <input type="text" name="email" required placeholder="Adresse éléctronique">
                            <i class="la la-user"></i>
                          </div><!--sn-field end-->
                        </div>
                        <div class="col-lg-12 no-pdd">
                          <div class="sn-field">
                            <input type="password" name="mdp" required placeholder="Mot de passe">
                            <i class="la la-lock"></i>
                          </div>
                        </div>
                        <div class="col-lg-12 no-pdd">
                          <div class="checky-sec">
                            <a href="mdp_oublie.php" title="">Mot de passe oublié ?</a>
                          </div>
                        </div>
                        <div class="col-lg-12 no-pdd">
                          <button type="submit" value="submit">Se connecter</button>
                        </div>
                        <?php
                        if (isset($_SESSION['erreur_co']))
                        {
                          echo "<div style='color:#ff0000'>
                          Mauvais Mail ou mot de passe</div>";

                          unset($_SESSION['erreur_co']);
                        }
                        ?>
                      </div>
                    </form>


                  </div><!--sign_in_sec end-->
                </div>
              </div>
            </div>
          </div><!--signin-pop end-->
        </div><!--signin-popup end-->
      </div><!--sign-in-page end-->


    </div><!--theme-layout end-->

    <div class="footy-sec">
      <div class="container">


        <p><img src="../images/copy-icon.png" alt="">Copyright 2020.</p>
      </div>
    </div><!--footy-sec end-->

    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/popper.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../lib/slick/slick.min.js"></script>
    <!-- <script type="text/javascript" src="../js/script.js"></script> -->
  </body>
  </html>
