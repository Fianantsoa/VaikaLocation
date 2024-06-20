<?php

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $host = $_POST["host"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sender_name = $_POST["sender_name"];
    $mail_receiver = $_POST["mail_receiver"];
    $name_mail_receiver = $_POST["name_mail_receiver"];
    require 'connexion.php';
    if((!empty($host) && isset($host)) &&
    (!empty($username) && isset($username)) &&
    (!empty($sender_name) && isset($sender_name)) &&
    (!empty($mail_receiver) && isset($mail_receiver)) &&
    (!empty($name_mail_receiver) && isset($name_mail_receiver))){
        // Requête SQL pour mettre à jour la table
        if(isset($password) && !empty($password)){
            $password = base64_encode($password);
            $sql = "UPDATE smtp SET 
            host = '".$host."',
            username = '".$username."',
            password = '".$password."',
            sender_name = '".$sender_name."',
            mail_receiver = '".$mail_receiver."',
            name_mail_receiver = '".$name_mail_receiver."' WHERE id = 1";
        }else{
            $sql = "UPDATE smtp SET 
            host = '".$host."',
            username = '".$username."',
            sender_name = '".$sender_name."',
            mail_receiver = '".$mail_receiver."',
            name_mail_receiver = '".$name_mail_receiver."' WHERE id = 1";
        }
        // Exécution de la requête
        if ($connexion->query($sql) === TRUE) {
            session_start();
            $_SESSION['update_success'] = "update_success";
            // Redirection vers la page de succès
            header("Location: ../conf_smtp.php");
            exit();
        } else {
            echo "Erreur lors de la mise à jour : " . $stmt->error;
        }
    }else{
        header("Location: ../conf_smtp.php");
        exit();
    }
    // Fermer la connexion à la base de données
    $connexion->close();
}
?>
