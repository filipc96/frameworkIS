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
$app->router->get('createUser',[UserController::class,"create"]);
$app->router->get('registration',[AuthController::class,"registration"]);
$app->router->post('registrationProcess',[AuthController::class,"registrationProcess"]);
$app->router->post('loginProcess',[AuthController::class,"loginProcess"]);
$app->router->get('login',[AuthController::class,"login"]);
$app->router->get('logout',[AuthController::class,"logout"]);


$app->router->post('createUserProcess',[UserController::class,"createProcess"]);
$app->router->get('homeUser',[UserController::class,"home"]);

$app->router->get('userList','userList');

$app->run();

//echo "<pre>";
//var_dump($app->router->request->getPath());
//echo "</pre>";
//
//echo "<pre>";
//var_dump($app->router->request->getMethod());
//echo "</pre>";
