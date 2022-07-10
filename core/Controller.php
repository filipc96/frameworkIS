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
        $user = Application::$app->session->get("logged_in_user");
        $this->checkRoles($roles,$user);


    }

    public function checkRoles($roles, $user){
        $roleAccess = false;
        $guestAccess = false;


        foreach($roles as $role){
            if ($user){
                    $userRole = $user->role;
                    if ($userRole===$role){
                        $roleAccess=true;

                    }

            }


            if($role==="guest"){
                $guestAccess = true;
            }

        }
        if(!$roleAccess and !$guestAccess){
            $this->request->redirect("/accessDenied");
        }
    }

    abstract public function authorize():array;

}