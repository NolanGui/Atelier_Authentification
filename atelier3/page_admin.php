<?php
// Démarrer la session
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['user_type'] !== ('admin')) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <h1>Bienvenue sur la page Admin</h1>
    <a href="logout.php">Déconnexion</a>
</body>
</html>

