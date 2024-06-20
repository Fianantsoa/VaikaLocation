<?php
session_start();
unset($_SESSION["reservation"]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaika Location_sign_up</title>
    <link rel="stylesheet" href="css/styles.css">
    <meta name="description" content="Bienvenue chez Vaika Location - Votre partenaire pour la location de voitures à Madagascar. Découvrez notre flotte de véhicules et réservez la voiture parfaite pour votre voyage en toute simplicité.">
    <link rel="stylesheet" href="css/styles_login.css">
    <link rel="shortcut icon" type="image/png" href="img/favicon.ico" />
    <link rel="stylesheet" href="admin/css/vendor/bootstrap-icons/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/map_styles.css">
</head>

<body>
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
                    <ul class="login">
                        <li><a href="login.php">Connecter</a></li>
                    </ul>
                    <div id="bloc_shortcut">
                        <button href="login.php" id="showButton" onclick="hidden()"><img src="img/favicon/menu (1).png" alt=""></button>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <div class="container_login">
        <div class="cadre_login" id="cadre_login">
            <div style="position: relative;">
                <h2 style="color: #28863C;">S'inscrire </h2>
                <form action="registre.php" method="post">
                    <label for="username">Nom d'utilisateur</label><br>
                    <input type="text" name="username" class="input" pattern="^[A-Za-z0-9\s]*$" title="Caractères autorisés : lettres, chiffres, espaces"><br>

                    <label for="email">Email</label><br>
                    <input type="email" name="email" class="input" id="email1" pattern="^[A-Za-z0-9\s@.]*$" title="Caractères autorisés : lettres, chiffres, espaces, @ ."><br>
                    <p id="email_take" style="color: red;font-size: 12px;margin-top: -25px;display:none;">
                        l'email est déjà enregistré.
                        Veuillez utiliser un autre email.
                    </p>

                    <label for="password">Mot de passe</label><br>
                    <input type="password" name="password" class="input" id="password" pattern="^[A-Za-z0-9\s!@#$%^&*()-_+=.,;?]*$" title="Caractères autorisés : lettres, chiffres, espaces, ! @ # $ % ^ & * ( ) - _ + = . , ; ?"><br>
                    <p id="incorrect_password" style="color: red;font-size: 12px;margin-top: -20px;display:none;">
                        Mot de passe incorrect!
                    </p>
                    <p id="short_password" style="color: red;font-size: 12px;margin-top: -25px;display:none;">
                        Le mot de passe doit contenir au moins 8 caractères.
                    </p>
                    <p id="short_password1" style="color: red;font-size: 12px;margin-top: -25px;display:none;">
                        Le mot de passe doit contenir des lettres,
                        des chiffres et des caractères spéciaux (@$!%*?&).
                    </p>

                    <label for="repassword">Confirmer le mot de passe</label><br>
                    <input type="password" name="repassword" class="input" id="repassword" pattern="^[A-Za-z0-9\s!@#$%^&*()-_+=.,;?]*$" title="Caractères autorisés : lettres, chiffres, espaces, ! @ # $ % ^ & * ( ) - _ + = . , ; ?"><br>
                    <p id="fill_boxes" style="color: red;font-size: 12px;margin-top: -20px;display:none;">
                        Veuillez remplir tous les champs du formulaire.
                    </p>
                    <p id="Successful" style="color: green;font-size: 12px;margin-top: -10px;display:none;">
                        Inscription réussie!
                    </p>
                    <?php
                    include('insert_user_BDD.php');
                    ?>
                    <input type="submit" value="INSCRIRE" name="sign_up" class="sign_up">

                </form>
                <style>
                    .map_box {
                        bottom: 83px;
                        height: 259px;
                    }
                </style>
                <div class="map_box">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d235.89305814172533!2d47.52819070494013!3d-18.918601057974218!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x21f07fdfcf08652b%3A0xa76c749188ce1f31!2sBrique%20web%20-Agence%20de%20Cr%C3%A9ation%20%26%20Marketing%20Digital%20%C3%A0%20Madagascar!5e0!3m2!1sfr!2smg!4v1699768686428!5m2!1sfr!2smg" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
            <div class="logo_rigth" style="top: 50px;">
                <img src="img/logo_vaika_location.png" alt="logo">
            </div>
            <div id="contact" style="position: absolute;top: 500px;"></div>
            <footer>
                <div>
                    <div id="footer_1">
                        <img src="img/logo_vaika_location.png" alt="Vaika Location">
                        <ul>
                            <li><a href="contact.php">Qui nous sommes ?</a></li>
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
                                    Contact Mentions legal CGU
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
<script src="js/menu-interactions.js"></script>
<script>
    function load() {
        const cadreLogin = document.getElementById("cadre_login");
        cadreLogin.style.transform = "translateY(0px)";
        cadreLogin.style.opacity = "1";
    }
    setTimeout(load, 500);
</script>

</html>