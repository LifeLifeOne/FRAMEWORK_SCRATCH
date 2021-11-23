<?php

namespace App\Core;

use App\core\Model;

abstract class DbModel extends Model
{
    abstract public function tableName(): string;

    abstract public function attributes(): array;

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn ($attr) => ":$attr", $attributes);
        $statement = self::prepare("INSERT INTO $tableName (" . implode(',', $attributes) . ")
                                    VALUES (" . implode(',', $params) . ")");

        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        $statement->execute();
        return true;
    }

    public function login($data)
    {
        $tableName = $this->tableName();
        $email = $data['email'];
        $password = $data['password'];
        $statement = self::prepare('SELECT email, password FROM ' . $tableName . ' WHERE email = ? ');
        $statement->execute(array($email));
        $user = $statement->fetch();
        if ($user != false) {
            $mdp = $user['password'];
            if (password_verify($password, $mdp)) {
                return true;
            }
            return false;
        }
        return false;
    }

    public function findAll()
    {
        $tableName = $this->tableName();
        $statement = self::prepare("SELECT * FROM $tableName");
        $statement->execute();
        return true;
    }

    public static function prepare($sql)
    {
        return Application::$app->db->prepare($sql);
    }
}
