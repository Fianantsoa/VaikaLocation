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
    <meta name="description" content="Bienvenue chez Vaika Location - Votre partenaire pour la location de voitures à Madagascar. Découvrez notre flotte de véhicules et réservez la voiture parfaite pour votre voyage en toute simplicité.">
    <link rel="stylesheet" href="css/styles_login.css">
    <link rel="shortcut icon" type="image/png" href="img/favicon.ico" />
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
                    <ul class="login">
                        <li><a href="index.php">Retour</a></li>
                    </ul>
                </div>
            </div>
        </header>
    </div>
    <div class="container_login">
        <div class="cadre_login" id="cadre_login" style="padding-bottom: 55px;">

            <h2 style="color:#28863C;font-size:16px">MENTION LÉGAL</h2>
            <p style="font-family: Arial;line-height: 21px;">

                <b>Ce site web est édité et exploité par </b>: Brique Web <br><br>

                <b>Propriété de </b>: Vaika Location <br><br>

                <b>Éditeur du site </b>: NOMENTSOA Fianantsoa Fernando <br><br>

                <b>Raison sociale </b>: Location de voiture <br><br>

                <b>Adresse </b>: Lot III A 97 A, Tsimialonjafy, Mahamasina <br><br>

                <b>Téléphone </b>: + 261 34 05 891 97 <br><br>

                <b>Adresse e-mail </b>: vaikalocation@briqueweb.com <br><br>

                <b>Hébergeur du site </b>: <br><br>

                <b>Nom </b>: Tranokala <br>
                <b>Adresse </b>: Lot II J 96 Bis A, Antananarivo 101 <br>
                <b>Téléphone </b>: +261 34 41 189 33 <br>
            </p> <br>
            <h2 style="color:#28863C;font-size: 16px;">PROTECTION DES DONNÉES PERSONNELLES</h2>
            <p style="font-family: Arial;line-height: 21px;text-indent: 20px;">
                Vaika Location s'engage à respecter la vie privée de
                ses utilisateurs. En utilisant ce site web, vous consentez
                à la collecte, au stockage et au traitement de vos données
                personnelles conformément à la politique de confidentialité
                de Vaika Location.
            </p> <br>
            <h2 style="color:#28863C;font-size: 16px;">CONDITIONS GÉNÉRALES D'UTILISATION</h2>
            <p style="font-family: Arial;line-height: 21px;">
                <b>OBJET </b><br>
                Les présentes Conditions Générales d'Utilisation (CGU) régissent l'utilisation du site web Vaika Location.
                En accédant à ce site et en l'utilisant, vous acceptez ces CGU dans leur intégralité. Si vous n'acceptez
                pas ces CGU, veuillez cesser d'utiliser ce site. <br><br>

                <b>UTILISATION DU SITE</b><br>
                Vous êtes autorisé à utiliser ce site web à des fins personnelles et non commerciales. Vous ne pouvez pas
                utiliser ce site d'une manière qui violerait les lois en vigueur ou les droits de tiers. <br><br>

                <b>RÉSERVATION DE VÉHICULES</b><br>
                L'utilisation de notre service de réservation de véhicules est soumise à des modalités spécifiques que
                vous acceptez lors de la réservation. Veuillez consulter ces modalités avant de procéder à une réservation.
                <br><br>

                <b>RESPONSABILITÉ</b><br>
                Vaika Location s'efforce de fournir des informations précises et à jour sur ce site, mais ne peut garantir
                l'exactitude de ces informations. Nous ne serons pas responsables des dommages directs ou indirects
                résultant de l'utilisation de ce site ou de l'impossibilité de l'utiliser. <br><br>

                <b>PROPRIÉTÉ INTELLECTUELLE</b><br>
                Ce site web et son contenu sont la propriété exclusive de Vaika Location et sont protégés par les lois
                sur la propriété intellectuelle. Toute utilisation non autorisée du contenu de ce site est interdite. <br><br>

                <b>MODIFICATIONS</b><br>
                Vaika Location se réserve le droit de modifier ces CGU à tout moment. Les modifications seront publiées
                sur ce site et seront effectives dès leur publication. Il est de votre responsabilité de vérifier régulièrement
                ces CGU pour rester informé des modifications éventuelles. <br><br>

                <b>LOI APPLICABLE</b><br>
                Ces CGU sont régies par le droit malgache, et tout litige relatif à leur interprétation ou à leur application
                sera soumis aux tribunaux compétents de Madagascar. <br><br>

                <span style="position: absolute;bottom: 5px;font-size: 13px;margin-left: 23%;">
                    Date de dernière mise à jour des CGU : Février 2023
                </span>
            </p>
        </div>
        <style>
            p {
                font-size: 14px;
            }

            #cadre_login {
                width: 55%;
                margin: 140px 18%;
            }

            @media only screen and (max-width:750px) {
                #cadre_login {
                    width: 76%;
                    margin: 140px 8%;
                }
            }
        </style>
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