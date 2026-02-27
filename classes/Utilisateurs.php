<?php
require_once '../config/database.php';

class Utilisateur
{
    private PDO $pdo;

    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->getConnection();
    }

    public function save(string $nom, $prenom, string $pseudo, int $age, int $ville_id, string $mdpClair): bool
    {
        $sql = "INSERT INTO utilisateurs (nom, prenom, pseudo, mot_de_passe, age, ville_id)
            VALUES (:nom, :prenom, :mdp, :age, :ville_id)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':pseudo' => $pseudo,
            ':mdp' => $mdpClair, // mot de passe
            ':age' => $age,
            ':ville_id' => $ville_id
        ]);
    }

    public function findByPseudo(string $pseudo): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM WHERE pseudo = :pseudo");
        $stmt->execute([':pseudo' => $pseudo]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user ?: null;



    }

    public function getUserWithVille(int $userId): ?array
    {
        $stmt = $this->pdo->prepare("
                SELECT u.*, v.nom as ville_nom, v.pays as ville_pays
                FROM utilisateurs u
                LEFT JOIN villes v ON u.ville_id = v.id
                WHERE u.id = :id
            ");
        $stmt->execute([':id' => $userId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user ?: null;
    }
}
?>