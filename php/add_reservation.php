<?php

require 'connectionBDD.php';
error_reporting(E_ALL & ~E_NOTICE);

// Activer l'affichage des erreurs à l'écran
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Afficher les erreurs dans le fichier de logs PHP (facultatif)
ini_set('log_errors', 1);
ini_set('error_log', '/chemin/vers/votre/fichier.log');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$email_r = $_POST['email'];
$modele_car_r = $_POST['modele'];
$prix_car_r = $_POST['prix'];
$itineraire = $_POST['description'];
$telephone_r = $_POST['phone'];
$objet = $_POST['objet'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$date_depart = $_POST['date_depart'];
$date_retour = $_POST['date_retour'];
$id_car_res = $_POST['id_car_res'];


$query = "SELECT image FROM cars WHERE id = $id_car_res"; // Remplacez "id" par le champ qui identifie l'enregistrement
$result = $connexion->query($query);

/*if ($result) {
    // Récupérez les données de l'image
    $row = $result->fetch_assoc();
    $image = $row['image'];
} else {
    echo "Image non trouvée dans la table 'cars'.";
}


$image = hex2bin($image);*/



$sql = "INSERT INTO reservation (email_r, img_car_r, modele_car_r, prix_car_r, itineraire, telephone_r, date_r, subject, message, date_depart, date_retour) 
                    VALUES ('$email_r', '', '$modele_car_r', '$prix_car_r', '$itineraire', '$telephone_r', NOW(), '$subject', '$message', '$date_depart', '$date_depart')";

if ($connexion->query($sql) === TRUE) {
    session_start();
    $_SESSION['reservation'] = "réussi";
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
        $mail->Subject = "Vaika Location : " . $objet;
        $mail->Body = "<b>Email : </b>" . $email_r . "<br>" .
            "<b>Sujet : </b>" . $objet . " ou " . $subject . "<br>" .
            "<b>Message : </b>" . $itineraire . "<br>" .
            "<b>Voiture : </b>" . $modele_car_r . " d'ID : " . $id_car_res . "<br>" .
            "<b>Prix de location : </b>" . $prix_car_r . "<br>" .
            "<b>Date de location : </b>" . $date_depart . " jusqu'au " . $date_retour . " <br>" .
            "<b>Message : </b>" . $message . "<br>" .
            "<b>Téléphone : </b>" . $telephone_r;
        // Envoyer le message
        $mail->IsHTML(true);
        $mail->send();
    } catch (Exception $e) {
        echo 'Erreur lors de l\'envoi du message : ' . $e->getMessage();
    }

    $urlReservation = $_SESSION['url'];
    header("Location: $urlReservation");
    exit();
} else {
    echo "Erreur lors de l'insertion : " . $connexion->error;
}

$connexion->close();
