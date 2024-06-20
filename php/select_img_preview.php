<?php
    function generateCarImages($place, $class_img) {
        // Établissez la connexion à votre base de données
        include("php/connectionBDD.php");

        if ($connexion->connect_error) {
            die("La connexion à la base de données a échoué : " . $connexion->connect_error);
        }

        // Échappez le paramètre $place pour éviter les injections SQL
        $safePlace = $connexion->real_escape_string($place);

        // Exécutez une requête SQL pour récupérer les images en fonction de la place
        $sql = "SELECT image FROM cars WHERE places = $safePlace";
        $result = $connexion->query($sql);

        $carImages = '';

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $imageData = base64_encode($row['image']);
                // Création de la balise d'image avec l'URL de données
                $carImages .= '<img src="data:image/jpeg;base64,' . $imageData . '" alt="A louer" class="'. $class_img .'">';
            }
        }
        return $carImages;
    }
?>
