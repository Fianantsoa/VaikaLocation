<?php

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name_admin = $_POST["name_admin"];
    $email_admin = $_POST["email_admin"];
    $password_admin = $_POST["password_admin"];
    $telephone = $_POST["telephone"];
    $addresse_admin = $_POST["addresse_admin"];
    $image = $_FILES["image"]["tmp_name"];
    require 'connexion.php';
    if((!empty($name_admin) && isset($name_admin)) &&
    (!empty($email_admin) && isset($email_admin)) &&
    (!empty($password_admin) && isset($password_admin)) &&
    (!empty($telephone) && isset($telephone)) &&
    (!empty($addresse_admin) && isset($addresse_admin))){
        // Requête SQL pour mettre à jour la table
        if(isset($image) && !empty($image)){
            $image = file_get_contents($image);
            $image = $connexion->real_escape_string($image);
            $sql = "UPDATE users SET 
            fullname = '".$name_admin."',
            email = '".$email_admin."',
            role = 'Admin',
            telephone = '".$telephone."',
            image = '".$image."',
            adresse = '".$addresse_admin."' WHERE id = 1";
        }else{
            $sql = "UPDATE users SET 
            fullname = '".$name_admin."',
            email = '".$email_admin."',
            role = 'Admin',
            telephone = '".$telephone."',
            adresse = '".$addresse_admin."' WHERE id = 1";
            echo "plan :b";
        }
        // Exécution de la requête
        if ($connexion->query($sql) === TRUE) {
            session_start();
            $_SESSION['update_success'] = "update_success";
            // Redirection vers la page de succès
            header("Location: ../pages-profile.php");
            exit();
        } else {
            echo "Erreur lors de la mise à jour : " . $stmt->error;
        }
    }else{
        header("Location: ../pages-profile.php");
        exit();
    }
    // Fermer la connexion à la base de données
    $connexion->close();
}
?>
