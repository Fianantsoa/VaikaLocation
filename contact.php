<?php
session_start();
$user_email = $_SESSION['user_email'];
$user_name = $_SESSION['user_name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaika Location contact</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/styles_login.css">
    <meta name="description" content="Bienvenue chez Vaika Location - Votre partenaire pour la location de voitures à Madagascar. Découvrez notre flotte de véhicules et réservez la voiture parfaite pour votre voyage en toute simplicité.">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="shortcut icon" type="image/png" href="img/favicon.ico" />
    <link rel="stylesheet" href="admin/css/vendor/bootstrap-icons/bootstrap-icons.min.css">
</head>

<body>
    <style>
        #sidebar {
            z-index: 1000;
            position: fixed;
            top: 150px;
            right: -190px;
            width: 190px;
            height: 38px;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            background-color: #f0f0f0;
            transition: right 1s ease;
            background-color: #28863C;
        }
    </style>
    <?php

    if ($_SESSION['reservation'] != "") {
        echo '<div id="sidebar">
                <p style="color:#FFF;margin: 9px 17px;">Envoyé!</p>
                </div>';
    }
    ?>
    <div class="head_menu">
        <header>
            <div>
                <div class="head">
                    <div class="logo">
                        <a href="index.php" class="accueil"></a>
                        <img src="img/logo_vaika_location.png" alt="Vaika Location">
                    </div>
                    <ul class="menu" id="menu">
                        <li>
                            <img src="img/favicon/accueil.png" alt="icon_home">
                            <a href="index.php">ACCUEIL</a>
                        </li>
                        <li>
                            <img src="img/favicon/groupe (1).png" alt="icon_we_are">
                            <a href="contact.php">QUI NOUS SOMMES?</a>
                        </li>
                        <li>
                            <img src="img/favicon/jeep.png" alt="icon_car">
                            <a href="index.php#pop">VOITURES</a>
                        </li>
                        <li>
                            <img src="img/favicon/telephoner.png" alt="icon_contact">
                            <a href="contact.php#contact">CONTACT</a>
                        </li>
                    </ul>
                    <ul class="login" id="bloc_connexion">
                        <li><a href="login.php">Connecter</a></li>
                        <li><a href="registre.php">S'inscrire</a></li>

                    </ul>
                    <div id="bloc_shortcut" id="bloc_icon_connexion">
                        <button href="login.php" id="showButton" onclick="hidden()">
                            <img src="img/favicon/menu (1).png" alt="">
                        </button>
                        <a href="login.php"><img src="img/connexion.png" alt=""></a>
                    </div>
                    <div class="profil" id="profil">
                        <a href="#" id="view_profil">
                            <p style="margin: 12px;font-size:13px">
                                <?php
                                //Récupération du nom de l'utilisateur connecté
                                if (isset($_SESSION['user_name']) && !empty($_SESSION['user_name'])) {
                                    echo $user_name;
                                }
                                ?>
                            </p>
                            <?php
                            //Récuperation image de l'utilisateur connecté
                            if (isset($_SESSION['user_email']) && !empty($_SESSION['user_email'])) {
                                echo '<script>
                                            const bloc_connexion = document.getElementById("bloc_connexion");
                                            const bloc_icon_connexion = document.getElementById("bloc_icon_connexion");
                                            bloc_connexion.style.display = "none";
                                            bloc_icon_connexion.style.display = "none";
                                        </script>';
                                include("php/connectionBDD.php");
                                $query = "SELECT img FROM customer WHERE email_c = '$user_email'";
                                $result = $connexion->query($query);
                                if ($result && $result->num_rows > 0) {
                                    // Récupérez les données de l'image
                                    $row = $result->fetch_assoc();
                                    $imageData = $row['img'];
                                    if (isset($imageData) && !empty($imageData)) {
                                        $imageDataEncoded = base64_encode($imageData);
                                        $imageType = "image/jpeg";
                                        echo '<img src="data:' . $imageType . ';base64,' . $imageDataEncoded . '" alt="Image de profil">';
                                    } else {
                                        echo '<img src="img/profil.png" alt="mon photo">';
                                    }
                                }
                            }
                            ?>
                        </a>
                        <div class="menu_profil" id="menu_p">
                            <ul>
                                <li id="my_profil">Mon profil</li>
                                <li><a href="php/logout.php">Déconnecter</a></li>
                            </ul>
                        </div>
                        <div class="profil_update" id="profil_update">
                            <button class="close_bloc_update" onclick="hidden_bloc_update()">
                                <img src="admin/css/vendor/bootstrap-icons/x-lg.svg" alt=""></button>
                            <script>
                                function hidden_bloc_update() {
                                    const bloc_update = document.getElementById('profil_update');
                                    bloc_update.style.display = "none";
                                }
                            </script>
                            <form action="#" method="post" enctype="multipart/form-data">
                                <div class="pdp">
                                    <?php
                                    //Récuperation image de l'utilisateur connecté pour le modification
                                    if (isset($imageDataEncoded) && !empty($imageDataEncoded)) {
                                        echo '<img id="profil-image" src="data:' . $imageType . ';base64,' . $imageDataEncoded . '" alt="profil">';
                                        $connexion->close();
                                    } else {
                                        echo '<img id="profil-image" src="img/profil.png" alt="mon photo">';
                                    }
                                    ?>
                                </div>
                                <div class="file-upload">
                                    <label for="file-input" class="file-label">
                                        <img src="admin/css/vendor/bootstrap-icons/camera.svg" alt="Changer de photo">
                                    </label>
                                    <input name="image_c" type="file" id="file-input" class="file-input" accept="image/*">
                                </div><br>
                                <script>
                                    var fileInput = document.getElementById("file-input");
                                    var profilImage = document.getElementById("profil-image");

                                    fileInput.addEventListener("change", function() {
                                        var file = fileInput.files[0]; // Récupère le premier fichier sélectionné

                                        if (file) {
                                            var reader = new FileReader();

                                            reader.onload = function(e) {
                                                // Met à jour l'attribut src de l'image avec la nouvelle image chargée
                                                profilImage.src = e.target.result;
                                            };

                                            // Charge l'image sélectionnée en tant que données URL (base64)
                                            reader.readAsDataURL(file);
                                        }
                                    });
                                </script>
                                <input name="name_user_up_c" type="text" placeholder="Nom" value="<?php if (isset($_SESSION['user_name']) && !empty($_SESSION['user_name'])) {
                                                                                                        echo $user_name;
                                                                                                    } ?>"><br>
                                <input name="email_user_up_c" type="email" placeholder="Email" value="<?php if (isset($_SESSION['user_email']) && !empty($_SESSION['user_email'])) {
                                                                                                            echo $user_email;
                                                                                                        } ?>"><br>
                                <input name="password_user_up_c" type="password" placeholder="Mot de passe(lettre,chiffre,spéciaux)"><br>
                                <input name="repassword_user_up_c" type="password" placeholder="Confirmer le mot de passe"><br>
                                <?php
                                //mettre à jour les données de l'utilisateur connecté
                                if (isset($_SESSION['user_name']) && !empty($_SESSION['user_name'])) {
                                    include("php/update_user_in_contact.php");
                                }
                                ?><br>
                                <input name="button_update_user_c" type="submit" value="Modifier">
                            </form>
                        </div>
                        <script>
                            const view_profil = document.getElementById("view_profil");
                            const menu_p = document.getElementById("menu_p");
                            const my_profil = document.getElementById("my_profil");
                            const profil_update = document.getElementById("profil_update");
                            const profil = document.getElementById("profil");
                            const bloc_login = document.getElementById("bloc_login");
                            const bloc_shortcut = document.getElementById("bloc_shortcut");
                            if (profil.style.display === "block") {
                                bloc_login.style.display = "none";
                                bloc_shortcut.style.display = "none";
                            }
                            view_profil.addEventListener("click", function() {
                                if (menu_p.style.display !== "block") {
                                    menu_p.style.display = "block";
                                } else {
                                    menu_p.style.display = "none";
                                }
                                if (profil_update.style.display !== "block") {
                                    profil_update.style.display = "none";
                                } else {
                                    profil_update.style.display = "none";
                                }
                            });
                            my_profil.addEventListener("click", function() {
                                menu_p.style.display = "none";
                                profil_update.style.display = "block";
                            });
                        </script>
                        <?php
                        //suppression du bouton connecter et inscrire s'il y a une personne connecté
                        if (isset($_SESSION['user_name']) && !empty($_SESSION['user_name'])) {

                            echo '<script defer>
                                const profil_existed = document.getElementById("profil");
                                const bloc_login_hidden = document.getElementById("bloc_login");
                                const bloc_shortcut_hidden = document.getElementById("bloc_shortcut");
                                profil_existed.style.display = "block";
                                bloc_login_hidden.style.display = "none";
                                bloc_shortcut_hidden.style.display = "none";
                                </script>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <div class="container_login">
        <div class="cadre_login" id="cadre_login">
            <?php
            if (!isset($_GET['prix'])) {
                echo '<div class="A_Propos">
                            <h2 class="under_title" >Qui nous sommes ?</h2>
                            <p class="para_we_are" id="bar">
                                Bienvenue chez Vaika Location, votre partenaire de confiance pour toutes vos aventures sur la route.
                                Depuis notre fondation, nous nous sommes engagés à offrir à nos clients une expérience de location de voiture exceptionnelle, alliant confort, qualité et flexibilité. <br>
                                Chez Vaika Location, nous comprenons que chaque voyage est unique, c\'est pourquoi nous mettons tout en œuvre pour répondre à vos besoins spécifiques. Que vous planifiiez un voyage d\'affaires, des vacances en famille ou une escapade entre amis, notre vaste flotte de véhicules soigneusement entretenus saura s\'adapter à vos exigences. <br>
                                Notre équipe dévouée de professionnels de l\'automobile est là pour vous accompagner à chaque étape de votre location. De la sélection du véhicule idéal à l\'assistance en cas de besoin pendant votre location, nous nous engageons à vous offrir un service attentionné et personnalisé. Votre sécurité et votre satisfaction sont nos priorités absolues. <br>
                                Chez Vaika Location, nous croyons en la valeur des voyages et des découvertes. Notre mission est de rendre votre expérience de location de voiture simple, agréable et sans tracas, afin que vous puissiez vous concentrer sur ce qui compte vraiment : profiter de la route devant vous. Rejoignez-nous dans cette aventure et laissez-nous être votre compagnon de route privilégié. <br>
                                Merci de choisir Vaika Location pour vos besoins de location de voiture. Nous sommes impatients de vous servir et de contribuer à faire de vos voyages des souvenirs inoubliables.
                                <br>L\'équipe Vaika Location
                            </p> <span id="we_are"></span>
                        </div>';
            }
            ?>
            <div id="after_cadre_login" style="position: relative;">

                <?php
                if (!empty($_GET['prix'])) {
                    echo '<script>
                        const after_cadre_login = document.getElementById("after_cadre_login");
                        after_cadre_login.style.position = "initial";
                    </script>';
                    echo '<style>
                        .map_box {
                            position: absolute;
                            right: 60px;
                            bottom: 727px;
                            width: 28%;
                            height: 300px;
                        }
                        form{
                            width:121%;
                        }
                        @media only screen and (max-width:901px) {
                            .map_box {
                                display: none;
                            }
                            form{
                                width:100%;
                            }
                        }
                    </style>';
                }
                //recuperation image
                if (!empty($_GET['prix'])) {
                    echo "<style>
                        .img_car_res{
                            width: 151px;
                            border-radius: 4px;
                            position:absolute;
                            right:0;
                            top: -42px;
                        }
                        .bloc_res{
                            display: flex;
                            width: 450px;
                            position: relative;
                            height:120px
                        }.form_res{
                            margin-top: 100px;
                        }
                        #after_cadre_login{
                                width: 41%;
                            }
                        .detail_res{
                            font-size: 14px;
                        }
                        @media only screen and (max-width: 1950px) {
                            .input {
                                width: 100%;
                            }
                            #description {
                                width: 100%;
                            }
                        }
                        @media only screen and (max-width: 1300px) {
                            .img_car_res {
                                width: 110px;
                                right: 66px;
                            }
                        }
                        @media only screen and (max-width: 900px) {
                            #after_cadre_login {
                                width: 100%;
                            }
                            .logo_rigth {
                                display: none;
                            }
                            .bloc_res{
                            width: 100%;
                            }
                            .input {
                                width: 96%;
                            }
                             .img_car_res {
                                right: 0;
                            }
                            #description {
                                width: 96%;
                            }
                        }
                        
                        @media only screen and (max-width: 667px) {
                            #after_cadre_login{
                                width: 98%;
                            }.detail_res{
                                font-size: 11px;
                                line-height: 19px;
                            }
                        }
                        @media only screen and (max-width: 450px) {
                            .detail_res{
                                font-size: 11px;
                            }
                            #after_cadre_login h2{
                                font-size: 17px;
                            }
                            .form_res{
                                margin-top: 136px;
                            }
                        }
                        @media only screen and (max-width: 390px) {
                            .block{
                                display: block;
                            }.form_res{
                                margin-top: 162px;
                            }
                        }
                        </style>";
                    echo '<h2 style="color: #28863C;">Réservation</h2>';
                    echo '<div class="bloc_res">
                            <p class="detail_res" style="line-height: 21px;width:60%">
                                Nous sommes ravis de confirmer votre réservation pour une voiture 
                                de modèle ' . $_GET["modele"] . ' de ' . $_GET["prix"] . ' Ar par jour. 
                                Votre itinéraire commence 
                                à ' . $_GET['lieu1'] . ' et se termine à ' . $_GET['lieu2'];
                    if (isset($_GET['lieu3']) && !empty($_GET['lieu3'])) {
                        echo "-" . $_GET['lieu3'];

                        if (isset($_GET['lieu4']) && !empty($_GET['lieu4'])) {
                            echo "-" . $_GET['lieu4'];
                        }
                    }
                    echo ' .Nous avons 
                                hâte de vous offrir une expérience de voyage exceptionnelle.';

                    include("php/connectionBDD.php");
                    $query = "SELECT image FROM cars WHERE id = " . $_GET["id"];
                    $result = $connexion->query($query);

                    if ($result) {
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $image = $row['image'];

                            // Afficher l'image
                            echo '<img src="data:image/jpeg;base64,' . base64_encode($image) . '" class="img_car_res" alt="">';
                        } else {
                            echo "Image non trouvée";
                        }

                        // Libérer les résultats
                        $result->free();
                    } else {
                        echo "Erreur de requête : " . $connexion->error;
                    }

                    echo '</div>';
                } else {
                    echo '<h2 style="color: #28863C;">Contactez-nous</h2>';
                    echo '<style>
                        @media only screen and (max-width: 1950px) {
                            .input {
                              width: 50%;
                            }
                            #description {
                                width: 50%;
                            }
                          }
                                </style>';
                }
                ?>


                <form <?php
                        if (isset($_GET['prix'])) {
                            echo 'action="php/add_reservation.php"';
                        } else {
                            echo 'action="php/contact_message.php"';
                        }
                        ?> class="form_res" method="post">
                    <label for="email">Email</label><br>
                    <input type="number" value="<?php echo $_GET['id'] ?>" name="id_car_res" style="display: none;">
                    <input type="email" name="email" class="input" <?php if ($_SESSION['user_email'] != "") {
                                                                        echo 'value="' . $user_email . '" readonly';
                                                                    } ?> pattern="^[A-Za-z0-9\s@.]*$" title="Caractères autorisés : lettres, chiffres, espaces, @ ."><br>
                    <label for="phone">Numéro </label><br>
                    <input type="tel" name="phone" class="input" pattern="^[0-9+]*$" title="Caractères autorisés : chiffres, espaces, +"><br>
                    <label for="objet">Object</label><br>
                    <input type="number" name="id" style="display: none;" id="id_car" value="<?php echo $_GET['id'] ?>">
                    <input type="text" name="objet" class="input" style="display: none;" pattern="^[A-Za-z0-9\s!@#$%^&*()-_+=.,;?]*$" title="Caractères autorisés : lettres, chiffres, espaces, ! @ # $ % ^ & * ( ) - _ + = . , ; ?" <?php
                                                                                                                                                                                                                                        if (isset($_GET['prix'])) {
                                                                                                                                                                                                                                            echo 'value="Réservation : ' . $_GET["modele"] . '" readonly';
                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                        ?>><br>
                    <input type="text" name="subject" class="input" pattern="^[A-Za-z0-9\s!@#$%^&*()-_+=.,;?]*$" title="Caractères autorisés : lettres, chiffres, espaces, ! @ # $ % ^ & * ( ) - _ + = . , ; ?"><br>
                    <?php
                    if (isset($_GET['prix'])) {
                        echo '<label for="description">Message</label><br>
                            <input type="hidden" name="prix" value="' . $_GET['prix'] . '">
                            <input type="hidden" name="modele" value="' . $_GET['modele'] . '">';
                        echo '<input type="hidden" name="date_depart" value="' . $_GET['date_depart'] . '">';
                        echo '<input type="hidden" name="date_retour" value="' . $_GET['date_retour'] . '">';
                    } else {
                        echo '<label for="description">Description</label><br>';
                    }
                    ?>
                    <textarea name="description" id="description" cols="30" style="resize: none;display:none" <?php
                                                                                                                if (isset($_GET['prix'])) {
                                                                                                                    if (isset($_GET['lieu1']) && !empty($_GET['lieu1'])) {
                                                                                                                        echo 'rows="4" readonly><b>Départ</b> : ' . $_GET['lieu1'] . "<br>\n";
                                                                                                                    } else {
                                                                                                                        echo 'rows="4" readonly><b>Départ</b> : Inconnu' . "<br>\n";
                                                                                                                    }
                                                                                                                    if (isset($_GET['lieu2']) && !empty($_GET['lieu2'])) {
                                                                                                                        echo '<b>Arrivée</b>:-' . $_GET['lieu2'];

                                                                                                                        if (isset($_GET['lieu3']) && !empty($_GET['lieu3'])) {
                                                                                                                            echo ";" . "\n\t-" . $_GET['lieu3'];

                                                                                                                            if (isset($_GET['lieu4']) && !empty($_GET['lieu4'])) {
                                                                                                                                echo ";" . "\n\t-" . $_GET['lieu4'];
                                                                                                                            }
                                                                                                                        }
                                                                                                                    } else {
                                                                                                                        echo 'Arrivée: Inconnu' . "\n";
                                                                                                                    }
                                                                                                                } else {
                                                                                                                    echo ' rows="10">';
                                                                                                                }
                                                                                                                ?></textarea>
                    <textarea name="message" id="description" cols="30" rows="4" style="resize: none;"></textarea><br><br>
                    <?php
                    if (isset($_GET['prix'])) {
                        session_start();
                        $url = $_SERVER['REQUEST_URI'];
                        $_SESSION['url'] = $url;
                        echo '<input type="submit" value="RESERVER" name="sign_up" class="sign_up" id="a_propos">';
                    } else {
                        echo '<input type="submit" value="ENVOYER" name="sign_up" class="sign_up" id="a_propos">';
                    }
                    ?>

                </form>
                <div class="map_box">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d235.89305814172533!2d47.52819070494013!3d-18.918601057974218!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x21f07fdfcf08652b%3A0xa76c749188ce1f31!2sBrique%20web%20-Agence%20de%20Cr%C3%A9ation%20%26%20Marketing%20Digital%20%C3%A0%20Madagascar!5e0!3m2!1sfr!2smg!4v1699768686428!5m2!1sfr!2smg" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

            <div class="logo_rigth" id="logo_rigth" <?php
                                                    if (!empty($_GET['prix'])) {
                                                        echo ' style="top:100px;"';
                                                    }
                                                    ?>>
                <img src="img/logo_vaika_location.png" alt="logo">
            </div>

            <div id="contact" style="position: absolute;top: 530px;"></div>


            <footer>
                <div>
                    <div id="footer_1">
                        <img src="img/logo_vaika_location.png" alt="Vaika Location">
                        <ul>
                            <li><a href="#a_propos">Qui nous sommes ?</a></li>
                            <li><a href="index.php#pop">Voitures</a></li>
                            <li><a href="index.php#pop">Annonce</a></li>
                        </ul>
                    </div>
                    <div class="ligne"></div>
                    <div id="footer_2">
                        <div style="text-align: justify;">
                            <h5>A PROPOS</h5>
                            <p style="width: 213px;">Votre choix numéro un pour la
                                location de voitures. Des
                                véhicules de qualité, des tarifs
                                compétitifs et un service client
                                exceptionnel. Explorez le monde
                                avec confiance grâce à Vaika Location. </p>
                        </div>
                        <div>
                            <h5>CONTACT</h5>
                            <p>+ 261 34 05 891 97<br>
                                vaikalocation@briqueweb.com</p>
                        </div>
                        <div>
                            <h5>HORAIRES D'OUVERTURES</h5>
                            <p>Lundi - Vendredi : 09h00-20h00<br>Samedi : 09h00-18h00<br>Dimanche : Fermé</p>
                        </div>
                        <div>
                            <h5>RESTER EN CONTACT</h5>
                            <form action="#" method="get">
                                <input type="email" placeholder="Entrer votre email" name="email">
                                <button type="submit" name="submitButton" style="cursor: pointer;">Aller</button>
                                <?php
                                include("php/send_notification.php");
                                ?>
                            </form>
                        </div>
                    </div>
                    <div id="footer_3">
                        <div class="droit">
                            <p>&copy; 2023-Vaika Location. Tous droits réservés.
                                <a href="mention_legal.php" class="CGU">
                                    Contact Mentions légal CGU
                                </a>
                            </p>
                        </div>
                        <div class="link_social">
                            <nav>
                                <a class="nav-link" href="https://www.facebook.com/briqueweb" target="_blank">
                                    <i class="bi bi-facebook"></i>
                                </a>
                                <a class="nav-link" href="https://www.linkedin.com/in/briqueweb/" target="_blank">
                                    <i class="bi bi-linkedin"></i>
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

    </div>
</body>
<script src="js/slider.js"></script>
<script src="js/add_itinerary.js"></script>
<script src="js/choice_catalogue_car.js"></script>
<script src="js/hidden_menu.js"></script>
<script src="js/slide_img_head.js"></script>
<script src="js/vision_effect.js"></script>
<script src="js/menu-interactions.js"></script>
<script>
    function load() {
        const cadreLogin = document.getElementById("cadre_login");
        cadreLogin.style.transform = "translateY(-30px)";
        cadreLogin.style.opacity = "1";
    }
    setTimeout(load, 500); // Vous pouvez ajuster la durée de l'attente (en millisecondes) selon vos préférences
</script>
<script>
    // Attendre que le DOM soit chargé
    document.addEventListener("DOMContentLoaded", function() {
        const sidebar = document.getElementById("sidebar");
        if (sidebar) {
            setTimeout(function() {
                sidebar.style.right = "0";
            }, 0);
        }
        /*if (sidebar) {
            setTimeout(function() {
                sidebar.style.right = "-190px";
            }, 6000);
        }*/
    });
</script>

</html>