<?php

namespace App\models;

use App\core\Model;

/**
 * Class RegisterModel
 * @package App\models
 */
class LoginModel extends Model
{
    public string $email;
    public string $password;

    /**
     * @return string
     */
    public function login(): string
    {
        echo "Login Success";
    }

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 3], [self::RULE_MAX, 'max' => 20]]
        ];
    }
}