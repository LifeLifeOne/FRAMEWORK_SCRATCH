<?php

namespace App\Controllers;

use App\Core\Request;
use App\Core\Controller;
use App\models\RegisterModel;
use App\models\LoginModel;

class AuthController extends Controller
{
    /**
     * @return string|void
     */
    public function login(): string
    {
        return $this->view('login');
    }

    /**
     * @param Request $request
     * @return string|void
     */
    public function handleLogin(Request $request)
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
    public function register(Request $request): string
    {
        return $this->view('register');
    }

    /**
     * Handle submitted contact form
     */
    public function handleRegister(Request $request)
    {
        $registerModel = new RegisterModel();
        if ($request->isPost()) {

            $registerModel->loadData($request->getBody());

            if ($registerModel->validate() && $registerModel->register()) {
                return 'Success';
            }
            

            return $this->view('register', [
                'model' => $registerModel
            ]);
        }

        return $this->view('register', [
            'model' => $registerModel
        ]);

    }
}
