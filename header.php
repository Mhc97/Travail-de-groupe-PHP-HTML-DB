<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet PHP</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="enregistrer.php">S'inscrire</a></li>
            <li><a href="login.php">Se connecter</a></li>
            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="logout.php">Déconnexion</a></li>
            <?php endif; ?>
        </ul>
    </nav>
