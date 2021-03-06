<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Application;
use App\controllers\SiteController;
use App\controllers\AuthController;

$app = new Application(dirname(__DIR__));

$app->router->get('/', [SiteController::class, 'welcome']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'contact']);

// Auth routes
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->router->get('/member', [AuthController::class, 'member']);
$app->router->post('/member', [AuthController::class, 'member']);

$app->run();
