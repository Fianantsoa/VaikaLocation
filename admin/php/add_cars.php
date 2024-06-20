<?php
// Étape 1 : Capturer les données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modele = $_POST["modele"];
    $prix = $_POST["prix"];
    $places = $_POST["places"];
    $carburant = $_POST["carburant"];
    $places_car = $_POST["places_car"];
    $consommation = $_POST["consommation"];
    include("connexion.php");
    $image = file_get_contents($_FILES["image"]["tmp_name"]);
    $image = $connexion->real_escape_string($image);

    // Vérifier la connexion
    if ($connexion->connect_error) {
        die("La connexion à la base de données a échoué : " . $connexion->connect_error);
    }

    // Étape 3 : Insérer les données dans la base de données 
    $sql = "INSERT INTO cars (image, modele, prix, places, places_car, carburant, consommation) VALUES ('$image', '$modele', '$prix', '$places', '$places_car', '$carburant', '$consommation')";

    if ($connexion->query($sql) === TRUE) {
        session_start();
        $_SESSION['add_car'] = "succes";
        // Étape 4 : Rediriger vers une autre page après l'insertion des données
        header("Location: ../cars.php");
        exit;
    } else {
        echo "Erreur lors de l'insertion des données : " . $connexion->error;
    }
    $connexion->close();
}
