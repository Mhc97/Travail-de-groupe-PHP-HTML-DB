<?php
session_start();
require_once 'classes/Ville.php';
require_once 'classes/Utilisateur.php';

$villeObj = new Ville();
$villes = $villeObj->getAllVilles();

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération avec valeur par défaut et cast pour les entiers
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $pseudo = $_POST['pseudo'] ?? '';
    $age = (int) ($_POST['age'] ?? 0); // cast ajouté 
    $ville_id = (int) ($_POST['ville_id'] ?? 0); // cast ajouté pour mieux encapsuler
    $mdp = $_POST['mot_de_passe'] ?? '';

    if ($nom && $prenom && $pseudo && $age && $ville_id && $mdp) {
        $user = new Utilisateur();
        if ($user->save($nom, $prenom, $pseudo, $age, $ville_id, $mdp)) {
            $message = "Inscription réussie ! <a href='login.php'>Connectez-vous</a>";
        } else {
            $message = "Erreur lors de l'inscription (pseudo peut-être déjà utilisé).";

        }
    } else {
        $message = "tous les champs son requis";
    }
}

include 'header.php';
?>

<div class="container">
    <h1>Inscription</h1>
    <?php if ($message): ?>
        <p><?php echo htmlspecialchars($message) ?></p>
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
            <select name="ville_id" required>
                <option value="">choisissez</option>
                <?php foreach ($villes as $v): ?>
                    <option value="<?php echo $v['id'] ?>">
                        <?php echo htmlspecialchars($v['nom']) ?>(<?= htmlspecialchars($v['pays']) ?>)
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