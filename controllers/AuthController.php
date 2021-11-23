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
        $user = new UserModel();
        if ($request->isPost()) {

            $data = $user->loadData($request->getBody());
            if ($user->validate($data) && $user->login($data)) {
                return header('location: /member');
            }
        }
        return $this->view('login', [
            'model' => $user
        ]);

        //TODO => message d'erreur en cas de mauvaise saisie <3 vivien
    }

    /**
     * @param Request $request
     * @return string|void
     */
    public function register(Request $request)
    {
        $user = new UserModel();
        if ($request->isPost()) {

            $data = $user->loadData($request->getBody());

            if ($user->validate($data) && $user->save()) {
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
