<?php
session_start();

if(!isset($_SESSION['email']))
{
    header('location: connexion.php');
}


require_once 'bdd/bdd.php';

require_once '../adminkit-dev/bdd/bdd.php';


if(isset($_POST['submit']))
{
    $specilization=$_POST['doctorspecilization'];
    $doctorid=$_POST['doctor'];
    $userid=$_SESSION['id'];
    $appdate=$_POST['appdate'];
    $time=$_POST['apptime'];
    $userstatus=1;
    $docstatus=1;
    $bdd = new bdd;
    $req=$bdd->getStart()->prepare("insert into appointement(doctorspecialization,doctorId,userId,consultancyFees,appointmentDate,appointmentTime,userStatus,doctorStatus) values('$specilization','$doctorid','$userid','$appdate','$time','$userstatus','$docstatus'");
    $req->execute(array(
    ));

    if($req)
    {
        echo "<script>alert('Your appointment successfully booked');</script>";
    }

}
?>

<!DOCTYPE html>
<html lang="fr">
    <title>Patient  | Prise de rendez-vous</title>

    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap-theme.min.css">

    <link href="css/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/plugins.css">
    <script>
        function getdoctor(val) {
            $.ajax({
                type: "POST",
                url: "get_doctor.php",
                data:'specilizationid='+val,
                success: function(data){
                    $("#doctor").html(data);
                }
            });
        }
    </script>


    <script>
        function getfee(val) {
            $.ajax({
                type: "POST",
                url: "get_doctor.php",
                data:'doctor='+val,
                success: function(data){
                    $("#fees").html(data);
                }
            });
        }
    </script>

    <div class="main-content" >
        <div class="wrap-content container" id="container">
            <!-- start: PAGE TITLE -->
            <section id="page-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="mainTitle">Utilisateur | Prise de RDV</h1>
                    </div>
            </section>
            <!-- end: PAGE TITLE -->
            <!-- start: BASIC EXAMPLE -->
            <div class="container-fluid container-fullw bg-white">
                <div class="row">
                    <div class="col-md-12">

                        <div class="row margin-top-30">
                            <div class="col-lg-8 col-md-12">
                                <div class="panel panel-white">
                                    <div class="panel-heading">
                                        <h2 class="panel-title">Prise de RDV</h2>
                                    </div>
                                    <div class="panel-body">
                                        <p style="color:red;"><?php echo ($_SESSION['msg1']);?>
                                            <?php echo ($_SESSION['msg1']="");?></p>
                                        <form role="form" name="book" method="post" >



                                            <div class="form-group">
                                                <label for="DoctorSpecialization">
                                                    Doctor Specialization
                                                </label>
                                                <select name="Doctorspecialization" class="form-control" onChange="getdoctor(this.value);" required="required">
                                                    <option value="">Selectionner la spécialité</option>



                                                    <?php

                                                    require_once '../adminkit-dev/bdd/bdd.php';


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

                                            <div class="form-group">
                                                <label for="doctor">
                                                    Doctors
                                                </label>
                                                <select name="doctor" class="form-control" id="doctor" onChange="getfee(this.value);" required="required">
                                                    <option value="">Select Doctor</option>

                                                    <?php

                                                    require_once '../adminkit-dev/bdd/bdd.php';


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

                                            <div class="form-group">
                                                <div class="mb-3">
                                                    <label class="form-label">Date de rendez-vous</label>
                                                    <input class="form-control form-control-lg" type="date" name="date_rendezvous" placeholder="Entrer votre date de rendez-vous" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="Appointmenttime">

                                                    Time

                                                </label>
                                                <input class="form-control" name="apptime" id="timepicker1" required="required">A partir de 8h.
                                            </div>

                                            <button type="submit" name="submit" class="btn btn-o btn-primary">
                                                Valider
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <!-- end: BASIC EXAMPLE -->






            <!-- end: SELECT BOXES -->

        </div>
    </div>
    </div>

    </div>
    </div>
    </div>

    </div>
    <!-- start: MAIN JAVASCRIPTS -->
    <script src="vendor/jquery/jquery.min.js"></script>


    <script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <!-- start: CLIP-TWO JAVASCRIPTS -->
    <!-- start: JavaScript Event Handlers for this page -->
    <script src="assets/js/form-elements.js"></script>
    <script>
        jQuery(document).ready(function() {
            Main.init();
            FormElements.init();
        });

        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
            startDate: '-3d'
        });
    </script>
    <script type="text/javascript">
        $('#timepicker1').timepicker();
    </script>
    <!-- end: JavaScript Event Handlers for this page -->
    <!-- end: CLIP-TWO JAVASCRIPTS -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

    </body>
</html>