<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur s'est bien connecté
if (!isset($_SESSION['loggedin']) || $_SESSION['user_type'] !== ('user')) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page User</title>
</head>
<body>
    <h1>Bienvenue sur la page User</h1>
    <a href="logout.php">Déconnexion</a>
</body>
</html>