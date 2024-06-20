<?php
    $id = $_POST['id'];
    $modele = $_POST['modele'];
    $prix = $_POST['prix'];
    $places = $_POST['places'];
    $places_car = $_POST['places_car'];
    $carburant = $_POST['carburant'];
    $consommation = $_POST['consommation'];
    include("connexion.php");
    $sql = "UPDATE cars SET 
    modele = '$modele', 
    prix = '$prix', 
    places = '$places', 
    places_car = '$places_car', 
    carburant = '$carburant', 
    consommation = '$consommation' WHERE id = $id";
    if ($connexion->query($sql) === TRUE) {
        session_start();
        $_SESSION['update_car'] = "succes";
        echo "L'élément a été mis à jour avec succès.";
        header("Location: ../cars.php");
        exit;
    } else {
        echo "Erreur lors de la mise à jour de l'élément : " . $connexion->error;
        header("Location: ../cars.php");
        exit;
    }

    // Fermer la connexion à la base de données
    $connexion->close();
