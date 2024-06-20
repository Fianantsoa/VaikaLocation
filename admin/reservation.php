<?php
    session_start();
    require '../admin/php/connexion.php';
    $requete1 = 'SELECT image FROM users WHERE email=\'' . $_SESSION["admin"] . '\'';
    $resultat1 = $connexion->query($requete1);
    while ($ligne = $resultat1->fetch_assoc()) {
        $image_bin = $ligne['image'];
        $imageData = base64_encode($image_bin);
    }
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="location, vaika, reservation">
    <meta name="robots" content="noindex,nofollow">
    <title>Vaika Location_voitures</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./img/Icon.ico">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/vendor/bootstrap-icons/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/icons/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="css/material-design-iconic-font/css/material-design-iconic-font.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full"
        data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <a href="../index.php" class="logo">
                            <!-- Logo icon -->
                            <b class="logo-icon">
                                <img style="width: 100px;margin-left:14px;" src="img/logo_vaika_location.png" alt="homepage" class="light-logo" />
                            </b>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-start me-auto">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box">
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter">
                                <a class="srh-btn">
                                    <i class="ti-close"></i>
                                </a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-end">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php
                                echo '<img src="data:image/jpeg;base64,' . $imageData . '" alt="user" class="rounded-circle" width="31">';
                            ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="pages-profile.php"><i class="bi bi-person-bounding-box"></i>
                                    Mon profil</a>
                                <a class="dropdown-item" href="dashboard.php"><i class="bi bi-cash-stack"></i>
                                    Mon solde</a>
                                <a class="dropdown-item" href="php/logout_admin.php"><i class="bi bi-door-open"></i>
                                    Déconnexion</a>
                            </ul>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard.php"
                                aria-expanded="false">
                                <i class="bi bi-pc-display"></i>
                                <span class="hide-menu">Tableau de bord</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pages-profile.php"
                                aria-expanded="false">
                                <i class="bi bi-people-fill"></i>
                                <span class="hide-menu">Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="cars.php"
                                aria-expanded="false">
                                <i class="bi bi-car-front"></i>
                                <span class="hide-menu">Voitures</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="reservation.php"
                                aria-expanded="false">
                                <i class="bi bi-bookmark-x-fill"></i>
                                <span class="hide-menu">Réservation</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="customers.php"
                                aria-expanded="false">
                                <i class="bi bi-person-workspace"></i>
                                <span class="hide-menu">Utilisateurs</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="contact.php"
                                aria-expanded="false">
                                <i class="bi bi-telephone-outbound-fill"></i>
                                <span class="hide-menu">Contact</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="comment.php"
                                aria-expanded="false">
                                <i class="bi bi-box2-heart-fill"></i>
                                <span class="hide-menu">Commentaires</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="slides.php"
                                aria-expanded="false">
                                <i class="bi bi-chevron-bar-contract" style="rotate: 90deg;"></i>
                                <span class="hide-menu">Slide</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="conf_smtp.php"
                                aria-expanded="false">
                                <i class="bi bi-envelope-at-fill"></i>
                                <span class="hide-menu">SMTP</span>
                            </a>
                        </li>
                    </ul></nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Réservations</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Accueil</a>
                                    </li>
                                    <li class="bi bi-chevron-right active" aria-current="page">Réservation</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            <style>
                                    @keyframes message {
                                        0% {
                                            transform: translateY(-11px);
                                        }
                                        5% {
                                            transform: translateY(20px);
                                        }95% {
                                            transform: translateY(20px);
                                        }100% {
                                            transform: translateY(-11px);
                                        }
                                    }
                                </style>
                                <?php
                                    if($_SESSION['delete_reservation_success'] === "success"){
                                        echo '<p style="position: fixed;font-size: 14px;
                                        color: green;z-index: 100;top: -19px;left: 50%;animation:message 5s linear">
                                            Suppression réussi !
                                        </p>';
                                        $_SESSION["delete_reservation_success"] = "";
                                    }
                                ?>
                                <h4 class="card-title">Liste des réservations</h4>
                                <h6 class="card-subtitle">Vous pouvez consulter tous 
                                    les demandes de location de voiture ici.</h6>
                                <?php include("php/post_reservation_admin.php") ?>

                            </div>
                            
                        </div>
                    </div>

                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
            Tous droits réservés par Brique web. Conçu et développé par
                <a href="https://www.briqueweb.com">Brique Web</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
</body>

</html>