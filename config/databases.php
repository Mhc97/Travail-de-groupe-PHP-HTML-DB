<?php
class Database {
    private string $host = 'localhost';
    private string $dbname = 'projet_php';
    private string $username = 'root';
    private string $password = '';
    private ?PDO $pdo = null;

    public function __construct() {
        // Constructeur vide
    }

    public function getConnection(): PDO {
        if ($this->pdo === null) {
            try {
                // Correction de la syntaxe PDO
                $this->pdo = new PDO(
                    "mysql:host={$this->host};dbname={$this->dbname};charset=utf8",
                    $this->username,
                    $this->password
                );
                
                // Configuration des attributs PDO
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            } catch (PDOException $e) {
                // Message d'erreur plus détaillé pour le débogage
                die("Erreur de connexion à la base de données : " . $e->getMessage());
            }
        }
        return $this->pdo;
    }

}
?>