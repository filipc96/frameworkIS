<?php

namespace app\controllers;

use app\core\Controller;
use app\models\UserModel;

class ProductManagmentController extends Controller
{

    //Lista usera
    public function home()
    {
        var_dump("test");
        exit();
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
        return $this->router->viewWithParams("productmanagment/create", "main", null);

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
        return ['admin', 'Guest']; // remove guest
    }


}