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
    public function welcome()
    {
        return $this->view('welcome', [
            "firstName" => "test"
        ]);
    }

    /**
     * @return string
     */
    public function contact()
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
