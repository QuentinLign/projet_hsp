
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
                    <a class="sidebar-link" href="pages-profile.html">
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
                    <?php
                    require '../class/mvc/Manager_User.php';
                    if ($donnee['role'] == "PAT") {
                        $_SESSION['role'] = $donnee['role'];

                        echo'<li class="sidebar-item">
                                <a class="sidebar-link" href="datatableAdmin.php">
                                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Administrateur</span>
                                </a>
                             </li>';
                    }
                    else {
                    echo "rien";
                    }

                    ?>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="datatableAdmin.php">
                        <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Administrateur</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="datatableRDV.php">
                        <i class="align-middle" data-feather="square"></i> <span class="align-middle">Patient</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="datatableMedecin.php">
                        <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Medecin</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="datatableUrgentiste.php">
                        <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Urgentiste</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="datatableRDV.php">
                        <i class="align-middle" data-feather="align-left"></i> <span class="align-middle">Rendez-vous</span>
                    </a>
                </li>
        </div>
    </nav>