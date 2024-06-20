<?php
    function actived_mail($email1){
        require 'connectionBDD.php';
        
        if ($connexion->connect_error) {
            die("La connexion a échoué : " . $connexion->connect_error);
        }
        $sql = "UPDATE customer SET status_mail='verified' WHERE email_c='$email1'";
        if ($connexion->query($sql) === TRUE) {
            echo "Mise à jour réussie.";
        } else {
            echo "Erreur lors de la mise à jour : " . $connexion->error;
            // Affichez également l'erreur SQL spécifique
            echo "Erreur SQL : " . $sql;
        }

        $connexion->close();
    }
    if (isset($_GET['email'])) {
        $parametre = $_GET['email'];
        // Appelez la fonction avec le paramètre
        actived_mail($parametre);
        header("Location: ../login.php");
        exit;
    } else {
        echo "Le paramètre n'a pas été fourni.";
    }
?>