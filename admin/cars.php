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
    <meta name="keywords" content="location, vaika, reservation">
    <meta name="robots" content="noindex,nofollow">
    <title>Vaika Location_voitures</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./img/Icon.ico">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/vendor/bootstrap-icons/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/icons/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="css/material-design-iconic-font/css/material-design-iconic-font.css">
    <style>
        .input_car {
            background-color: transparent;
            border: none;
        }

        .input_car_edit {
            background-color: white;
            border: 2px solid black;
        }
    </style>
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
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
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
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard.php" aria-expanded="false">
                                <i class="bi bi-pc-display"></i>
                                <span class="hide-menu">Tableau de bord</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pages-profile.php" aria-expanded="false">
                                <i class="bi bi-people-fill"></i>
                                <span class="hide-menu">Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="cars.php" aria-expanded="false">
                                <i class="bi bi-car-front"></i>
                                <span class="hide-menu">Voitures</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="reservation.php" aria-expanded="false">
                                <i class="bi bi-bookmark-x-fill"></i>
                                <span class="hide-menu">Réservation</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="customers.php" aria-expanded="false">
                                <i class="bi bi-person-workspace"></i>
                                <span class="hide-menu">Utilisateurs</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="contact.php" aria-expanded="false">
                                <i class="bi bi-telephone-outbound-fill"></i>
                                <span class="hide-menu">Contact</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="comment.php" aria-expanded="false">
                                <i class="bi bi-box2-heart-fill"></i>
                                <span class="hide-menu">Commentaires</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="slides.php" aria-expanded="false">
                                <i class="bi bi-chevron-bar-contract" style="rotate: 90deg;"></i>
                                <span class="hide-menu">Slide</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="conf_smtp.php" aria-expanded="false">
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
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Voitures</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Accueil</a>
                                    </li>
                                    <li class="bi bi-chevron-right active" aria-current="page">Voitures</li>
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
                                        }

                                        95% {
                                            transform: translateY(20px);
                                        }

                                        100% {
                                            transform: translateY(-11px);
                                        }
                                    }
                                </style>
                                <?php
                                if ($_SESSION["delete_car"] === "succes") {
                                    echo '<p style="position: fixed;font-size: 14px;
                                        color: green;z-index: 100;top: -19px;left: 50%;animation:message 5s linear">
                                            Suppression réussi !
                                        </p>';
                                    $_SESSION["delete_car"] = "";
                                }
                                if ($_SESSION["update_car"] === "succes") {
                                    echo '<p style="position: fixed;font-size: 14px;
                                        color: green;z-index: 100;top: -19px;left: 50%;animation:message 5s linear">
                                            Modification réussi !
                                        </p>';
                                    $_SESSION["update_car"] = "";
                                }
                                if ($_SESSION["add_car"] === "succes") {
                                    echo '<p style="position: fixed;font-size: 14px;
                                        color: green;z-index: 100;top: -19px;left: 50%;animation:message 5s linear">
                                            Ajout réussi !
                                        </p>';
                                    $_SESSION["add_car"] = "";
                                }
                                ?>
                                <div style="display: flex;position:relative">
                                    <div>
                                        <h4 class="card-title">Liste de voiture</h4>
                                        <h6 class="card-subtitle">Vous pouvez consulter tous
                                            les voitures disponibles.</h6>
                                    </div>
                                    <div style="position: absolute;right:0">
                                        <select name="cars" id="carsSelect" style="height: 34px;">
                                            <option value="5">5 Places</option>
                                            <option value="7">7 Places</option>
                                            <option value="9">9 Places</option>
                                            <option value="12">12 Places</option>
                                            <option value="21">21 Places</option>
                                        </select>
                                        <button type="submit" id="add_car" class="btn btn-primary add-button" style="margin-bottom: 3px;"><i class="bi bi-plus"></i> Ajouter</button>
                                    </div>
                                </div>
                                <div class="table-responsive" style="display: none;" id="bloc_add_car">
                                    <table class="table table-striped">
                                        Ajout une voiture
                                        <caption>Ajouter une voiture</caption>
                                        <p style="color: red;font-size:12px">
                                            Pour une expérience optimale,
                                            nous vous recommandons de choisir
                                            une image avec une résolution de <b>720x720
                                                pixels minimum</b> et une image plus long le hauteur que la largeur pour une qualité d'affichage
                                            exceptionnelle sur le site. </p>
                                        <thead>
                                            <tr>
                                                <th scope="col">Image</th>
                                                <th scope="col">Modèle</th>
                                                <th scope="col">Prix</th>
                                                <th scope="col">Cat. de place</th>
                                                <th scope="col">Places</th>
                                                <th scope="col">Carburant</th>
                                                <th scope="col">Consommation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form id="FormAddCar" action="php/add_cars.php" method="POST" enctype="multipart/form-data">
                                                <style>
                                                    .file_label_photo {
                                                        cursor: pointer;
                                                        background-color: #e0e0e0;
                                                        padding: 10px;
                                                        border-radius: 3px;
                                                        margin-top: -9px;
                                                    }

                                                    .file_label_photo:hover {
                                                        background-color: #d2d2d2;
                                                    }
                                                </style>
                                                <td>
                                                    <label for="input_img_a" class="file_label_photo">
                                                        <img style="width: 20px;" src="./css/vendor/bootstrap-icons/camera.svg" alt="Photo">
                                                    </label>
                                                    <input name="image" type="file" id="input_img_a" class="file-input" accept="image/*">
                                                </td>
                                                <td><input type="text" name="modele" id="input_modele_a"></td>
                                                <td><input type="number" name="prix" id="input_prix_a" style="width: 100px;"></td>
                                                <td>
                                                    <select name="places" id="input_place_a" style="background-color: white;height: 27px;border: 1px solid #555;">
                                                        <option value="5">5 Places</option>
                                                        <option value="7">7 Places</option>
                                                        <option value="9">9 Places</option>
                                                        <option value="12">12 Places</option>
                                                        <option value="21">21 Places</option>
                                                    </select>
                                                </td>
                                                <td><input type="number" name="places_car" id="places_car_a" style="width: 86px;"></td>
                                                <td><input type="text" name="carburant" id="carburant_a" style="width: 73px;"></td>
                                                <td><input type="number" name="consommation" id="consommation_a" style="width: 73px;"></td>
                                                <td style="width: 73px;">
                                                    <button type="button" class="btn cancel-button" id="button_hidden_bloc_add" style="background-color: #fa5838;"><i class="bi bi-x-lg"></i></button>
                                                    <button type="button" class="btn btn-success confirm-edit-button" onclick="validateForm()"><i class="bi bi-check"></i></button>
                                                </td>
                                            </form>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!--Vérifier les cases vide-->
                                    <script>
                                        function validateForm() {
                                            // Récupérer les valeurs des champs d'entrée
                                            var input_img_a = document.getElementById("input_img_a").value;
                                            var input_modele_a = document.getElementById("input_modele_a").value;
                                            var input_prix_a = document.getElementById("input_prix_a").value;
                                            var input_place_a = document.getElementById("input_place_a").value;
                                            var places_car_a = document.getElementById("places_car_a").value;
                                            var carburant_a = document.getElementById("carburant_a").value;
                                            var consommation_a = document.getElementById("consommation_a").value;

                                            // Vérifier que tous les champs ne sont pas vides
                                            if (consommation_a !== "" && places_car_a !== "" && carburant_a !== "" && input_img_a !== "" && input_modele_a !== "" && input_prix_a !== "" && input_place_a !== "") {
                                                // Confirmer l'ajout
                                                if (confirm('Vous voulez ajouter cette voiture ?')) {
                                                    // Soumettre le formulaire
                                                    document.getElementById("FormAddCar").submit();
                                                }
                                            } else {
                                                // Afficher une alerte si un champ est vide
                                                alert("Tous les champs doivent être remplis.");
                                            }
                                        }
                                    </script>
                                    <!--Faire apparaitre le bloc d'ajout de voiture-->
                                    <script>
                                        const add_car = document.getElementById("add_car");
                                        const bloc_add_car = document.getElementById("bloc_add_car");
                                        const button_hidden_bloc_add = document.getElementById("button_hidden_bloc_add");
                                        add_car.addEventListener("click", function() {
                                            bloc_add_car.style.display = "block";
                                        });
                                        button_hidden_bloc_add.addEventListener("click", function() {
                                            bloc_add_car.style.display = "none";
                                        });
                                    </script>
                                </div>
                                <?php include("php/post_cars_admin.php") ?>
                                <div id="contentToDisplay"><?php post_car_admin("All_cars") ?></div>
                                <div id="contentToDisplay5" style="display:none"><?php post_car_admin(5) ?></div>
                                <div id="contentToDisplay7" style="display:none"><?php post_car_admin(7) ?></div>
                                <div id="contentToDisplay9" style="display:none"><?php post_car_admin(9) ?></div>
                                <div id="contentToDisplay12" style="display:none"><?php post_car_admin(12) ?></div>
                                <div id="contentToDisplay21" style="display:none"><?php post_car_admin(21) ?></div>
                                <script>
                                    var carsSelect = document.getElementById("carsSelect");
                                    var contentToDisplay = document.getElementById("contentToDisplay");
                                    var contentToDisplay5 = document.getElementById("contentToDisplay5");
                                    var contentToDisplay7 = document.getElementById("contentToDisplay7");
                                    var contentToDisplay9 = document.getElementById("contentToDisplay9");
                                    var contentToDisplay12 = document.getElementById("contentToDisplay12");
                                    var contentToDisplay21 = document.getElementById("contentToDisplay21");

                                    carsSelect.addEventListener("change", function() {
                                        contentToDisplay.style.display = "none";
                                        contentToDisplay5.style.display = "none";
                                        contentToDisplay7.style.display = "none";
                                        contentToDisplay9.style.display = "none";
                                        contentToDisplay12.style.display = "none";
                                        contentToDisplay21.style.display = "none";

                                        if (carsSelect.value === "5") {
                                            contentToDisplay5.style.display = "block";
                                        } else if (carsSelect.value === "7") {
                                            contentToDisplay7.style.display = "block";
                                        } else if (carsSelect.value === "9") {
                                            contentToDisplay9.style.display = "block";
                                        } else if (carsSelect.value === "12") {
                                            contentToDisplay12.style.display = "block";
                                        } else if (carsSelect.value === "21") {
                                            contentToDisplay21.style.display = "block";
                                        } else {
                                            contentToDisplay.style.display = "block";
                                        }
                                    });
                                </script>
                                <script src="js/conf_delete_car.js">
                                </script>
                            </div>

                        </div>
                    </div>
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

</html>