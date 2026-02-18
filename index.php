<?php
require_once 'classes/Ville.php';
$villeObj = new Ville();
$villes = $villeObj->getAllVillesWithNationalite(); // Nouvelle méthode qui inclut les nationalités
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Projet PHP - Villes du Monde</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Styles spécifiques à l'index */
        .nationalite-badge {
            background: #e3f2fd;
            color: #1976d2;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.9rem;
            display: inline-block;
        }
        
        .capitale-badge {
            background: #4CAF50;
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.9rem;
            display: inline-block;
        }
        
        .video-title {
            text-align: center;
            color: #333;
            margin: 20px 0;
        }
        
        .stats-container {
            display: flex;
            justify-content: space-around;
            margin: 30px 0;
            flex-wrap: wrap;
            gap: 20px;
        }
        
        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            text-align: center;
            flex: 1;
            min-width: 200px;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #4CAF50;
        }
        
        .stat-label {
            color: #666;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <?php session_start(); include 'header.php'; ?>

    <div class="container">
        <h1>🌍 Villes du Monde</h1>
        
        <!-- Statistiques -->
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-number"><?= count($villes) ?></div>
                <div class="stat-label">Villes présentées</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">10</div>
                <div class="stat-label">Pays différents</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">10</div>
                <div class="stat-label">Capitales</div>
            </div>
        </div>

        <!-- Vidéo sur les villes du monde -->
        <h2 class="video-title">🎥 Découvrez les plus belles villes du monde</h2>
        <div class="video-container">
            <iframe 
                width="560" 
                height="315" 
                src="https://www.youtube.com/embed/9V7_lyc_TWY?si=9Xx4D7tK5qK5qK5q" 
                title="Les plus belles villes du monde" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
            </iframe>
        </div>

        <!-- Tableau des villes -->
        <h2>📋 Liste des 10 capitales</h2>
        <div class="table-container">
            <table class="villes-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ville</th>
                        <th>Pays</th>
                        <th>Nationalité</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($villes as $v): ?>
                    <tr>
                        <td>#<?= $v['id'] ?></td>
                        <td><strong><?= htmlspecialchars($v['nom']) ?></strong></td>
                        <td><?= htmlspecialchars($v['pays']) ?></td>
                        <td>
                            <span class="nationalite-badge">
                                <?= htmlspecialchars($v['nationalite']) ?>
                            </span>
                        </td>
                        <td>
                            <?php if ($v['capitale']): ?>
                                <span class="capitale-badge">⭐ Capitale</span>
                            <?php else: ?>
                                <span class="nationalite-badge">🏙️ Ville</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Section appel à l'action -->
        <?php if (!isset($_SESSION['user_id'])): ?>
        <div style="text-align: center; margin: 40px 0; padding: 30px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 15px;">
            <h2 style="color: white;">Rejoignez notre communauté !</h2>
            <p style="color: white; margin: 20px 0;">Inscrivez-vous pour découvrir votre nationalité préférée</p>
            <a href="enregistrer.php" style="display: inline-block; background: white; color: #4CAF50; padding: 15px 30px; text-decoration: none; border-radius: 50px; font-weight: bold; transition: transform 0.3s;">S'inscrire maintenant</a>
        </div>
        <?php endif; ?>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>