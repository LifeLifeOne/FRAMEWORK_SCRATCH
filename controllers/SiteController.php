<?php

namespace App\Controllers;

use App\Core\Request;
use App\Core\Controller;
use App\Core\Application;
use App\Models\ContactModel;

class SiteController extends Controller
{

    /**
     * @return string
     */
    public function welcome(): string
    {
        $params = [
            "firstName" => "TEST"
        ];

        return $this->view('welcome', $params);
    }

    /**
     * @param Request $request
     * @return string|void
     */
    public function contact(Request $request)
    {
        $contactModel = new ContactModel();
        if ($request->isPost()) {

            $contactModel->loadData($request->getBody());

            if ($contactModel->validate() && $contactModel->contact()) {
                return 'success';
            }

            return $this->view('contact', [
                'model' => $contactModel
            ]);
        }

        return $this->view('contact', [
            'model' => $contactModel
        ]);
    }

    /**
     * @param Request $request
     */
    public function handleContact(Request $request)
    {
        $body = $request->getBody();
        echo '<pre>';
        print_r($body);
        echo '</pre>';
    }
}
