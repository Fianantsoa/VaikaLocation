<?php
    session_start();
    $user_id = $_SESSION['user_id'];
    $name_user_up_c = $_POST["name_user_up_c"];
    $email_user_up_c = $_POST["email_user_up_c"];
    $password_user_up_c = $_POST["password_user_up_c"];
    $repassword_user_up_c = $_POST["repassword_user_up_c"];
    $button_update_user_c = $_POST["button_update_user_c"];
    if(isset($button_update_user_c)){
        if(!empty($name_user_up_c) && !empty($email_user_up_c) && !empty($password_user_up_c) && !empty($repassword_user_up_c)){
            if ($password_user_up_c === $repassword_user_up_c) {
                if (strlen($password_user_up_c) > 8) {
                    require 'connectionBDD.php';
                    if ($connexion->connect_error) {
                        die("La connexion a échoué : " . $connexion->connect_error);
                    }
                    if (isset($_FILES["image_c"]) && $_FILES["image_c"]["error"] == 0) {
                        // Récupérez les données du fichier téléchargé
                        $image = file_get_contents($_FILES["image_c"]["tmp_name"]);
                        $image = $connexion->real_escape_string($image);
                        $password_user_up = password_hash($password_user_up_c, PASSWORD_DEFAULT);
                        $sql = "UPDATE customer SET name_user='$name_user_up_c', 
                            email_c='$email_user_up_c', password='$password_user_up_c', img='$image' WHERE id='$user_id'";
                    }else{
                        $password_user_up_c = password_hash($password_user_up_c, PASSWORD_DEFAULT);
                        $sql = "UPDATE customer SET name_user='$name_user_up_c', 
                            email_c='$email_user_up_c', password='$password_user_up_c' WHERE id='$user_id'";
                    }
                    if ($connexion->query($sql) === TRUE) {
                        echo '<p style="color:#00FF00;font-size:13px;margin: -10px 0;">Modification réussie.</p>';
                        echo '<script>
                                const view_update = document.getElementById("profil_update");
                                view_update.style.display = "block";
                            </script>';
                        session_start();
                        $_SESSION['user_email'] = $email_user_up_c;
                        $_SESSION['user_name'] = $name_user_up_c;
                        header("Location: ../contact.php");
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