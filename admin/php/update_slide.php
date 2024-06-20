<?php  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les données du formulaire
        $id_slide = $_POST['id_slide'];
        
        $titre = $_POST['titre'.$id_slide];
        $titre = htmlspecialchars($titre);
        $description = $_POST['description'.$id_slide];
        $description = htmlspecialchars($description);
        
        require 'connexion.php';
        if((!empty($titre) && isset($titre)) &&
        (!empty($description) && isset($description))){
            if(isset($_FILES["image".$id_slide]["tmp_name"]) && !empty($_FILES["image".$id_slide]["tmp_name"])){
                $image_slide = file_get_contents($_FILES["image".$id_slide]["tmp_name"]);
                $image_slide = $connexion->real_escape_string($image_slide);
                $sql = "UPDATE img_slide SET 
                titre = '".$titre."',
                description = '".$description."',
                image_slide = '".$image_slide."' WHERE id = $id_slide";
            }else{
                $sql = "UPDATE img_slide SET 
                titre = '".$titre."',
                description = '".$description."' WHERE id = $id_slide";
            }
            // Exécution de la requête
            if ($connexion->query($sql) === TRUE) {
                // Redirection vers la page de succès
                header("Location: ../slides.php");
                exit();
            } else {
                echo "Erreur lors de la mise à jour : " . $stmt->error;
            }
        }else{
            header("Location: ../slides.php");
            exit();
        }
        // Fermer la connexion à la base de données
        $connexion->close();
    }
?>