<?php
    
    $name_user_up = $_POST["name_user_up"];
    $email_user_up = $_POST["email_user_up"];
    $password_user_up = $_POST["password_user_up"];
    $repassword_user_up = $_POST["repassword_user_up"];
    $button_update_user = $_POST["button_update_user"];
    if(isset($button_update_user)){
        if(!empty($name_user_up) && !empty($email_user_up) && !empty($password_user_up) && !empty($repassword_user_up)){
            if ($password_user_up === $repassword_user_up) {
                if (strlen($password_user_up) > 8) {
                    require 'connectionBDD.php';
                    if ($connexion->connect_error) {
                        die("La connexion a échoué : " . $connexion->connect_error);
                    }
                    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
                        // Récupérez les données du fichier téléchargé
                        $image = file_get_contents($_FILES["image"]["tmp_name"]);
                        $image = $connexion->real_escape_string($image);
                        $password_user_up = password_hash($password_user_up, PASSWORD_DEFAULT);
                        $sql = "UPDATE customer SET name_user='$name_user_up', 
                            email_c='$email_user_up', password='$password_user_up', img='$image' WHERE id='$user_id'";
                    }else{
                        $password_user_up = password_hash($password_user_up, PASSWORD_DEFAULT);
                        $sql = "UPDATE customer SET name_user='$name_user_up', 
                            email_c='$email_user_up', password='$password_user_up' WHERE id='$user_id'";
                    }
                    if ($connexion->query($sql) === TRUE) {
                        echo '<p style="color:#00FF00;font-size:13px;margin: -10px 0;">Modification réussie.</p>';
                        echo '<script>
                                const view_update = document.getElementById("profil_update");
                                view_update.style.display = "block";
                            </script>';
                        session_start();
                        $_SESSION['user_email'] = $email_user_up;
                        $_SESSION['user_name'] = $name_user_up;
                        header("Location: ./index.php");
                    } else {
                        echo '<p style="color:#FF0000;margin: -10px 0;font-size:13px;">Erreur lors de la mise à jour : "' . $connexion->error . '</p>';
                        echo '<script>
                                const view_update = document.getElementById("profil_update");
                                view_update.style.display = "block";
                            </script>';
                    }
                    $connexion->close();
                }else{
                    echo '<p style="color:#FF0000;margin: -10px 0;font-size:13px;">Mot de passe trop court</p>';
                        echo '<script>
                                const view_update = document.getElementById("profil_update");
                                view_update.style.display = "block";
                            </script>';
                }
            }else{
                echo '<p style="color:#FF0000;font-size:13px;margin: -10px 0;">Mot de passe ne correspond pas.</p>';
                echo '<script>
                            const view_update = document.getElementById("profil_update");
                            view_update.style.display = "block";
                        </script>';
            }
        }else{
            echo '<p style="color:#FF0000;font-size:13px;margin: -10px 0;">Veuillez remplir les cases.</p>';
            echo '<script>
                            const view_update = document.getElementById("profil_update");
                            view_update.style.display = "block";
                        </script>';
        }
        
    }
?>