

<div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="index.html">
                <span class="align-middle">Hôpital</span>
            </a>

            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Pages
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="rdvpatient.php">
                        <i class="align-middle" data-feather="user"></i> <span class="align-middle">Consulter dossier d'admission</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="pages-sign-in.html">
                        <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Ajouter un Utilisateur</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="pages-sign-up.html">
                        <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Ajouter un administrateur</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="pages-blank.html">
                        <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Ajouter un Medecin</span>
                    </a>
                </li>

                <li class="sidebar-item">
                <a class="sidebar-link" href="pages-blank.html">
                    <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Ajouter un Urgentiste</span>
                </a>
                </li>

                <li class="sidebar-header">
                    Utilisateur
                </li>
                 <li class="sidebar-item">
                    <?php
                    include'../class/mvc/Manager_User.php';
                    if ($_SESSION['role'] == "ADM") {

                        echo'<li class="sidebar-item">
                                <a class="sidebar-link" href="datatableAdmin.php">
                                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Administrateur</span>
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

                        echo'<li class="sidebar-item">
                                <a class="sidebar-link" href="datatableRDV.php">
                                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Patient</span>
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
                    if ($_SESSION['role'] == "MED") {

                        echo'<li class="sidebar-item">
                                <a class="sidebar-link" href="datatableMedecin.php">
                                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Médecin</span>
                                </a>
                             </li>';

                        echo'<li class="sidebar-item">
                                <a class="sidebar-link" href="prise_rdv.php">
                                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Rendez-vous</span>
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

                        echo'<li class="sidebar-item">
                                <a class="sidebar-link" href="datatableUrgentiste.php">
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

                        echo'<li class="sidebar-item">
                                <a class="sidebar-link" href="datatableRDV.php">
                                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Mes rendez-vous</span>
                                </a>
                             </li>
                                <li class="sidebar-item">
                                <a class="sidebar-link" href="prise_rdv.php">
                                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Prise de RDV</span>
                                </a>
                             </li>
                             ';
                    }
                    else {
                    echo "";
                    }

                    ?>
             </li>
        </div>
    </nav>
