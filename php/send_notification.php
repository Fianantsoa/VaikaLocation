<?php
// Inclure la bibliothèque PHPMailer
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/autoload.php'; // Assurez-vous d'ajuster le chemin selon votre configuration
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      // Récupérer l'adresse e-mail soumise dans le formulaire
        $email = $_GET["email"];
         // Configurez PHPMailer pour envoyer l'e-mail
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
            if(!empty($email_service)){
                $mail->addAddress($email_service);
            }
            if(!empty($email)){
                $mail->addAddress($email);
            }
            
            // Contenu de l'e-mail
            $mail->isHTML(true);
            $mail->Subject = 'Nouveau produit';
            $mail->Body    = '
            <div style="border: 1px solid black; width: 700px;border-radius: 0 5px 5px 5px; ">
        <div style="padding: 20px;">
        <div style="display: flex;position: relative;">
            <div>
                <p><b>Vaika Location</b></p>
                    <p style="margin: 31px 18px 0 18px;font-size: 13px;">

                    Cher Client,<br>
                    
                    
                </p>
            </div>
            <img src="https://www.goldenapplecars.fr/template/golden-apple-cars/img/voiture-accueil.png" 
            alt="" style="width:168px;margin-left: 238px;">
        </div>
        <div>
            <p>
            Bienvenue sur Vaika location ! 🚗<br>
                    
                    Nous sommes ravis de vous accueillir parmi nos clients. Vous avez maintenant accès à une large gamme de véhicules de qualité pour rendre votre prochain voyage inoubliable.
                    
                    N\'hésitez pas à explorer notre site web et à réserver votre prochaine location de voiture en toute simplicité.
                    
                    Nous sommes là pour répondre à vos besoins et à vos questions. N\'hésitez pas à nous contacter si vous avez besoin d\'assistance. <br>
                    
                    Bienvenue à bord ! <br><br>
                    
                    Cordialement,<br>
                    Brique Web <br>
                    Administrateur <br>
                    Vaika Location
                </p>
            </div>
        </div>
        <div style="background-color: #0e3116;;width: 100%;height: 130px;">
            <div style="padding: 20px; color: white;font-size: 12px;">
                <p><span>Bureau : </span>Tsimialonjafy Mahamasina</p>
                <p><span>Telephone : </span>+ 261 34 05 891 97</p>
                <p><span>Site : </span><a href="https://www.briqueweb.com/">Brique web</a></p>
            </div>
        </div>
    </div>';
            

          // Envoyer l'e-mail
        $mail->send();
        /*
        $name = "visiteur"; // Remplacez par le nom
            // Requête d'insertion
        $sql = "INSERT INTO customer (name, email) VALUES ('$name', '$email')";
        $connexion->query($sql);
        */
        session_start();
        $_SESSION['update_success'] = "update_success";
        $connexion->close();
        echo '<p style="font: size 13px;color:green;">L\'e-mail a été envoyé avec succès</p>';
        } catch (Exception $e) {
            
        }
    }
?>