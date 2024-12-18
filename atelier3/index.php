<?php
// Démarre la session
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    if ($_SESSION['user_type'] === 'admin') {
        header('Location: page_admin.php');
    } else {
        header('Location: page_user.php');
    }
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === 'secret') {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['user_type'] = 'admin';

        header('Location: page_admin.php');
        exit();
    } elseif ($username === 'user' && $password === 'utilisateur') {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['user_type'] = 'user';

        header('Location: page_user.php');
        exit();
    } else {
        $error = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h1>Atelier authentification par Session</h1>
    <h3>La page <a href="page_admin.php">page_admin.php</a> est inaccéssible tant que vous ne vous serez pas connecté avec le login 'admin' et mot de passe 'secret'</h3>
    <ul>
        <li><strong>Admin :</strong> admin / secret</li>
        <li><strong>User :</strong> user / utilisateur</li>
    </ul>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required>
        <br><br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <br><br>
        <button type="submit">Se connecter</button>
    </form>
    <br>
    <a href="../index.html">Retour à l'accueil</a>  
</body>
</html>
