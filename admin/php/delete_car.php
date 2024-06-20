<?php
    $id = $_GET["id"];
    include("connexion.php");
    $query = "DELETE FROM cars WHERE id=$id";
    if ($connexion->query($query) === TRUE) {
        session_start();
        $_SESSION['delete_car'] = "succes";
        // Affiche un message de succès
        header("Location: ../cars.php");
        echo "Suppression réussie.";
    } else {
        // Gestion des erreurs
        header("Location: ../cars.php");
        echo "Erreur de suppression : " . $mysqli->error;
    }
    $connexion->close();
?>