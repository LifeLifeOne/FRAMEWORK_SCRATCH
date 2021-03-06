<?php

namespace App\models;

use App\core\Request;
use App\core\Controller;
use App\core\Application;
use App\core\Model;


/**
 * Class LoginModel
 * @package App\models
 */
class LoginModel extends Model
{
    public string $email = "";
    public string $password = "";

    public function login()
    {
        echo '
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
              <strong>Logged successfully !</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';

    }

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 20]]
        ];
    }
}
