<?php
require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\AuthController;
use app\core\application;
use app\controllers\UserController;

$app = new Application();


$app->router->get('home','home');
$app->router->get('index','home');
$app->router->get('','home');
$app->router->get('accessDenied',[AuthController::class,"accessDenied"]);
$app->router->get('notFound',[AuthController::class,"notFound"]);
$app->router->get('createUser',[UserController::class,"create"]);//POGLEDATI
$app->router->post('createUserProcess',[UserController::class,"createProcess"]);
$app->router->get('homeUser',[UserController::class,"home"]);

$app->run();

//echo "<pre>";
//var_dump($app->router->request->getPath());
//echo "</pre>";
//
//echo "<pre>";
//var_dump($app->router->request->getMethod());
//echo "</pre>";
