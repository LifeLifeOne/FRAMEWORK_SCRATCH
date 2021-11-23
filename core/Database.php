<?php
namespace App\Core;

use PDO;
use PDOException;

class Database extends PDO
{

    CONST DBHOST = 'localhost';
    CONST DBNAME = 'mvc';
    CONST DBUSER = 'root';
    CONST DBPASS = '';

    public function __construct() {

        $dsn = "mysql:dbname=".self::DBNAME.";host=".self::DBHOST;

        try {

            parent::__construct($dsn, self::DBUSER, self::DBPASS);

            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->query("SET NAMES 'utf8'");
            // echo 'Connection établie !';

        } catch(PDOException $e) {

            die("Erreur: ".$e->getMessage());

        }
    }

}