<?php

use App\Core\Connexion;
use App\models\LoginModel;

class ApiService extends Connexion
{

    private $db;

    public function __construct()
    {
        $this->db = new Connexion();
    }

    public function createUser(LoginModel $user)
    {
        var_dump($user);
    }
}
