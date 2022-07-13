<?php
require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\AuthController;
use app\controllers\CategoryController;
use app\controllers\ReportController;
use app\controllers\StoreController;
use app\core\application;
use app\controllers\UserController;
use app\controllers\ProductManagmentController;

$app = new Application();

//Authoratization
$app->router->get('accessDenied',[AuthController::class,"accessDenied"]);
$app->router->get('notFound',[AuthController::class,"notFound"]);
$app->router->get('createUser',[UserController::class,"create"]);
$app->router->get('registration',[AuthController::class,"registration"]);
$app->router->post('registrationProcess',[AuthController::class,"registrationProcess"]);
$app->router->post('loginProcess',[AuthController::class,"loginProcess"]);
$app->router->get('login',[AuthController::class,"login"]);
$app->router->get('logout',[AuthController::class,"logout"]);
//Product managment routing
$app->router->get('productmanagment/create',[ProductManagmentController::class,"create"]);
$app->router->post('productmanagment/createProductProcess',[ProductManagmentController::class,"createProcess"]);
$app->router->get('productmanagment/productList',[ProductManagmentController::class,"home"]);
$app->router->get('productmanagment/edit',[ProductManagmentController::class,"edit"]);
$app->router->post('productmanagment/editProcess',[ProductManagmentController::class,"editProcess"]);
$app->router->post('productmanagment/deleteProcess',[ProductManagmentController::class,"deleteProcess"]);

//User routing
$app->router->get('admin',[UserController::class,"home"]);
$app->router->post('createUserProcess',[UserController::class,"createProcess"]);
$app->router->get('homeUser',[UserController::class,"home"]);
$app->router->get('userList/customers',[UserController::class,"customersList"]);
$app->router->get('userList/employees',[UserController::class,'employeesList']);
$app->router->get('userList',[UserController::class,'employeesList']);
$app->router->get('edit',[UserController::class,'edit']);
$app->router->post('editProcess',[UserController::class,'editProcess']);
$app->router->post('deleteProcess',[UserController::class,'deleteProcess']);


//Category routing
$app->router->get('categorymanagment/create',[CategoryController::class,"create"]);
$app->router->post('categorymanagment/createCategoryProcess',[CategoryController::class,"createProcess"]);

//Store routing
$app->router->get('',[StoreController::class,"store"]);
$app->router->get('store',[StoreController::class,"store"]);
$app->router->get('cart',[StoreController::class,"cart"]);
$app->router->get('addtocart',[StoreController::class,"addToCart"]);

//Report routing
$app->router->get('reports/numberofcustomers',[ReportController::class,"numberOfCustomers"]);
$app->router->get('reports/numberoforders',[ReportController::class,"numberOfOrders"]);
$app->router->get('reports/categoryordercount',[ReportController::class,"categoryOrderCount"]);
$app->router->get('reports/topselling',[ReportController::class,"topSelling"]);
$app->router->get('reports/revenue',[ReportController::class,"revenueReport"]);


//Generator
$app->router->get('generator', 'generator');



$app->run();


//echo "<pre>";
//var_dump($app->router->request->getPath());
//echo "</pre>";
//
//echo "<pre>";
//var_dump($app->router->request->getMethod());
//echo "</pre>";
