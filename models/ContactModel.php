<?php

namespace App\models;

use App\Core\Request;
use App\Core\Controller;
use App\Core\Application;
use App\core\Model;

/**
 * @params
 */
class ContactModel extends Model
{
    public string $subject = "";
    public string $email = "";
    public string $message = "";


    public function contact()
    {
        echo '
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
              <strong>Message send successfully !</strong>
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
            'subject' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'message' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 10], [self::RULE_MAX, 'max' => 1000]]
        ];
    }
}