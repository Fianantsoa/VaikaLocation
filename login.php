<?php
include("php/after_login.php");
session_start();
unset($_SESSION["reservation"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaika Location_login</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/styles_login.css">
    <meta name="description" content="Bienvenue chez Vaika Location - Votre partenaire pour la location de voitures à Madagascar. Découvrez notre flotte de véhicules et réservez la voiture parfaite pour votre voyage en toute simplicité.">
    <link rel="shortcut icon" type="image/png" href="img/favicon.ico" />
    <link rel="stylesheet" href="admin/css/vendor/bootstrap-icons/bootstrap-icons.min.css">
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
                        <li><a href="registre.php">S'inscrire</a></li>
                    </ul>
                    <div id="bloc_shortcut">
                        <button href="login.php" id="showButton" onclick="hidden()"><img src="img/favicon/menu (1).png" alt=""></button>
                    </div>
                    <script>
                        const showButton = document.getElementById('showButton');
                        const menu = document.getElementById('menu');
                        const menuLinks = menu.querySelectorAll('a');

                        showButton.addEventListener('click', () => {
                            menu.classList.toggle('show');
                        });

                        menuLinks.forEach(link => {
                            link.addEventListener('click', () => {
                                menu.classList.remove('show');
                            });
                        });
                    </script>
                    <script defer>
                        function headdescend() {
                            const headmenu = document.getElementById("head");
                            headmenu.style.transform = "translateY(0)";
                            headmenu.style.opacity = "1";
                        }
                        setTimeout(headdescend, 500); // Vous pouvez ajuster la durée de l'attente (en millisecondes) selon vos préférences
                    </script>
                </div>
            </div>
        </header>
    </div>
    <div class="container_login">
        <div class="cadre_login" id="cadre_login">
            <div>
                <h2 style="color: #28863C;">Se connecter</h2>
                <form action="#" method="POST">
                    <label for="email">Email</label><br>
                    <input type="email" name="email" class="input" pattern="^[A-Za-z0-9\s!@.]*$" title="Caractères autorisés : lettres, chiffres, espaces, @ ."><br>
                    <label for="password">Mot de passe</label><br>
                    <input type="password" name="password" class="input" pattern="^[A-Za-z0-9\s!@#$%^&*()-_+=.,;?]*$" title="Caractères autorisés : lettres, chiffres, espaces, ! @ # $ % ^ & * ( ) - _ + = . , ; ?"><br>
                    <input type="submit" value="CONNECTER" name="sign_up" class="sign_up">
                    <a href="registre.php" class="registre">S'inscrire</a>
                </form>
                <p style="color: red;font-size:12px">
                    <?php
                    if (isset($errorMessage)) {
                        echo $errorMessage;
                    }
                    if ($_SESSION["compte"] != "") {
                        echo $_SESSION["compte"];
                        $_SESSION["compte"] = "";
                    }
                    ?>
                </p>

            </div>
            <div class="logo_rigth" style="top: 50px;">
                <img src="img/logo_vaika_location.png" alt="logo">
            </div>
            <div id="contact" style="position: absolute;top: 300px;"></div>
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
<script defer>
    function load() {
        const cadreLogin = document.getElementById("cadre_login");
        cadreLogin.style.transform = "translateY(-30px)";
        cadreLogin.style.opacity = "1";
    }
    setTimeout(load, 500); // Vous pouvez ajuster la durée de l'attente (en millisecondes) selon vos préférences
</script>

</html>