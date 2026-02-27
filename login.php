<?php
session_start();
require_once 'classes/Utilisateurs.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = $_POST['pseudo'] ?? '';
    $mdp = $_POST['mot_de_passe'] ?? '';

    $user = new Utilisateur();
    $data = $user->findByPseudo($pseudo);

    if ($data && $mdp === $data['mot_de_passe']) {
        $_SESSION['user_id'] = $data['id'];
        header('Location: profil.php');
        exit;
    } else {
        $message = "Pseudo ou mot de passe incorrect";
    }
}

include 'header.php'
    ?>
<div class="container">
    <h1>Connexion</h1>
    <?php if ($message): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>
    <form method="post">
        <div>
            <label>Pseudo :</label>
            <input type="text" name="pseudo" required>
        </div>
        <div>
            <label>Mot de passe :</label>
            <input type="password" name="mot_de_passe" required>
        </div>
        <button type="submit">Se connecter</button>
    </form>
</div>
<?php include 'footer.php'; ?>