<?php

namespace App\Controllers;

use App\Core\Request;
use App\Core\Controller;
use App\Core\Application;

class SiteController extends Controller
{
    /**
     * show welcome page
     * @return view
     */
    public function welcome()
    {
        $params = [
            'username' => "houcem",
            'email' => "hedhoucem@gmail.com",
            'skills' => ['PHP', 'Symfony', 'JavaScript', 'HTML', 'CSS']
        ];
        return $this->view('welcome', $params);
    }
    /**
     * show contact form
     * @return view
     */
    public function contact()
    {
        return $this->view('contact');
    }

    /**
     * Handle submitted contact form
     */
    public function handleContact(Request $request)
    {
        $body = $request->getBody();
        echo '<pre>';
        print_r($body);
        echo '</pre>';
    }
}
