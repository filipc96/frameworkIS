<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Application;
use app\models\UserModel;

class UserController extends Controller
{
    //Lista usera
    public function home(){
        $result =$this->db->mysql->query("SELECT * FROM users") or die("ERORR: " . mysqli_error());
        $params = $result->fetch_assoc();

        return $this->router->viewWithParams("homeUser", "main", $params);
    }

    public function userList(){
        return $this->router->view("userList", "main");
    }

    //
    public function create(){
        return $this->router->viewWithParams("/create", "main", new UserModel());
    }

    //
    public function createProcess(){
//        $full_name = $this->request->getOne("full_name");
//        $username = $this->request->getOne("username");
//        $email = $this->request->getOne("email");
//        $password = $this->request->getOne("password");
//        $address = $this->request->getOne("address");

        $model= new UserModel();

        $model->loadData($this->request->getAll());

        $model->validate();
//        echo "<pre>";
//        var_dump($model);
//        echo "</pre>";
//        exit;

        if ($model->errors !==null){
            return $this->router->viewWithParams("create", "main", $model);
        }

        $this->db->mysql->query("INSERT INTO users(full_name, username, email, address, password) VALUES('$model->full_name', '$model->username', '$model->email', '$model->password', '$model->address')") or die("ERORR: " . mysqli_error());
        Application::$app->session->setFlash("user","Uspesno kreiran");

        return $this->router->viewWithParams("create", "main", $model);

    }

    // Autorizacija, vraca niz sa mogucim roles-ima
    public function authorize():array{
        return ['admin', 'Guest']; // remove guest
    }
}