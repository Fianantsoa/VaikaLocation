<?php
    require 'connectionBDD.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    $email_c = $_POST['email'];
    $description_c = $_POST['message'];
    $telephone_c = $_POST['phone'];
    $objet = $_POST['subject'];

    $sql = "INSERT INTO contact_us (email_c, telephone_c, description_c, message_c, date) 
                    VALUES ('$email_c', '$telephone_c', '$description_c', '$objet', NOW())";
    
    if ($connexion->query($sql) === TRUE) {
        require 'vendor/autoload.php';
        $mail = new PHPMailer; // Activer les exceptions
        
        try {
            // Requête SQL pour vérifier les informations de connexion
            $sql = "SELECT * FROM smtp LIMIT 1";
            $result = $connexion->query($sql);
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $host = $row['host'];
                $username = $row['username'];
                $password = $row['password'];
                $senderName = $row['sender_name'];
                $mailReceiver = $row['mail_receiver'];
                $nameMailReceiver = $row['name_mail_receiver'];
            }

            $mail->isSMTP();
            $mail->Host = $host;
            $mail->SMTPAuth = true;
            $mail->Username = $username;
            $mail->Password = base64_decode($password); 
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            // Configurer l'expéditeur et le destinataire
            $mail->setFrom($senderName, 'Vaika Location'); //expediteur
            $mail->addAddress($mailReceiver, $nameMailReceiver); //Recepteur
            $mail->CharSet = 'UTF-8';
            // Ajouter un sujet et un corps au message
            $mail->Subject = "Vaika Location : Nouveaux contact";
            
            $mail->Body = "<div style='display:flex'>
                                <div style='width: 38px;overflow: hidden;border-radius: 24px;height: 35px;'>
                                    <img src='https://w7.pngwing.com/pngs/693/455/png-transparent-alert-bell-notice-notifications-notify-youtuber-icon-thumbnail.png' 
                                     style='width: 34px;margin: 0 0 0 3px;'>
                                </div>
                                <h3 style='margin-top:7px'>Vaika Location</h3>
                            </div>
                            <b>Alert !</b><br> L'utilisateur " . $email_c . " essaye de vous contactez. Apropos: ".
                            "<b>" . $objet . ".</b><br> Il a écrit : <b>\"".
                            $description_c . "\"</b>";
            // Envoyer le message
            $mail->IsHTML(true);
            $mail->send();
        } catch (Exception $e) {
            echo 'Erreur lors de l\'envoi du message : ' . $e->getMessage();
        }
        header("Location: ../index.php");
        exit;
    } else {
        echo "Erreur lors de l'insertion : " . $connexion->error;
    }

    $connexion->close();
?>