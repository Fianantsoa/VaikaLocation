<?php
    $serveur = "localhost"; 
    $utilisateur = "root";
    $motDePasse = ""; 
    $baseDeDonnees = "vaika_location"; 
    $connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);
    $connexion->set_charset("utf8mb4");
?>