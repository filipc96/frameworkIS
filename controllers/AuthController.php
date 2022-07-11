<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\AuthModel;
use app\models\LoggedInUserModel;
use app\models\UserModel;

class AuthController extends Controller
{

    public function accessDenied()
    {   http_response_code(403);
        return $this->router->view("/accessDenied","error");
    }

    public function notFound(){
        http_response_code(404);
        return $this->router->view("/notFound","error");
    }

    public function login(){
        $model = new AuthModel();
        $model->loadData($model->getAll());
        return $this->router->view("/login","auth");
    }

    public function logout(){
        if(Application::$app->session->get("logged_in_user")){
            Application::$app->session->remove("logged_in_user");
        }
        $this->request->redirect("/login");
    }

    public function registration(){

        return $this->router->view("/registration","auth");
    }

    public function loginProcess(){
        $model = new AuthModel();
        $model->loadData($this->request->getAll());

        $model->validate();

        if ($model->errors !==null){
            Application::$app->session->setFlash("error","Neuspesno ulogovan korisnik!");
            return $this->router->viewWithParams("/login","auth",$model);
        }

        if(!$model->login($model)){
            Application::$app->session->setFlash("error","Neuspesno ulogovan korisnik!");
            return $this->router->viewWithParams("/login","auth",$model);
        }
        $loggedInUserModel = new LoggedInUserModel();
        Application::$app->session->set("logged_in_user", $loggedInUserModel->getUser($model->email));

        $this->request->redirect("/home");

    }

    public function registrationProcess(){

        $model = new AuthModel();
        $model->loadData($this->request->getAll());

        $model->validate();

        if ($model->errors !==null){
            Application::$app->session->setFlash("error","Neuspesno kreiran korisnik!");
            return $this->router->viewWithParams("/registration","auth",$model);

        }


        $model->createUser($model);

        return $this->router->view("/registration","auth");
    }


    public function authorize(): array
    {
        return [
            "guest",
        ];
    }
}