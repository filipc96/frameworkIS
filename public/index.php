<?php
require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\AuthController;
use app\controllers\CategoryController;
use app\controllers\StoreController;
use app\core\application;
use app\controllers\UserController;
use app\controllers\ProductManagmentController;

$app = new Application();


$app->router->get('admin',[UserController::class,"home"]);
$app->router->get('accessDenied',[AuthController::class,"accessDenied"]);
$app->router->get('notFound',[AuthController::class,"notFound"]);
$app->router->get('createUser',[UserController::class,"create"]);
$app->router->get('registration',[AuthController::class,"registration"]);
$app->router->post('registrationProcess',[AuthController::class,"registrationProcess"]);
$app->router->post('loginProcess',[AuthController::class,"loginProcess"]);
$app->router->get('login',[AuthController::class,"login"]);
$app->router->get('logout',[AuthController::class,"logout"]);

$app->router->get('productmanagment/create',[ProductManagmentController::class,"create"]);
$app->router->post('productmanagment/createProductProcess',[ProductManagmentController::class,"createProcess"]);


$app->router->post('createUserProcess',[UserController::class,"createProcess"]);
$app->router->get('homeUser',[UserController::class,"home"]);

$app->router->get('userList/customers',[UserController::class,"customersList"]);
$app->router->get('userList/employees',[UserController::class,'employeesList']);
$app->router->get('userList',[UserController::class,'employeesList']);

$app->router->get('categorymanagment/create',[CategoryController::class,"create"]);
$app->router->post('categorymanagment/createCategoryProcess',[CategoryController::class,"createProcess"]);


$app->router->get('',[StoreController::class,"store"]);
$app->router->get('store',[StoreController::class,"store"]);
$app->router->get('cart',[StoreController::class,"cart"]);


$app->run();


//echo "<pre>";
//var_dump($app->router->request->getPath());
//echo "</pre>";
//
//echo "<pre>";
//var_dump($app->router->request->getMethod());
//echo "</pre>";
