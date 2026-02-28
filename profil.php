<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

require_once 'classes/Utilisateur.php';
require_once 'classes/Ville.php';

$userObj = new Utilisateur();
$user = $userObj->getUserWithVille($_SESSION['user_id']);

$villeObj = new Ville();
$nationalite = $villeObj->getNationaliteByPays($user['ville_pays'] ?? '');

include 'header.php';
?>

<div class="container">
    <h1>Mon Profil</h1>
    <p><strong>Nom :</strong><?php echo htmlspecialchars($user['nom']) ?></p>
    <p><strong>Prénom :</strong><?php echo htmlspecialchars($user['prenom']) ?></p>
    <p><strong>Pseudo :</strong><?php echo htmlspecialchars($user['pseudo']) ?></p>
    <p><strong>Âge :</strong><?php echo (int) $user['age'] ?> ans</p>
    <p><strong>Ville :</strong><?php echo htmlspecialchars($user['ville_nom'] ?? 'Non renseignée') ?></p>
    <p><strong>Nationalité :</strong><?php echo htmlspecialchars($user($nationalite)) ?></p>
    <!-- Image placeholder -->
    <img src="https://via.placeholder.com/150" alt="Avatar" style="border-radius:50%;">

</div>
<?php include 'footer.php' ?>