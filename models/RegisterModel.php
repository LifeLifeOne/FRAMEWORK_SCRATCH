<?php

namespace App\models;

use App\core\Model;

/**
 * Class RegisterModel
 * @package App\models
 */
class RegisterModel extends Model
{
    public string $email;
    public string $password;
    public string $confirmPassword;

    public function register()
    {
        echo "creating user";
    }

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 3], [self::RULE_MAX, 'max' => 20]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']]
        ];
    }
}
