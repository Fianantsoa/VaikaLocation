<?php
// Établir la connexion à la base de données (à adapter avec vos informations)
include("php/connectionBDD.php");

if ($connexion->connect_error) {
    die("La connexion a échoué : " . $connexion->connect_error);
}

// Traiter les données du formulaire
if (isset($_POST['sign_up'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    // Vérifier si les mots de passe correspondent
    if (empty($username) || empty($email) || empty($password) || empty($repassword)) {
        echo "<script defer>
            const fill_boxes = document.getElementById('fill_boxes');
            fill_boxes.style.display = 'block';
        </script>";
    } elseif (strlen($password) < 8) {
        echo "<script defer>
            const short_password = document.getElementById('short_password');
            short_password.style.display = 'block';
            const password = document.getElementById('password');
            password.placeholder = '" . $password . "';
        </script>";
    } elseif ($password !== $repassword) {
        echo "<script defer>
        const incorrect_password = document.getElementById('incorrect_password');
        incorrect_password.style.display = 'block';
        const password = document.getElementById('password');
        password.placeholder = '" . $password . "';
        const repassword = document.getElementById('repassword');
        repassword.placeholder = '" . $repassword . "';
    </script>";
    } else {
        // Vérifier si l'email est déjà dans la base de données
        $emailCheckQuery = "SELECT id FROM customer WHERE email_c = '$email'";
        $emailCheckResult = $connexion->query($emailCheckQuery);

        if ($emailCheckResult->num_rows > 0) {
            echo '<script defer>
            const email_take = document.getElementById("email_take");
            email_take.style.display = "block";
            const emailInput = document.getElementById("email1");
            emailInput.placeholder = "' . $email . '";
        </script>';
        } else {
            $pattern = '/^(?=.*[A-Za-z])(?=.*)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}/';
            if (preg_match($pattern, $password)) {
                // Hasher le mot de passe
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                // Insérer les données dans la base de données
                $sql = "INSERT INTO customer(name_user, email_c, status_mail, password, img) VALUES ('$username', '$email', 'non_verified', '$hashedPassword', '')";
                if ($connexion->query($sql) === TRUE) {
                    echo "
                    <script defer>
                        const Successful = document.getElementById('Successful');
                        Successful.style.display = 'block';
                        const fill_boxes = document.getElementById('fill_boxes');
                        fill_boxes.style.display = 'none';
                    </script>";
                    include("php/actived_mail.php");
                } else {
                    echo "Erreur lors de l'inscription : " . $connexion->error;
                }
            } else {
                echo "<script>
                            var elementIncorrectPassword = document.getElementById('short_password1');
                            elementIncorrectPassword.style.display = 'block';
                    </script>";
            }
        }
    }
}
