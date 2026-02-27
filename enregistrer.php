<?php
session_start();
require_once 'classes/Ville.php';
require_once 'classes/Utilisateurs.php';

$villeObj = new Ville();
$villes = $villeObj->getAllVilles();

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $pseudo = $_POST['pseudo'] ?? '';
    $age = $_POST['age'] ?? '';
    $ville_id = $_POST['ville_id'] ?? '';
    $mdp = $_POST['mot_de_passe'] ?? '';

    if ($nom && $prenom && $pseudo && $age && $ville_id && $mdp) {
        $user = new Utilisateur();
        if ($user->save($nom, $prenom, $pseudo, $age, $ville_id, $mdp)) {
        }
        $message = "Erreur lors de l'inscription (pseudo peut-être déjà utilisé).";
    } else {
        $message = "Tous les champs sont requis.";
    }
}

include 'header.php';
?>
<div class="container">
    <h1>Inscription</h1>
    <?php if ($message): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>
    <form method="post">
        <div>
            <label>Nom :</label>
            <input type="text" name="nom" required>
        </div>
        <div>
            <label>Prénom :</label>
            <input type="text" name="prenom" required>
        </div>
        <div>
            <label>Pseudo :</label>
            <input type="text" name="pseudo" required>
        </div>
        <div>
            <label>Âge :</label>
            <input type="text" name="age" required>
        </div>
        <div>
            <label>Ville :</label>
            <input type="text" name="ville_id" required>
            <select name="ville_id" required>
                <option value="">choisissez</option>
                <?php foreach ($villes as $v): ?>
                    <option value="<?= $v['id'] ?>"><?= htmlspecialchars($v['nom']) ?>(<?= htmlspecialchars($v['pays']) ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label>Mots de passe :</label>
            <input type="password" name="mot_de_passe" required>
        </div>
        <button type="submit">S'inscrire</button>
    </form>
</div>
<?php include 'footer.php'; ?>