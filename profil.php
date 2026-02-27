<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

require_once 'classes/Utilisateurs.php';
require_once 'classes/Ville.php';

$userObj = new Utilisateur();
$user = $userObj->getUserWithVille($_SESSION['user_id']);

$villeObj = new Ville();
$villes = $villeObj->getNationaliteByPays($user['ville_pays'] ?? 'Inconnu');

include 'header.php'
    ?>
<main>

</main>
<div class="container">
    <h1>Mon Profil</h1>
    <p><strong>Nom</strong><?php htmlspecialchars($user['nom']) ?></p>
    <p><strong>Prénom</strong><?php htmlspecialchars($user['prenom']) ?></p>
    <p><strong>Pseudo</strong><?php htmlspecialchars($user['pseudo']) ?></p>
    <p><strong>Âge :</strong><?php (int) $user['age'] ?> ans</p>
    <p><strong>Ville :</strong><?php htmlspecialchars($user['ville_nom'] ?? 'Nom renseignée') ?></p>
    <p><strong>Nationalité :</strong><?php htmlspecialchars($user['nationalite']) ?></p>
    <!-- Image placeholder -->
    <img src="https://via.placeholder.com/150" alt="Avatar" style="border-radius:50%;">

</div>