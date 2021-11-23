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

    public function tableName(): string
    {
        return 'users';
    }

    public function save()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function login($data)
    {
        return parent::login($data);
    }
    /**
     * @return array[]
     */
    public function rules($data): array
    {
        $attributes = [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 20]],
        ];
        if (array_key_exists('confirmPassword', $data)) {
            $confirmPW = ['confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']]];
            $attributes = array_merge($attributes, $confirmPW);
        }
        return $attributes;
    }

    public function attributes(): array
    {
        return ['email', 'password'];
    }
}
