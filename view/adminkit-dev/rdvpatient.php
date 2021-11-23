<div class="collapse" id="d">
  <div class="card card-body">
      <h3>Ajouter un dossier d'admission</h3>
      <div class="card">
              <div class="card-body">
                 <?php
                require_once '../adminkit-dev/bdd/bdd.php';


                $bdd = new bdd;
                $req=$bdd->getStart()->prepare('SELECT * FROM dossier_admission  ORDER BY id DESC');
                $req->execute(array(
                ));

                $res=$req->fetchall();
$res=$req fetchall ();
         <table id="employee_data" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <td>Nom</td>
                                 <td>Date de naissance</td>
                                  <td>Mutuelle</td>
                                   <td>Numéro de sécurité social</td>
                                    <td>Option</td>
                                     <td>Régime spécifique</td>


                            </tr>
                            </thead>
                            <?php
                            foreach($res as $row )
                            {
                                echo '
                               <tr>
                <td>'.$row["nom"].'</td>
                 <td>'.$row["date_naissance"].'</td>
                  <td>'.$row["mutuelle"].'</td>
                   <td>'.$row["numero_secu"].'</td>
                    <td>'.$row["option"].'</td>
                     <td>'.$row["regime_specifique"].'</td>


                </tr>
                ';
                            }
                            ?>
                        </table>
                <div class="m-sm-4">
                    <form action="class/mvc/cible_admission.php" method="post">
                      <div class="mb-3">
                      <label class="form-label">Nom</label>
                      <select name="nom" class="form-control" required="required">
                                                    <option value="">Selectionner le patient</option>



                                                    <?php

                                                    require_once '../adminkit-dev/bdd/bdd.php';


                                                    $bdd = new bdd;
                                                    $req=$bdd->getStart()->prepare("select nom from utilisateurs WHERE role='PAT'");
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
                      <label class="form-label">Date de naissance</label>
                      <input class="form-control form-control-lg" type="date" name="date_naissance" placeholder="Entrer votre date de naissance" required/>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Adresse postale</label>
                      <input class="form-control form-control-lg" type="text" name="adresse_postale" placeholder="Entrer votre adresse postale" required/>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Mutuelle</label>
                      <input class="form-control form-control-lg" type="int" name="mutuelle" placeholder="Entrer votre numéro de Mutuelle" required/>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Numéro de sécurité social</label>
                      <input class="form-control form-control-lg" type="int" name="numero_secu" placeholder="Entrer votre numéro de sécurité social" required/>
                    </div>
                     <div class="mb-3">
                      <label class="form-label">Option</label>
                        <select id="select-state"  placeholder="" name="option">
                              <option value="television">Télévision</option>
                              <option value="wifi">Wifi</option>

                            </select>
                    </div>
                     <div class="mb-3">
                      <label class="form-label">Régime spécifique</label>
                      <input class="form-control form-control-lg" type="text" name="regime_specifique" placeholder="Entrer si vous avez un Régime spécifique" required/>
                    </div>
                    <div class="mb-3">
                   <input type="checkbox" name="role"
                           checked disabled>
                    <label value="PAT" for="PAT">Patient</label>
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
