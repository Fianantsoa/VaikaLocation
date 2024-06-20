<?php
// Démarrez ou restaurez la session
session_start();

// Détruisez toutes les variables de session
session_unset();

// Détruisez complètement la session
session_destroy();
// Redirigez l'utilisateur vers une page de confirmation ou d'accueil
header("Location: ../index.php"); // Remplacez "index.php" par la page vers laquelle vous souhaitez rediriger après la déconnexion
exit;
?>
