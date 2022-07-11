<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Application;
use app\models\UserModel;

class UserController extends Controller
{
    public function home()
    {
//        $result = $this->db->mysql->query("SELECT * FROM users") or die("ERORR: " . mysqli_error());
//        $params = $result->fetch_assoc();

        return $this->router->view("home", "main");
    }

    public function employeesList()
    {
        return $this->router->view("employeesList", "main");
    }

    public function customersList()
    {
        return $this->router->view("customersList", "main");
    }

    //
    public function create()
    {
        return $this->router->viewWithParams("/create", "main", new UserModel());
    }
    public function edit()
    {
        return $this->router->viewWithParams("/edit", "main", null);

    }

    public function createProcess()
    {
//        $full_name = $this->request->getOne("full_name");
//        $username = $this->request->getOne("username");
//        $email = $this->request->getOne("email");
//        $password = $this->request->getOne("password");
//        $address = $this->request->getOne("address");


        $model = new UserModel();

        $model->loadData($this->request->getAll());

        $model->validate();

        $date = date("Y-m-d H:i:s");
        $valid_to = date("Y-m-d H:i:s",strtotime('+ 10 years'));
        $model->password = password_hash($model->password,PASSWORD_DEFAULT);


        if ($model->errors !== null) {
            return $this->router->viewWithParams("/edit", "main", $model);
        }

        $this->db->mysql->query("INSERT INTO users(full_name, username, email, address, password) VALUES('$model->full_name', '$model->username', '$model->email', '$model->address', '$model->password')") or die("ERORR: " . mysqli_error());


        //Dodavanje u role
        $role_result = $this->db->mysql->query("SELECT id FROM roles WHERE name='$model->role'");
        $id_role = $role_result->fetch_assoc()["id"];

        $user_result = $this->db->mysql->query("SELECT id FROM users WHERE email='$model->email'");

        $id_user = $user_result->fetch_assoc()['id'];


        $this->db->mysql->query("INSERT INTO user_roles(id_user, id_role, valid_from, valid_to,data_created,data_updated, user_created, user_updated,active) VALUES($id_user, $id_role, '$date', '$valid_to', '$date','$date',1,1,true)") or die("ERORR: " . mysqli_error());

        Application::$app->session->setFlash("user", "Uspesno kreiran");

        return $this->router->view("/edit", "main");
    }
    public function editProcess()
    {
        $model = new UserModel();

        $model->loadData($this->request->getAll());

//        $model->validate();

//        if ($model->errors !==null){
//            Application::$app->session->setFlash("error","Neuspesno editovan user!");
//            return $this->router->viewWithParams("/edit","main",$model);
//
//        }
        $idToUpdate = $model->id;
        $model->update("id=$idToUpdate");


        return $this->router->viewWithParams("/edit", "main", $model);

    }

    public function deleteProcess()
    {
        $model = new UserModel();

        $model->loadData($this->request->getAll());

        $idToUpdate = $model->id;

        $model->deactivate("id=$idToUpdate");


        $this->request->redirect('/userList');
    }


    // Autorizacija, vraca niz sa mogucim roles-ima
    public function authorize(): array
    {
        return ['admin']; // remove guest
    }
}