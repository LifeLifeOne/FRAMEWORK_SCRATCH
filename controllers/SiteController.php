<?php

namespace App\Controllers;

use App\Core\Request;
use App\Core\Controller;
use App\Core\Application;

class SiteController extends Controller
{

    /**
     * @return string
     */
    public function welcome(): string
    {
        $params = [
            "firstName" => "test 2"
        ];

        return $this->view('welcome', $params);
    }

    /**
     * @return string
     */
    public function contact(): string
    {
        return $this->view('contact');
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
