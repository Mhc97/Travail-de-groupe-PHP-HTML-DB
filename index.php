<?php

require_once 'classes/Ville.php';

$villeObj = new Ville();
$villes = $villeObj->getAllVillesWithNationalite();
?>

<?php include 'header.php' ?>

<div class="container">
    <h1>🌍 Villes du Monde</h1>

    <!-- Vidéo -->
    <div class="video-container">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/9V7_lyc_TWY?si=9Xx4D7tK5qK5qK5q"
            title="Les plus belles villes du monde" frameborder="0" allowfullscreen>
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
                <?php if (!empty($villes)): ?>
                    <?php foreach ($villes as $v): ?>
                        <tr>
                            <td>#<?php echo $v['id'] ?></td>
                            <td><strong><?php echo htmlspecialchars($v['nom']) ?></strong></td>
                            <td><?php echo htmlspecialchars($v['pays']) ?></td>
                            <td>
                                <span class="nationalite-badge">
                                    <?php echo htmlspecialchars($v['nationalite']) ?>
                                </span>
                            </td>
                            <td>
                                <?php if ($v['capitale']): ?>
                                    <span class="capitale-badge">⭐ Capitale</span>
                                <?php else: ?>
                                    <span>🏙️ Ville</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Aucune ville trouvée.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include 'footer.php'; ?>