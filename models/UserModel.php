<?php

namespace App\models;

use App\Core\DbModel;

/**
 * Class RegisterModel
 * @package App\models
 */
class UserModel extends DbModel
{

    public string $email = '';
    public string $password = '';
    public string $confirmPassword = '';

    public function tablename(): string
    {
        return 'users';
    }

    public function save()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 20]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }

    public function attributes(): array
    {
        return ['email', 'password'];
    }
}
