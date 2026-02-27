<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

require_once 'classes/Utilisateurs.php';
require_once './classes/Ville.php';

$userObj = new Utilisateur();
$user = $userObj->getUserWithVille($_SESSION['user_id']);

$villeObj = new Ville();
$villes = $villeObj->getNationaliteByPays($user['ville_pays'] ?? 'Inconnu');

include 'header.php'
    ?>

<div class="contanier">
    <h1>Mon Profil</h1>
    <p><strong>Nom</strong><?= htmlspecialchars($user['nom']) ?></p>
    <p><strong>Prénom</strong><?= htmlspecialchars($user['prenom']) ?></p>
    <p><strong>Pseudo</strong><?= htmlspecialchars($user['pseudo']) ?></p>
    <p><strong>Âge :</strong><?= (int) $user['age'] ?> ans</p>
    <p><strong>Ville :</strong><?= htmlspecialchars($user['ville_nom'] ?? 'Nom renseignée') ?></p>
    <p><strong>Nationalié :</strong><?= htmlspecialchars($user['nationalite']) ?></p>
    <!-- Image placeholder -->
    <img src="https://via.placeholder.com/150" alt="Avatar" style="border-radius:50%;">

</div>