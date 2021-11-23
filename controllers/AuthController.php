<?php

namespace App\Controllers;

use App\Core\Request;
use App\Core\Controller;
use App\models\UserModel;
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
                return 'success';
            }

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
        $user = new UserModel();
        if ($request->isPost()) {

            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                return header('location: /login');
            }
        }
        return $this->view("register", [
            "model" => $user
        ]);
    }

    /**
     * @param Request $request
     * @return array|string|string[]
     */
    public function member(Request $request)
    {
        return $this->view('loginView');
    }
}
