<?php

namespace app\core;

abstract class Controller
{
    public Router $router;
    public DBConnection $db;
    public Request $request;

    //Konstruktor
    public function __construct(){

        $this->router = new Router();
        $this->db = new DBConnection();
        $this->request = new Request();

        $roles = $this->authorize();
        $user = Application::$app->session->get("user");
        $this->checkRoles($roles,$user);


    }

    public function checkRoles($roles, $user){
        $roleAccess = false;
        $guestAccess = false;


        foreach($roles as $role){
            if ($user){
                foreach($user->roles as $userRole){

                    if ($userRole===$role){
                        $roleAccess=true;

                    }
                }
            }


            if($role==="Guest"){
                $guestAccess = true;
            }

        }
        if(!$roleAccess and !$guestAccess){
            header("Location: accessDenied");
        }
    }

    abstract public function authorize():array;

}