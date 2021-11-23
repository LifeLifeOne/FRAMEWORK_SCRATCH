<?php

namespace App\Core;

use PDO;
use PDOException;

class Connexion extends PDO
{

    const HOST = 'localhost';
    const NAME = 'sfdrup03';
    const USER = 'root';
    const PASS = '';

    public function __construct()
    {

        $dsn = "mysql:dbname=" . self::NAME . ";host=" . self::HOST;

        try {

            parent::__construct($dsn, self::USER, self::PASS);

            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->query("SET NAMES 'utf8'");
            // echo 'Connection établie !';

        } catch (PDOException $e) {

            die("Erreur: " . $e->getMessage());
        }
    }
}
