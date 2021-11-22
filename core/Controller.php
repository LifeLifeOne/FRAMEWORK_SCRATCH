<?php

namespace App\Core;

use App\Core\Application;

class Controller
{
    /**
     * Return the view in parameter with params
     * @param $view
     * @param array $params
     * @return array|string|string[]
     */
    public function view(string $view, array $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }
}
