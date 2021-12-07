

<div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="../../adminkit-dev/index.php">
                <span class="align-middle">Hôpital</span>
            </a>

            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Option
                </li>
                <?php
                if ($_SESSION['role'] == "ADMIN") {

                    echo '<li class="sidebar-item">
                                <a class="sidebar-link" href="datatableAdmin.php">
                                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Administrateur</span>
                                </a>
                             </li>
                             
                             <li class="sidebar-item">
                                <a class="sidebar-link" href="datatableUser.php">
                                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Patient</span>
                                </a>
                             </li>
                             
                             <li class="sidebar-item">
                                <a class="sidebar-link" href="datatableMedecin.php">
                                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Medecin</span>
                                </a>
                             </li>
                             
                             <li class="sidebar-item">
                                <a class="sidebar-link" href="datatableUrgentiste.php">
                                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Urgentiste</span>
                                </a>
                             </li>
                             
                             <li class="sidebar-item">
                                <a class="sidebar-link" href="datatableRDV.php">
                                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Rendez-vous</span>
                                </a>
                             </li>
                             
                             
                             <li class="sidebar-item">
                                <a class="sidebar-link" href="datatableDossieradm.php">
                                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Dossier Admission</span>
                                </a>
                             </li>
                             
                             
                             <li class="sidebar-item">
                                <a class="sidebar-link" href="ajouter.php">
                                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Ajouter un utilsateur</span>
                                </a>
                             </li>
                            ';


                }
                else {
                    echo "";
                }

                ?>
                </li>

                <li class="sidebar-item">
                    <?php
                    if ($_SESSION['role'] == "MED") {

                        echo '<li class="sidebar-item">
                                <a class="sidebar-link" href="medecin.php">
                                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Mon espace médecin</span>
                                </a>
                             </li>';

                        echo '<li class="sidebar-item">
                                <a class="sidebar-link" href="prise_rdv_med.php">
                                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Afficher mes rendez-vous</span>
                                </a>
                             </li>';
                    }
                    else {
                        echo "";
                    }

                    ?>
                </li>

                <li class="sidebar-item">
                    <?php
                    if ($_SESSION['role'] == "URG") {

                        echo '<li class="sidebar-item">
                                <a class="sidebar-link" href="../../datatable/datatableUrgentiste.php">
                                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Urgentiste</span>
                                </a>
                             </li>';
                    }
                    else {
                        echo "";
                    }

                    ?>
                </li>

                <li class="sidebar-item">
                    <?php
                    if ($_SESSION['role'] == "PAT") {

                        echo '<li class="sidebar-item">
                                <a class="sidebar-link" href="../datatable/datatableRDV.php">
                                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Mes rendez-vous</span>
                                </a>
                             </li>
                                <li class="sidebar-item">
                                <a class="sidebar-link" href="../view_patient/rdv.php">
                                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Prendre un RDV</span>
                                </a>
                             </li>
                             ';
                    }
                    else {
                        echo "";
                    }

                    ?>
                    </ul>
                </li>
             </li>
        </div>
    </nav>
