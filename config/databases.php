<?php
declare(strict_types=1);

class Database {
    private string $host = 'localhost';
    private string $dbname = 'projet_php';
    private string $username = 'root';
    private string $password = '';
    private ?PDO $pdo = null;

    public function getConnection(): PDO {
        if ($this->pdo === null) {
            try {
                // Utilisation de votre ligne de connexion spécifique
                $this->pdo = new PDO('mysql:dbname=projet_php;host=localhost', "root", "");
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur connexion : " . $e->getMessage());
            }
        }
        return $this->pdo;
    }
}
?>