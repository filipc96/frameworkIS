<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\AuthModel;
use app\models\ProductManagmentModel;
use app\models\UserModel;

class ProductManagmentController extends Controller
{

    public function home()
    {
        return $this->router->view("productmanagment/productList", "main");
    }


    //
    public function create()
    {

        return $this->router->view("productmanagment/create", "main");
    }

    public function edit()
    {

        return $this->router->viewWithParams("productmanagment/edit", "main", null);
    }

    public function delete()
    {
        return $this->router->viewWithParams("productmanagment/delete", "main", new ProductManagmentModel());
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
            Application::$app->session->setFlash("success","Uspesno kreiran produkt!");
        }
        return $this->router->viewWithParams("productmanagment/create","main",null);

    }

    public function editProcess()
    {   $model = new ProductManagmentModel();

        $model->loadData($this->request->getAll());
        $model->validate();
        var_dump($model->id);

        if ($model->errors !==null){
            Application::$app->session->setFlash("error","Neuspesno editovan user!");
            return $this->router->viewWithParams("productmanagment/edit","main",$model);

        }

        if($model->editProduct($model)){
            Application::$app->session->setFlash("success","Uspesno editovan produkt!");
        }


        return $this->router->viewWithParams("productmanagment/edit", "main", null);

    }

    public function deleteProcess()
    {
        $model = new ProductManagmentModel();
        $model->loadData($this->request->getAll());
        $model->deactivateProduct($model);

        $this->request->redirect('/productmanagment/productList');

    }

    // Autorizacija, vraca niz sa mogucim roles-ima
    public function authorize(): array
    {
        return ['admin', 'editor']; // remove guest
    }


}