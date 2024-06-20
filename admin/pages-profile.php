<?php
session_start();
require '../admin/php/connexion.php';
$requete1 = 'SELECT * FROM users WHERE email=\'' . $_SESSION["admin"] . '\'';
$resultat1 = $connexion->query($requete1);
while ($ligne = $resultat1->fetch_assoc()) {
    $fullname = $ligne["fullname"];
    $email = $ligne["email"];
    $localisation = $ligne["localisation"];
    $telephone = $ligne["telephone"];
    $image_bin = $ligne['image'];
    $imageData = base64_encode($image_bin);
    $adresse = $ligne['adresse'];
}
echo '<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Vaika Location Admin">
    <meta name="robots" content="noindex,nofollow">
    <title>Vaika Location admin_profil</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/niceadmin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./img/Icon.ico">
    <link rel="stylesheet" href="css/vendor/bootstrap-icons/bootstrap-icons.min.css">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full"
        data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
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
                            
                            <span class="logo-text">
                                <img src="img/logo_vaika_location.png" class="light-logo" alt="Accueil" style="width: 100px;margin-left: 14px;" />
                            </span>
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
                                <img src="data:image/jpeg;base64,' . $imageData . '" alt="user" class="rounded-circle" width="31">
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
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
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
            </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Profile</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Accueil</a>
                                    </li>
                                    <li class="active" aria-current="page"><i class="bi bi-chevron-right"></i> Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3">
                        <div class="card">
                            <div class="card-body">';
                            echo '<style>
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
                            </style>';
                                if($_SESSION["update_success"] === "update_success"){
                                    echo '<p style="position: fixed;top: -16px;font-size: 14px;
                                    color: green;z-index: 100;left: 50%;animation:message 5s linear">
                                        Modification réussi !
                                    </p>';
                                    $_SESSION["update_success"] = "";
                                }
                                
                                echo '<center class="mt-4"> <img src="data:image/jpeg;base64,' . $imageData . '"
                                        class="rounded-circle" width="150" />
                                        <form class="form-horizontal form-material mx-2" action="./php/update_admin.php" method="post" enctype="multipart/form-data">
                                        <div class="file-upload">
                                            <label for="file-input" class="file-label">
                                                <img src="css/vendor/bootstrap-icons/camera.svg" alt="Changer de photo">
                                            </label>
                                            <input name="image" type="file" id="file-input" class="file-input" accept="image/*">
                                        </div><br>
                                        <script>
                                            var fileInput = document.getElementById("file-input");
                                            var profilImage = document.getElementById("profil-image");

                                            fileInput.addEventListener("change", function () {
                                                var file = fileInput.files[0]; // Récupère le premier fichier sélectionné

                                                if (file) {
                                                    var reader = new FileReader();

                                                    reader.onload = function (e) {
                                                        profilImage.src = e.target.result;
                                                    };
                                                    reader.readAsDataURL(file);
                                                }
                                            });

                                        </script>
                                    <h4 class="card-title mt-2">';
                                    echo $fullname;
                                    echo '</h4>
                                    <h6 class="card-subtitle">Administrateur</h6>
                                </center>
                            </div>
                            <div>
                                <hr>
                            </div>
                            <div class="card-body"> <small class="text-muted">Adresse email </small>
                                <h6>';
                                echo $email;
                                echo '</h6> <small class="text-muted pt-4 db">Téléphone</small>
                                <h6>';
                                echo $telephone;
                                echo '</h6> <small class="text-muted pt-4 db">Adresse</small>
                                <h6>';
                                echo $adresse;
                                echo '</h6>
                                <br />
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9">
                        <div class="card">
                            <div class="card-body">
                                
                                    <div class="form-group">
                                        <label class="col-md-12">Nom et prénom(s) :</label>
                                        <div class="col-md-12">
                                            <input type="text" value="';
                                            echo $fullname;
                                            echo '" name="name_admin" placeholder="Nom complet"
                                                class="form-control form-control-line">
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email :</label>
                                        <div class="col-md-12">
                                            <input type="email" value="';
                                            echo $email;
                                            echo'" name="email_admin" placeholder="Email"
                                                class="form-control form-control-line" name="example-email"
                                                id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Mot de passe :</label>
                                        <div class="col-md-12">
                                            <input type="password" name="password_admin"
                                                class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Téléphone :</label>
                                        <div class="col-md-12">
                                            <input type="text" value="';
                                            echo $telephone;
                                            echo '" name="telephone" placeholder="Numéro téléphone"
                                                class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Adresse :</label>
                                        <div class="col-md-12">
                                            <input type="text" value="';
                                            echo $adresse;
                                            echo '" name="addresse_admin" placeholder="Localisation"
                                                class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success text-white" type="submit">Modifier le profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
            </div>
            <footer class="footer text-center">
            Tous droits réservés par Brique web. Conçu et développé par
                <a href="https://www.briqueweb.com">Brique Web</a>.
            </footer>
        </div>
    </div>
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

</html>';
?>