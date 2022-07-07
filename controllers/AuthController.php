<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\RegistrationModel;
use app\models\UserModel;

class AuthController extends Controller
{

    public function accessDenied()
    {   http_response_code(403);
        return $this->router->view("accessDenied","error");
    }

    public function notFound(){
        http_response_code(404);
        return $this->router->view("notFound","error");
    }

    public function login(){
        $model = new RegistrationModel();
        $model->loadData($model->getAll());
        return $this->router->view("login","auth");
    }

    public function registration(){

        return $this->router->view("registration","auth");
    }

    public function loginProcess(){
    }

    public function registrationProcess(){

        $model = new RegistrationModel();
        $model->loadData($this->request->getAll());

        $model->validate();

        if ($model->errors !==null){
            Application::$app->session->setFlash("error","Neuspesno kreiran korisnik!");
            return $this->router->viewWithParams("registration","auth",$model);

        }


        $model->createUser($model);
        return $this->router->view("registration","auth");
    }


    public function authorize(): array
    {
        return [
            "Guest"
        ];
    }
}