<?php
    $id = $_GET["id"];
    include("connexion.php");
    $query = "DELETE FROM reservation WHERE id_r=$id";
    if ($connexion->query($query) === TRUE) {
        session_start();
        $_SESSION['delete_reservation_success'] = "success";
        // Affiche un message de succès
        header("Location: ../reservation.php");
        echo "Suppression réussie.";
    } else {
        // Gestion des erreurs
        header("Location: ../reservation.php");
        echo "Erreur de suppression : " . $mysqli->error;
    }
    $connexion->close();
?>