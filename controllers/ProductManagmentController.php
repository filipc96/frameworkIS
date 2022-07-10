<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\AuthModel;
use app\models\ProductManagmentModel;
use app\models\UserModel;

class ProductManagmentController extends Controller
{

    //Lista usera
    public function home()
    {
        return $this->router->viewWithParams("productmanagment/home", "main", null);
    }


    //
    public function create()
    {

        return $this->router->view("productmanagment/create", "main");
    }

    public function edit()
    {
        return $this->router->viewWithParams("productmanagment/edit", "main", new UserModel());
    }

    public function delete()
    {
        return $this->router->viewWithParams("productmanagment/delete", "main", new UserModel());
    }

    //
    public function createProcess()
    {
        $model = new ProductManagmentModel();
        $model->loadData($this->request->getAll());

        $model->validate();

        if ($model->errors !==null){
            Application::$app->session->setFlash("error","Neuspesno kreiran produkt!");
            return $this->router->viewWithParams("productmanagment/create","main",$model);

        }
        if($model->createProduct($model)){
            Application::$app->session->setFlash("error","Uspesno kreiran produkt!");
        }
        return $this->router->viewWithParams("productmanagment/create","main",null);

    }

    public function editProcess()
    {
        return $this->router->viewWithParams("productmanagment/edit", "main", null);

    }

    public function deleteProcess()
    {
        return $this->router->viewWithParams("productmanagment/delete", "main", null);

    }

    // Autorizacija, vraca niz sa mogucim roles-ima
    public function authorize(): array
    {
        return ['admin', 'guest']; // remove guest
    }


}