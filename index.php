<?php
//Faire une session de l'utilisateur qui a réussi à se connecter
session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];
$user_password = $_SESSION['user_password'];
$user_image = $_SESSION['user_image'];
unset($_SESSION["reservation"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaika Location</title>
    <link rel="stylesheet" href="css/styles.css">
    <meta name="description" content="Bienvenue chez Vaika Location - Votre partenaire pour la location de voitures à Madagascar. Découvrez notre flotte de véhicules et réservez la voiture parfaite pour votre voyage en toute simplicité.">
    <link rel="shortcut icon" type="image/png" href="img/favicon.ico" />
    <link rel="stylesheet" href="css/style_preview_car.css">
    <link rel="stylesheet" href="admin/css/vendor/bootstrap-icons/bootstrap-icons.min.css">
</head>

<body>
    <div class="head_menu">


        <!-- JavaScript pour gérer l'apparition et la disparition -->





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
                            <a href="#accueil">ACCUEIL</a>
                        </li>
                        <li>
                            <img src="img/favicon/groupe (1).png" alt="icon_we_are">
                            <a href="contact.php">QUI NOUS SOMMES?</a>
                        </li>
                        <li>
                            <img src="img/favicon/jeep.png" alt="icon_car">
                            <a href="#voiture">VOITURES</a>
                        </li>
                        <li>
                            <img src="img/favicon/telephoner.png" alt="icon_contact">
                            <a href="contact.php#contact">CONTACT</a>
                        </li>
                    </ul>
                    <ul class="login" id="bloc_login">
                        <span id="logIn_signUp">
                            <li><a href="login.php">Connecter</a></li>
                            <li><a href="registre.php">S'inscrire</a></li>
                        </span>
                    </ul>

                    <div id="bloc_shortcut">
                        <button href="login.php" id="showButton" onclick="hidden()">
                            <img src="img/favicon/menu (1).png" alt="Icone menu">
                        </button>
                        <a href="login.php"><img src="img/connexion.png" alt="Icone Connexion"></a>
                    </div>
                    <?php
                    if ($_SESSION['admin'] != "") {
                        echo '<ul class="login" id="bloc_login">
                                <li><a href="php/logout.php">Déconnecter</a></li>
                            </ul>';
                        echo '<script>
                                const logIn_signUp = document.getElementById("logIn_signUp");
                                logIn_signUp.style.display = "none";
                            </script>';
                    }
                    ?>
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
                                <img src="admin/css/vendor/bootstrap-icons/x-lg.svg" alt="update"></button>
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
                                    <input name="image" type="file" id="file-input" class="file-input" accept="image/*">
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
                                <input name="name_user_up" type="text" placeholder="Nom" value="<?php if (isset($_SESSION['user_name']) && !empty($_SESSION['user_name'])) {
                                                                                                    echo $user_name;
                                                                                                } ?>"><br>
                                <input name="email_user_up" type="email" placeholder="Email" value="<?php if (isset($_SESSION['user_email']) && !empty($_SESSION['user_email'])) {
                                                                                                        echo $user_email;
                                                                                                    } ?>"><br>
                                <input name="password_user_up" type="password" placeholder="Mot de passe(lettre,chiffre,spéciaux)"><br>
                                <input name="repassword_user_up" type="password" placeholder="Confirmer le mot de passe"><br>
                                <?php
                                //mettre à jour les données de l'utilisateur connecté
                                if (isset($_SESSION['user_name']) && !empty($_SESSION['user_name'])) {
                                    require "php/update_user.php";
                                }
                                ?><br>
                                <input name="button_update_user" type="submit" value="Modifier">
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
    <div class="false_margin" id="accueil">
    </div>
    <div>
        <div id="slider" style="position: relative;">
            <div class="boite reveal1">
                <p id="message" style="font-weight: bold;width: 400px;">Découvrez Madagascar en Confort</p>
                <p id="under_message" style="width: 400px;">Explorez l'île de Madagascar <br>avec notre flotte de voitures touristiques <br>haut de gamme.</p>
            </div>
            <div id="slide-container">
                <img src="img/paysage/1.jpg" alt="La forêt de peupliers" id="slide">
                <div id="slide-indicators">
                    <div class="indicator active-indicator" onclick="ChangeSlide(-1)"></div>
                    <div class="indicator" onclick="ChangeSlide(0)"></div>
                    <div class="indicator" onclick="ChangeSlide(1)"></div>
                </div>
            </div>
            <?php include("php/texteSlide.php"); ?>
            <!--A decommenter si on souhaite ajouter deux bouton manuelle sur le slide de bannière-->
            <!--
            <div id="precedent" onclick="ChangeSlide(-1)"><</div>
            <div id="suivant" onclick="ChangeSlide(1)">></div>
            -->
        </div>
    </div>
    <div style="width: 100%; position:absolute; top:300px;" id="blocCible"></div>
    <div class="container">
        <div class="cadre" id="voiture">
            <div class="cataloge reveal">
                <button onclick="places(5)" class="scrollButton">
                    <img src="img/car_4places.fav.webp" alt="5places">
                    <p>5 places</p>
                </button>
                <button onclick="places(7)" class="scrollButton">
                    <img src="img/car_7places.fav.webp" alt="4places">
                    <p>7 places</p>
                </button>
                <button onclick="places(9)" class="scrollButton">
                    <img src="img/car_9places.fav.webp" alt="4places">
                    <p>9 places</p>
                </button>
                <button onclick="places(12)" class="scrollButton">
                    <img src="img/car_12places.fav.webp" alt="4places">
                    <p>12 places</p>
                </button>
                <button onclick="places(21)" class="scrollButton">
                    <img src="img/car_plus21places.fav.webp" alt="4places">
                    <p>+21 places</p>
                </button>
            </div>


            <form action="php/affiche.php" method="get" id="myForm">
                <div class="conteneur_itinerary">
                    <div class="bloc_itinerary">
                        <div class="itinerary reveal1" id="pop monElement" style="position: relative;">
                            <p>Itinéraire :</p>
                            <div>
                                <div class="input-container">
                                    <div id="search_lieu">
                                        <label for="search_lieu">
                                            <div class="bloc_search_itinerary">
                                                <p style="font-size: 13px;margin:0">Retrait et retour</p>
                                                <div>
                                                    <i class="bi bi-search"></i><input type="search" id="lieuInput_search" autocomplete="off" name="search" placeholder="Où vous voulez aller ?">
                                                </div>
                                            </div>
                                        </label>
                                    </div>

                                    <div id="input_itinerary">
                                        <label for="lieu1">
                                            <input type="text" id="lieuInput" autocomplete="off" name="lieu1" placeholder="Départ">
                                        </label>
                                        <ul id="suggestions"></ul>
                                        <label for="lieu2">
                                            <input type="text" id="lieuInput1" autocomplete="off" name="lieu2" placeholder="Arrivé">
                                        </label>
                                    </div>

                                    <button onclick="addInput()" style="display: block;" id="button_add_itinerary">+</button>
                                    <div class="bloc_date">
                                        <label for="input_date_retrait" id="bloc_date_depart">
                                            <div class="bloc_search_itinerary">
                                                <p style="font-size: 13px;margin:0">Date de départ</p>
                                                <div>
                                                    <input type="date" id="date_depart" name="date_depart">
                                                </div>
                                            </div>
                                        </label>
                                        <label for="input_date_retour" id="bloc_date_retour">
                                            <div class="bloc_search_itinerary">
                                                <p style="font-size: 13px;margin:0">Date de retour</p>
                                                <div>
                                                    <input type="date" id="date_retour" name="date_retour">
                                                </div>
                                            </div>
                                        </label>
                                    </div>

                                    <script src="js/itinerary.js"></script>
                                </div>
                            </div>
                        </div>
                        <div id="erreurMessage" class="erreur-message">
                            <div style="display: flex;">
                                <img src="img/point.png" alt="erreur" style="width: 160px;height:40px">
                            </div>
                        </div>
                    </div>
                </div>




                <div class="list_car" id="list_car">
                    <!--<div id="place5" style="position:relative">-->
                    <div style="display: flex;" id="place5" class="contentd">
                        <?php
                        include("php/post_cars.php");
                        post_car(5);
                        ?>
                    </div>
                    <!--<button type="button" id="scroll-up1" style="position:absolute;left:5%">Vers le haut</button>
                        <div id="scroll-position1" style="position:absolute;left:46%">Position : 0%</div>
                        <button type="button" id="scroll-down1" style="position:absolute;right:5%">Vers le bas</button>
                        </div>-->

                    <script src="js/script.js"></script>
                    <div style="display: none;" id="place7">
                        <?php
                        post_car(7);
                        ?>
                    </div>
                    <div style="display: none;" id="place9">
                        <?php
                        post_car(9);
                        ?>
                    </div>
                    <div style="display: none;" id="place12">
                        <?php
                        post_car(12);
                        ?>
                    </div>
                    <div style="display: none;" id="place21">
                        <?php
                        post_car(21);
                        ?>
                    </div>
                </div>
            </form>

            <div class="top">
                <h2 class="under_title">Véhicules populaires</h2>
                <div>
                    <div class="mySlides">
                        <div class="propriety">
                            <p><b><br>4x4 blanc - 2020</b></p>
                            <p>

                                <span class="sup">Energie</span>: Essence <br>
                                <span class="sup">Vitesse</span> : Manuel
                            </p>
                        </div>
                        <img src="img/4x4blanc.webp" alt="car pop 1">
                    </div>

                    <div class="mySlides">
                        <div class="propriety">
                            <p><br>Starex</b></p>
                            <p>
                                <span class="sup">Energie</span>: Diesel <br>
                                <span class="sup">Vitesse</span> : Automatique
                            </p>
                        </div>
                        <img src="img/starex.webp" alt="car pop 2">
                    </div>

                    <div class="mySlides">
                        <div class="propriety">
                            <p><b><br>4x4 blanc - 2020</b></p>
                            <p>
                                <span class="sup">Energie</span>: Gasoil <br>
                                <span class="sup">Vitesse</span> : Manuel
                            </p>
                        </div>
                        <img src="img/bus.webp">
                    </div>

                    <div class="mySlides">
                        <div class="propriety">
                            <p><b><span>400 000 Ar </span><br>Hyundai County</b></p>
                            <p>
                                K<span class="sup">ilometrage</span> : 1000km <br>
                                E<span class="sup">nergie</span>: Essence <br>
                                V<span class="sup">itesse</span> : Manuel
                            </p>
                        </div>
                        <img src="img/12place.webp" alt="car pop 3">
                    </div>


                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                    <a class="next" onclick="plusSlides(1)">❯</a>
                </div>
            </div>

            <div class="why_us reveal">
                <h2 class="under_title">Pourquoi nous choisir ?</h2>
                <div class="cause">
                    <div id="tv">
                        <img src="img/flote_varié_voiture.webp" style="background-color: #f7e4e5;" alt="variété voiture">
                        <h4>Flotte Variée, Besoins Diversifiés</h4>
                        <p>Nous offrons une large gamme de véhicules pour répondre à tous les besoins de voyage. Que vous souhaitiez explorer les villes ou partir à l'aventure dans les régions éloignées de Madagascar, nous avons la voiture parfaite pour vous.</p>
                    </div>
                    <div class="top" id="tv">
                        <img src="img/engagement_client.webp" style="background-color: #e6f4f7;" alt="variété voiture">
                        <h4>Engagement envers la Sécurité</h4>
                        <p>Votre sécurité est notre priorité absolue. Nos voitures sont équipées des dernières technologies de sécurité pour vous offrir une conduite en toute tranquillité le long des routes parfois exigeantes de Madagascar.</p>
                    </div>
                    <div id="tv">
                        <img src="img/service_client.webp" style="background-color: #e7f7ec;" alt="variété voiture">
                        <h4>Service Client 24/7 Dédié</h4>
                        <p>Notre équipe de service client est disponible à tout moment pour répondre à vos questions, vous aider à planifier votre voyage et vous fournir une assistance en cas de besoin pendant votre location.</p>
                    </div>
                    <div id="tv" class="top">
                        <img src="img/qualite_service.webp" style="background-color: #f2e6f0;" alt="variété voiture">
                        <h4>Tarifs Compétitifs, Qualité Supérieure</h4>
                        <p>Nous croyons que la qualité ne devrait pas être compromise par le prix. Nos tarifs compétitifs vous permettent de profiter d'une expérience de location de voiture exceptionnelle sans dépasser votre budget.</p>
                    </div>
                </div>
            </div>


            <div class="temoinage reveal">
                <h2 class="under_title">Nos témoignages</h2>
                <div class="temoin">
                    <div>
                        <p>
                            Je crois en l'apprentissage tout au long de la vie et Vaika Location est un endroit formidable pour
                            apprendre d'experts. J'ai beaucoup appris et je le recommande à tous mes amis. Les
                            programmes sont disponibles aux semestres d'automne, de printemps et d'été. De nombreux
                            programmes d'automne et de printemps proposent des programmes similaires plus courts en
                            été, et certains peuvent être combinés pendant une année universitaire complète.
                        </p>
                    </div>
                </div>
            </div>


            <?php
            require("php/add_commentaire.php");
            ?>
            <div class="comment-block">
                <div class="comment-list">
                    <div class="titre">
                        <h2><i class="bi bi-chat-dots-fill"></i> Commentaire</h2>
                    </div>
                    <ul>
                        <?php
                        require("php/post_commentaire.php");
                        ?>
                    </ul>
                </div>

                <div class="bloc_add_comment">
                    <div class="comment-form">
                        <form method="post">
                            <textarea name="commentaire" placeholder="Écrivez votre commentaire ici..." required></textarea>
                            <button type="submit">Laisser un commentaire <i class="bi bi-arrow-right"></i></button>
                        </form>
                    </div>
                </div>
            </div>

            <!--mettre les script js ici pour que la page ne soit pas mise en pose après l'envoye d'email-->
            <script src="js/verified_itinerary.js"></script>
            <script src="js/slider.js"></script>
            <script src="js/choice_catalogue_car.js"></script>
            <script src="js/hidden_menu.js"></script>
            <script src="js/slide_img_head.js"></script>
            <script src="js/vision_effect.js"></script>
            <script src="js/menu-interactions.js"></script>
            <script src="js/add-itinerary-input.js"></script>
            <script src="js/removeeffet.js"></script>
            <script>
                // Sélectionnez tous les boutons avec la classe "scrollButton"
                var scrollButtons = document.querySelectorAll(".scrollButton");
                var blocCible = document.getElementById("blocCible");

                // Ajoutez un gestionnaire d'événements à chaque bouton
                scrollButtons.forEach(function(button) {
                    button.addEventListener("click", function() {
                        // Utilisez la méthode scrollIntoView() pour faire défiler le bloc cible dans la vue
                        blocCible.scrollIntoView({
                            behavior: "smooth"
                        }); // "smooth" pour un défilement fluide
                    });
                });
            </script>

            <footer id="contact">
                <div>
                    <div id="footer_1">
                        <img src="img/logo_vaika_location.png" alt="Vaika Location">
                        <ul>
                            <li><a href="contact.php">Qui nous sommes ?</a></li>
                            <li><a href="#voiture">Voitures</a></li>
                            <li><a href="#pop">Annonce</a></li>
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
                            <p>+ 261 34 05 891 97<br>vaikalocation@briqueweb.com</p>
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
                                    <i class="bi-facebook"></i>
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

</html>