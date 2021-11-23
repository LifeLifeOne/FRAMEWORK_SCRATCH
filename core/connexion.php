<?php

namespace App\Core;

use PDOException;

class Connexion
{

    public \PDO $pdo;

    const HOST = 'localhost';
    const NAME = 'sfdrup03';
    const USER = 'root';
    const PASS = '';

    public function __construct()
    {
        $dsn = "mysql:dbname=" . self::NAME . ";host=" . self::HOST;
        try {

            $this->pdo = new \PDO($dsn, self::USER, self::PASS);
            $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->pdo->query("SET NAMES 'utf8'");
            // echo 'Connection établie !';

        } catch (PDOException $e) {

            die("Erreur: " . $e->getMessage());
        }
    }

    public function prepare($sql): \PDOStatement
    {
        return $this->pdo->prepare($sql);
    }
}
