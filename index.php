<?php
require_once 'classes/Ville.php';

$villeObj = new Ville();
$villes = $villeObj->getAllVilles();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Projet PHP - Villes du Monde</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background: #f5f5f5;
        }
        h1 { color: #333; text-align: center; }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        th {
            background: #4CAF50;
            color: white;
            padding: 15px;
            text-align: left;
        }
        td { padding: 12px 15px; border-bottom: 1px solid #ddd; }
        tr:hover { background: #f0f0f0; }
        .video-container {
            text-align: center;
            margin: 30px 0;
        }
        .nav { margin: 20px 0; }
        .nav a {
            background: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 10px;
        }
    </style>
</head>
<body>

<h1>🌍 Villes du Monde</h1>

<!-- Navigation -->
<div class="nav">
    <a href="index.php">Accueil</a>
    <a href="enregistrer.php">S'enregistrer</a>
</div>

<!-- Vidéo (remplace l'URL par une vidéo sur les villes) -->
<div class="video-container">
    <iframe
        width="560"
        height="315"
        src="https://www.youtube.com/embed/REMPLACE_PAR_ID_VIDEO"
        title="Villes du monde"
        frameborder="0"
        allowfullscreen>
    </iframe>
</div>

<!-- Tableau des villes -->
<h2>📋 Liste des 10 villes</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Ville</th>
            <th>Pays</th>
            <th>Capitale</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($villes as $v): ?>
        <tr>
            <td><?= $v['id'] ?></td>
            <td><?= htmlspecialchars($v['nom']) ?></td>
            <td><?= htmlspecialchars($v['pays']) ?></td>
            <td><?= $v['capitale'] ? '✅ Oui' : '❌ Non' ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>