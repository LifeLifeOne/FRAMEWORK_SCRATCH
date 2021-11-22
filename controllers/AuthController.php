<?php

namespace App\Controllers;

use App\Core\Request;
use App\Core\Controller;
use App\models\RegisterModel;
use App\models\LoginModel;

class AuthController extends Controller
{

    /**
     * @param Request $request
     * @return string|void
     */
    public function login(Request $request)
    {
        $loginModel = new LoginModel();
        if ($request->isPost()) {

            $loginModel->loadData($request->getBody());

            if ($loginModel->validate() && $loginModel->login()) {
                return 'Success';
            }

            echo "<pre>";
            var_dump($loginModel->errors);
            echo "</pre>";
            exit;

            return $this->view('login', [
                'model' => $loginModel
            ]);
        }

        return $this->view('login', [
            'model' => $loginModel
        ]);
    }

    /**
     * @param Request $request
     * @return string|void
     */
    public function register(Request $request)
    {
        $registerModel = new RegisterModel();
        if ($request->isPost()) {

            $registerModel->loadData($request->getBody());

            if ($registerModel->validate() && $registerModel->register()) {
                return 'Success';
            }

            return $this->view("register", [
                "model" => $registerModel
            ]);
        }

        return $this->view('register', [
            'model' => $registerModel
        ]);

    }
}
