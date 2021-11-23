<?php

namespace App\models;

use App\core\Model;
use App\Core\Connexion;

/**
 * Class RegisterModel
 * @package App\models
 */
class RegisterModel extends Model
{
    public $email;
    public $password;
    public $confirmPassword;
    public $_connexion;

    public function __construct($connexion)
    {
        $this->_connexion = $connexion;
    }

    public function register()
    {
        echo "creating user";
    }

    public function rules()
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 3], [self::RULE_MAX, 'max' => 20]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']]
        ];
    }
}
