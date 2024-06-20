<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'php/vendor/autoload.php';
        $mail = new PHPMailer(true);
        try {
            include('php/connectionBDD.php');
            $sql = "SELECT * FROM smtp LIMIT 1";
            $result = $connexion->query($sql);
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $host = $row['host'];
                $username = $row['username'];
                $password = $row['password'];
                $senderName = $row['sender_name'];
            }
            
         // Configuration du serveur SMTP
            $mail->isSMTP();
            $mail->Host = $host;
            $mail->SMTPAuth = true;
            $mail->Username = $username;
            $mail->Password = base64_decode($password);  // Votre mot de passe
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;// Port SMTP
            // Destinataire
            $mail->setFrom($senderName, 'Vaika Location');
            $mail->addAddress($email);
            
            // Contenu de l'e-mail
            $mail->isHTML(true);
            $mail->Subject = 'Activation de votre compte sur Vaika Location';
            $mail->Body    = '<html>
            <head>
                <meta charset="UTF-8">
                <title>Activation de compte</title>
                <style>
                    div p{
                        font-size: 15px;
                    }
                    div p.lien_copied{
                        font-size: 13px;
                    }
                    div p.copy{
                        cursor: pointer; color: blue; line-height: 0px;
                    }
                </style>
            </head>
            <body>
                <div style="width: 900px; border: 1px solid;padding: 20px;">
                    <h3>Bienvenue sur Vaika Location !</h3>
                    <p style="text-align: center;margin-top: 50px;">Merci de cliquer sur le lien ci-dessous pour activer votre compte :</p>
                    <p style="text-align: center;margin-bottom: 50px;"><a href="localhost/VL/php/actived_mail_bdd.php?email='.$email.'" style="background-color: #007BFF; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Activer mon compte</a></p>
                    <p class="lien_copied">Si le bouton ne fonctionne pas, vous pouvez copier-coller ce lien dans votre navigateur :</p>
                    <p class="lien_copied">https://www.votresite.com/activation.php?code=XXXXX</p>
                    <p style="text-align: right;">Merci de nous rejoindre !</p>
                </div>
            </body>
            </html>
            ';
            // Envoyer l'e-mail
            $mail->send();
        }catch (Exception $e) {
            
        }
?>