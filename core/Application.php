<?php

namespace App\Core;

use App\Core\Router;
use App\Core\Response;
use App\Core\Connexion;

class Application extends Connexion
{
    public static Application $app;
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public Connexion $db;

    /**
     * @param string $rootPath
     */
    public function __construct(string $rootPath)
    {
        self::$app = $this;
        self::$ROOT_DIR = $rootPath;
        $this->db = new Connexion();
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    /**
     * @return void
     */
    public function run()
    {
        echo $this->router->resolve();
    }
}
