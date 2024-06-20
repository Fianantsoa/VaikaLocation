<?php
    include("connectionBDD.php");
    $query = "SELECT image_slide FROM img_slide";
    $result = $connexion->query($query);

    if ($result) {
        $images = array();
        while ($row = $result->fetch_assoc()) {
            // Assurez-vous que la colonne 'image_blob' correspond au nom de la colonne dans votre base de données
            $images[] = base64_encode($row['image_slide']);
        }
        
        echo json_encode($images);
    } else {
        echo "Aucune donnée trouvée.";
    }

    $connexion->close();
?>
