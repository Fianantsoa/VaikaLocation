<?php
    $id = $_GET["id"];
    include("connexion.php");
    $query = "DELETE FROM customer WHERE id=$id";
    if ($connexion->query($query) === TRUE) {
        session_start();
        $_SESSION['delete_customer'] = "success";
        // Affiche un message de succès
        header("Location: ../customers.php");
        echo "Suppression réussie.";
    } else {
        // Gestion des erreurs
        header("Location: ../customers.php");
        echo "Erreur de suppression : " . $mysqli->error;
    }
    $connexion->close();
?>