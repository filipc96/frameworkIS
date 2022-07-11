<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\CategoryModel;
use app\models\ProductManagmentModel;
use app\models\UserModel;

class CategoryController extends  Controller
{
    public function home()
    {
        return $this->router->viewWithParams("categorymanagment/home", "main", null);
    }


    //
    public function create()
    {

        return $this->router->view("categorymanagment/create", "main");
    }

    public function edit()
    {
        return $this->router->viewWithParams("categorymanagment/edit", "main", new UserModel());
    }

    public function delete()
    {
        return $this->router->viewWithParams("categorymanagment/delete", "main", new UserModel());
    }

    //
    public function createProcess()
    {
        $model = new CategoryModel();
        $model->loadData($this->request->getAll());

        $model->validate();

        if ($model->errors !==null){
            Application::$app->session->setFlash("error","Neuspesno kreirana kategorija!");
            return $this->router->viewWithParams("categorymanagmentt/create","main",$model);

        }
        if($model->createCategory($model)){
            Application::$app->session->setFlash("error","Uspesno kreirana kategorija!");
        }
        return $this->router->viewWithParams("categorymanagment/create","main",$model);

    }

    public function editProcess()
    {
        return $this->router->viewWithParams("categorymanagment/edit", "main", null);

    }

    public function deleteProcess()
    {
        return $this->router->viewWithParams("categorymanagmentt/delete", "main", null);

    }

    // Autorizacija, vraca niz sa mogucim roles-ima
    public function authorize(): array
    {
        return ['admin', 'editor']; // remove guest
    }


}