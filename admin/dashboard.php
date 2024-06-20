
<!DOCTYPE html><?php
    session_start();
    require '../admin/php/connexion.php';
    $requete1 = 'SELECT image FROM users WHERE email=\'' . $_SESSION["admin"] . '\'';
    $resultat1 = $connexion->query($requete1);
    while ($ligne = $resultat1->fetch_assoc()) {
        $image_bin = $ligne['image'];
        $imageData = base64_encode($image_bin);
    }
?>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>Vaika Location_Admin</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./img/Icon.ico">
    <!-- Custom CSS -->
    <link href="css/chartist.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/material-design-iconic-font/css/material-design-iconic-font.css">
    <link rel="stylesheet" href="css/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="css/material-design-iconic-font/fonts/materialdesignicons-webfont.svg">
    <link rel="stylesheet" href="css/vendor/bootstrap-icons/bootstrap-icons.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
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
                            <!-- Logo icon -->
                            <b class="logo-icon">
                                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                <!-- Dark Logo icon -->
                                <img src="img/logo-icon.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="img/logo_vaika_location.png" style="width: 100px;margin-left: 14px;" alt="homepage" class="light-logo" />
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
                        <h4 class="page-title">Tableau de bord</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Accueil</a>
                                    </li>
                                    
                                    <li class="active" aria-current="page"><i class="bi bi-chevron-compact-right"></i>Tableau de bord</li>
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
                <!-- Email campaign chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><i class="bi bi-calendar-week-fill "></i> Nombre de réservation par jour</h4>
                                <canvas id="myChart"></canvas>
                                    <?php
                                    include("php/connexion.php");
                                        // Exécutez une requête SQL pour récupérer les données de réservation, en extrayant la partie "date"
                                        $sql = "SELECT DATE(date_r) as date, COUNT(*) as nombre_reservations FROM reservation GROUP BY DATE(date_r)";
                                        $result = $connexion->query($sql);

                                        // Initialisez des tableaux pour stocker les données
                                        $dates = [];
                                        $nombre_reservations = [];

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                // Stockez les données dans les tableaux
                                                $dates[] = $row['date'];
                                                $nombre_reservations[] = $row['nombre_reservations'];
                                            }
                                        }

                                        // Fermez la connexion à la base de données
                                        $connexion->close();
                                    ?>

                                    <script>
                                        var ctx = document.getElementById('myChart').getContext('2d');

                                        // Données récupérées de la base de données
                                        var dates = <?php echo json_encode($dates); ?>;
                                        var nombreReservations = <?php echo json_encode($nombre_reservations); ?>;

                                        // Créez un graphique en barres
                                        var myChart = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: dates, // Les dates iront sur l'axe X
                                                datasets: [
                                                    {
                                                        label: 'Nombre de réservations par jour',
                                                        data: nombreReservations, // Le nombre de réservations ira sur l'axe Y
                                                        backgroundColor: 'rgba(20, 214, 13, 0.2)',
                                                        borderColor: 'rgba(56, 31, 2, 1)',
                                                        borderWidth: 1,
                                                    },
                                                ],
                                            },
                                            options: {
                                                scales: {
                                                    x: {
                                                        title: {
                                                            display: true,
                                                            text: 'Date de réservation (jour)',
                                                        },
                                                    },
                                                    y: {
                                                        beginAtZero: true,
                                                        title: {
                                                            display: true,
                                                            text: 'Nombre de réservations',
                                                        },
                                                    },
                                                },
                                            },
                                        });
                                    </script>         
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                        <?php
                            // Incluez votre code de connexion à la base de données ici
                            include("php/connexion.php");

                            // Exécutez la requête SQL pour récupérer la somme des prix par jour
                            $sql = "SELECT DATE(date_r) as date, SUM(prix_car_r) as total_prix
                                    FROM reservation
                                    GROUP BY DATE(date_r)";
                            $result = $connexion->query($sql);

                            // Initialisez des tableaux pour stocker les données
                            $dates = [];
                            $totalPrix = [];

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    // Stockez les données dans les tableaux
                                    $dates[] = $row['date'];
                                    $totalPrix[] = $row['total_prix'];
                                }
                            }

                            // Fermez la connexion à la base de données
                            $connexion->close();
                        ?>

                        <!-- Affichez les données dans HTML -->
                        <div class="card-body">
                            <h5 class="card-title mb-1"><i class="bi bi-cash-stack"></i> Gains du site</h5>
                            <h3 class="font-light">
                                <?php
                                if (!empty($totalPrix)) {
                                    $totalAriary = array_sum($totalPrix); // Calculez la somme totale en Ariary
                                    echo 'Total en Ariary : ' . $totalAriary;
                                } else {
                                    echo 'Aucune donnée disponible';
                                }
                                ?>
                            </h3>
                            <div class="mt-3 text-center">
                                <canvas id="earnings"></canvas>
                            </div>
                        </div>

                        <script>
                            var ctx = document.getElementById('earnings').getContext('2d');

                            // Données de gains par jour
                            var earningsData = <?php echo json_encode($totalPrix); ?>;
                            var dates = <?php echo json_encode($dates); ?>;

                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: dates,
                                    datasets: [
                                        {
                                            label: 'Gain à une date',
                                            data: earningsData,
                                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                            borderColor: 'rgba(75, 192, 192, 1)',
                                            borderWidth: 1,
                                        },
                                    ],
                                },
                                options: {
                                    scales: {
                                        x: {
                                            display: false, // Masquer l'axe X
                                        },
                                        y: {
                                            display: false, // Masquer l'axe Y
                                        },
                                    },
                                },
                            });
                        </script>

                            
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-0"><i class="bi bi-people"></i> Utilisateurs</h4>
                                <?php
                                    include("php/connexion.php");

                                    // Exécutez une requête SQL pour compter le nombre d'utilisateurs
                                    $sql = "SELECT COUNT(*) as total_users FROM customer";
                                    $result = $connexion->query($sql);

                                    // Initialisez un tableau pour stocker le nombre d'utilisateurs
                                    $allCustomers = [];

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            // Ajoutez le nombre d'utilisateurs dans le tableau
                                            $allCustomers['total_users'] = $row['total_users'];
                                        }
                                    }
                                    // Fermez la connexion à la base de données
                                    $connexion->close();
                                    ?>

                                <h2 class="font-light" style="margin-top: 13px;"><?php echo $allCustomers['total_users'] ?> <i class="bi bi-person-arms-up"></i>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Email campaign chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Ravenue - page-view-bounce rate -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><i class="bi bi-stopwatch"></i> Dernières réservations</h4>
                            </div>
                            
                            <?php
                                // Incluez votre code de connexion à la base de données ici
                                include("php/connexion.php");
                                // Exécutez une requête SQL pour récupérer les données de réservation
                                $sql = "SELECT *
                                        FROM reservation 
                                        ORDER BY date_r DESC 
                                        LIMIT 6";
                                $result = $connexion->query($sql);
                                // Vérifiez s'il y a des données à afficher
                                if ($result->num_rows > 0) {
                                    echo '<div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="border-top-0"><i class="bi bi-car-front-fill"></i> Voiture</th>
                                                        <th class="border-top-0"><i class="bi bi-arrow-left-right"></i> Itinéraire</th>
                                                        <th class="border-top-0"><i class="bi bi-envelope"></i> Email</th>
                                                        <th class="border-top-0"><i class="bi bi-cash"></i> Prix Location</th>
                                                        <th class="border-top-0"><i class="bi bi-chat-left-dots"></i> Demande</th>
                                                    </tr>
                                                </thead>
                                                <tbody>';

                                    while ($row = $result->fetch_assoc()) {
                                        // Calcul de la différence en jours entre la date actuelle et la date de réservation
                                        $dateReservation = new DateTime($row['date_r']);
                                        $dateActuelle = new DateTime();
                                        $difference = $dateActuelle->diff($dateReservation)->days;
                                        
                                        // Affichage des données dans le tableau
                                        echo '<tr>';
                                        echo '<td>' . $row['modele_car_r'] . '</td>';
                                        echo '<td>' . $row['itineraire'] . '</td>';
                                        echo '<td>' . $row['email'] . '</td>';
                                        echo '<td>' . $row['prix_car_r'] . ' Ar</td>';
                                        if($difference == 0){
                                            echo '<td>Aujourd\'hui</td>';
                                        }else{
                                            if($difference == 1){
                                                echo '<td>' . $difference . ' jour</td>';
                                            }else{
                                                echo '<td>' . $difference . ' jours</td>';
                                            }
                                        }
                                        echo '</tr>';
                                    }

                                    echo '</tbody>
                                        </table>
                                        </div>';
                                } else {
                                    echo "Aucune réservation trouvée.";
                                }

                                    // Fermez la connexion à la base de données
                                $connexion->close();
                            ?>


                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Ravenue - page-view-bounce rate -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Nouveau contact</h4>
                            </div>
                            <div class="comment-widgets" style="height:430px;">
                                <!-- Comment Row -->
                                <?php
                                    include("php/connexion.php");
                                    // Exécutez une requête SQL pour récupérer les commentaires de la table commentaire
                                    $sql = "SELECT * FROM contact_us";
                                    $result = $connexion->query($sql);

                                    // Vérifiez s'il y a des données à afficher
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            // Affichez chaque commentaire dans le bloc HTML
                                            echo '<div class="d-flex flex-row comment-row">
                                                    
                                                    <div class="comment-text w-100">
                                                        <h6 class="font-medium" style="color:#28863C">' . $row['email_c'] . '</h6>
                                                        <div style="margin-left:20px">
                                                            <span class="mb-3 d-block"><i class="bi bi-person-raised-hand"></i> Suject : ' . $row['message_c'] . '</span>
                                                            <span ><i class="bi bi-envelope"></i> Message : ' . $row['description_c'] . '</span>
                                                        </div >
                                                             <div class="comment-footer">
                                                            <span class="text-muted float-end">' . date('F d, Y', strtotime($row['date'])) . '</span>
                                                            
                                                        </div>
                                                    </div>
                                                </div>';
                                        }
                                    } else {
                                        echo "Aucun commentaire trouvé.";
                                    }

                                    // Fermez la connexion à la base de données
                                    $connexion->close();
                                ?>

                            </div>
                        </div>
                    </div>
                    <!-- column -->
                    <div class="col-lg-6">
                        <div class="card">
                        <div class="card-body">
                                <h4 class="card-title">Récent Commentaires</h4>
                            </div>
                            <div class="comment-widgets" style="height:430px;">
                                <!-- Comment Row -->
                                <?php
                                    include("php/connexion.php");
                                    // Exécutez une requête SQL pour récupérer les commentaires de la table commentaire
                                    $sql = "SELECT contenu, date_creation FROM commentaire";
                                    $result = $connexion->query($sql);

                                    // Vérifiez s'il y a des données à afficher
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            // Affichez chaque commentaire dans le bloc HTML
                                            echo '<div class="d-flex flex-row comment-row">
                                                    <div class="p-2">
                                                        <img src="img/commenter.png" alt="user" width="50" class="rounded-circle">
                                                    </div>
                                                    <div class="comment-text w-100">
                                                        <span class="mb-3 d-block">' . $row['contenu'] . '</span>
                                                        <div class="comment-footer">
                                                            <span class="text-muted float-end">' . date('F d, Y', strtotime($row['date_creation'])) . '</span>
                                                            
                                                        </div>
                                                    </div>
                                                </div>';
                                        }
                                    } else {
                                        echo "Aucun commentaire trouvé.";
                                    }

                                    // Fermez la connexion à la base de données
                                    $connexion->close();
                                ?>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
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
                <a href="https://www.briqueweb.com">Briqueweb</a>.
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
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="js/chartist.min.js"></script>
    <script src="js/chartist-plugin-tooltip.min.js"></script>
    <script src="js/dashboard1.js"></script>
</body>

</html>