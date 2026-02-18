<?php
require_once 'config/database.php';

class Ville
{
    private ?int $id = null;
    private ?string $nom = null;
    private ?string $pays = null;
    private ?bool $capitale = null;
    private PDO $pdo;

    public function __construct(?int $id = null, ?string $nom = null, ?string $pays = null, ?bool $capitale = false)
    {
        if ($id !== null) {
            $this->id = $id;
            $this->nom = $nom;
            $this->pays = $pays;
            $this->capitale = $capitale;
        }

        $db = new Database();
        $this->pdo = $db->getConnection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function isCapitale(): ?bool
    {
        return $this->capitale;
    }

    public function getAllVilles(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM villes ORDER BY nom");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getVilleById(int $id): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM villes WHERE id = ?");
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
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

    // Nouvelle méthode pour récupérer toutes les villes avec leur nationalité
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