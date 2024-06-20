<?php
    $id = $_GET["id"];
    include("connexion.php");
    $query = "DELETE FROM contact_us WHERE id=$id";
    if ($connexion->query($query) === TRUE) {
        session_start();
        $_SESSION['delete_contact'] = "success";
        // Affiche un message de succès
        header("Location: ../contact.php");
        echo "Suppression réussie.";
    } else {
        // Gestion des erreurs
        header("Location: ../contact.php");
        echo "Erreur de suppression : " . $mysqli->error;
    }
    $connexion->close();
?>