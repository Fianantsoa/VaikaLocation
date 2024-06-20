<?php
    $id = $_GET["id"];
    include("connexion.php");
    $query = "DELETE FROM commentaire WHERE id=$id";
    if ($connexion->query($query) === TRUE) {
        session_start();
        $_SESSION['delete_comment'] = "success";
        // Affiche un message de succès
        header("Location: ../comment.php");
        echo "Suppression réussie.";
    } else {
        // Gestion des erreurs
        header("Location: ../comment.php");
        echo "Erreur de suppression : " . $mysqli->error;
    }
    $connexion->close();
?>