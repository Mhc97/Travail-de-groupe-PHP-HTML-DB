<?php
require_once __DIR__ . '/../config/databases.php';

class Ville
{

    private PDO $pdo;

    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->getConnection();
    }

    public function getAllVilles(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM villes ORDER BY nom");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNationaliteByPays(string $pays): string
    {
        $nationalites = [
            'France' => 'Française',
            'Belgique' => 'Belge',
            'Royaume-Uni' => 'Britannique',
            'Allemagne' => 'Allemande',
            'Espagne' => 'Espagnole',
            'Italie' => 'Italienne',
            'Maroc' => 'Marocaine',
            'Japon' => 'Japonaise',
            'Pays-Bas' => 'Néerlandaise',
            'Portugal' => 'Portugaise',
        ];

        return $nationalites[$pays] ?? $pays;
    }

    public function getAllVillesWithNationalite(): array
    {
        $villes = $this->getAllVilles();

        foreach ($villes as &$ville) {
            $ville['nationalite'] = $this->getNationaliteByPays($ville['pays']);
        }

        return $villes;
    }
}
?>