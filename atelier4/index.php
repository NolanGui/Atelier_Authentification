<?php
$users = [
    'admin' => 'secret',
    'user' => '1234'
];

if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
    header('WWW-Authenticate: Basic realm="Zone Protégée"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Vous devez entrer un nom d\'utilisateur et un mot de passe pour accéder à cette page.';
    exit;
}

$username = $_SERVER['PHP_AUTH_USER'];
$password = $_SERVER['PHP_AUTH_PW'];

if (!array_key_exists($username, $users) || $users[$username] !== $password) {
    header('WWW-Authenticate: Basic realm="Zone Protégée"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Nom d\'utilisateur ou mot de passe incorrect.';
    exit;
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page protégée</title>
</head>
<body>
    <h1>Bienvenue sur la page protégée</h1>
    <p>Ceci est une page protégée par une authentification simple via le header HTTP</p>
    <p>C'est le serveur qui vous demande un nom d'utilisateur et un mot de passe via le header WWW-Authenticate</p>
    <p>Aucun système de session ou cookie n'est utilisé pour cet atelier</p>
    <p>Vous êtes connecté en tant que : <strong><?php echo htmlspecialchars($username); ?></strong></p>

    <?php if ($username === 'admin') : ?>
        <h2>Informations avancées</h2>
        <p>Vous êtes un administrateur. Voici des informations supplémentaires réservées à votre rôle.</p>
        <ul>
            <li>Données confidentielles</li>
            <li>Rapports d'activité</li>
            <li>Statistiques du serveur</li>
        </ul>
    <?php else : ?>
        <h2>Informations générales</h2>
        <p>Vous êtes un utilisateur standard. L'accès aux informations avancées est limité.</p>
    <?php endif; ?>

    <a href="../index.html">Retour à l'accueil</a>  
</body>
</html>
