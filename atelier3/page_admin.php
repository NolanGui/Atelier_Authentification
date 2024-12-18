<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est authentifié en tant qu'admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Admin</title>
</head>
<body>
    <h1>Bienvenue sur la page Admin</h1>
    <a href="logout.php">Déconnexion</a>
</body>
</html>

