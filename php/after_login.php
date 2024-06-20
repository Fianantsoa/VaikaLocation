<?php
// Connexion à la base de données
include("connectionBDD.php");

// Vérifier la connexion
if ($connexion->connect_error) {
    die("Erreur de connexion à la base de données : " . $connexion->connect_error);
}

// Récupérer les données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {
        $errorMessage = "Vous n'avez pas rempli tous les champs.";
    } else {
        // Requête pour récupérer l'utilisateur en fonction de l'email dans la table "users"
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = $connexion->query($query);

        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $dbPassword = $user["password"];

            // Vérifier si le mot de passe correspond
            if (password_verify($password, $dbPassword)) {
                // Vérifier le rôle de l'utilisateur
                if ($user["role"] === "Admin") {
                    session_start();
                    $_SESSION['admin'] = $email;
                    // Rediriger vers le tableau de bord
                    header("Location: ./admin/dashboard.php");
                    exit();
                }
            } else {
                $errorMessage = "Le mot de passe ne correspond pas.";
            }
        } else {
            // Si l'email n'est pas trouvé dans la table "users", rechercher dans la table "customer"
            $query = "SELECT * FROM customer WHERE email_c = '$email'";
            $result = $connexion->query($query);

            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $dbPassword_user = $row["password"];

                // Vérifier si le mot de passe correspond
                if (password_verify($password, $dbPassword_user)) {
                    session_start();
                    if ($row["status_mail"] == "non_verified") {
                        $_SESSION['compte'] = "Activez votre compte par e-mail.";
                        header("Location: login.php");
                    } else {
                        // Assigner les valeurs à $_SESSION
                        $_SESSION['user_id'] = $row['id'];
                        $_SESSION['user_name'] = $row['name_user'];
                        $_SESSION['user_email'] = $row['email_c'];
                        $_SESSION['user_password'] = $row['password'];
                        $_SESSION['user_image'] = $row['img'];
                        $_SESSION["compte"] = "";

                        // Rediriger l'utilisateur
                        header("Location: index.php");
                    }
                    exit();
                } else {
                    $errorMessage = "Le mot de passe ne correspond pas.";
                }
            } else {
                $errorMessage = "L'email n'a pas été trouvé dans la base de données.";
            }
        }
    }
}
