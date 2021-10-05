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
                <div class="cm-logo">

                </div><!--fin cmp-info-->
              </div>
              <div class="col-lg-6">
                <div class="login-sec">
                  <ul class="sign-control">
                    <li data-tab="tab-1"><a href="connexion.php" title="">Se connecter</a></li>
                    <li data-tab="tab-2" class="current"><a href="#" title="">S'inscrire</a></li>
                  </ul>

                  <div class="sign_in_sec current" id="tab-2">
                    <h3>S'inscrire</h3>
                    <div class="dff-tab current" id="tab-3">
                      <form action="class/mvc/cible_inscription.php" method="post">
                        <div class="row">
                          <div class="col-lg-12 no-pdd">
                            <div class="sn-field">
                              <input type="text" name="nom" required placeholder="Nom">
                              <i class="la la-user"></i>
                            </div>
                          </div>
                          <div class="col-lg-12 no-pdd">
                            <div class="sn-field">
                              <input type="text" name="prenom" required placeholder="Prénom">
                              <i class="la la-user"></i>
                            </div>
                          </div>
                          <div class="col-lg-12 no-pdd">
                            <div class="sn-field">
                              <input type="mail" name="email" required placeholder="Adresse éléctronique">
                              <i class="la la-globe"></i>
                            </div>
                          </div>

                          <div class="col-lg-12 no-pdd">
                            <div class="sn-field">
                              <input type="password" name="mdp" required placeholder="Mot de passe">
                              <i class="la la-lock"></i>
                            </div>
                          </div>
                          <div class="col-lg-12 no-pdd">
                            <div class="sn-field">
                              <input type="password" name="confirmmdp" required placeholder="Retapez le mot de passe">
                              <i class="la la-lock"></i>
                            </div>
                          </div>

                          <div class="col-lg-12 no-pdd">
                            <button type="submit" value="submit">Commencer</button>
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
                    </div><!--dff-tab end-->

                  </div>
                </div><!--login-sec end-->
              </div>
            </div>
          </div><!--signin-pop end-->


        </div><!--theme-layout end-->
      </div>
    </div>

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
