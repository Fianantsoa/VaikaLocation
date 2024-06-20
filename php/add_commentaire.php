<?php
                // Connexion à la base de données (à personnaliser avec vos informations de connexion)
                include("php/connectionBDD.php");

                // Traitement de l'ajout d'un commentaire
                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                    $contenu = $_POST["commentaire"];
                    if($contenu != ""){
                        $stmt = $connexion->prepare("INSERT INTO commentaire (contenu) VALUES (?)");
                        $stmt->bind_param("s", $contenu);

                        // Exécuter la requête
                        if ($stmt->execute()) {
                            // Rediriger vers la page pour éviter la répétition de l'envoi du formulaire
                            header("Location: votre_page.php");
                        } else {
                            echo "Erreur lors de l'ajout du commentaire : " . $stmt->error;
                        }

                    }
                }

            ?>