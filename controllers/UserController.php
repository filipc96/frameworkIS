<?php
namespace app\controllers;

use app\core\Router;
use app\core\DBConnection;
use app\core\Request;
use app\models\UserModel;

class UserController
{
    public Router $router;
    public DBConnection $db;
    public Request $request;

    //Konstruktor
    public function __construct(){
        $this->router = new Router();
        $this->db = new DBConnection();
        $this->request = new Request();
    }

    //Lista usera
    public function home(){
        $result =$this->db->mysql->query("SELECT * FROM users") or die("ERORR: " . mysqli_error());
        $params = $result->fetch_assoc();

        return $this->router->viewWithParams("homeUser", "main", $params);
    }

    //
    public function create(){
        return $this->router->view("create", "main");
    }

    //
    public function createProcess(){
        $full_name = $this->request->getOne("full_name");
        $username = $this->request->getOne("username");
        $email = $this->request->getOne("email");
        $password = $this->request->getOne("password");
        $address = $this->request->getOne("address");

//        $model= new UserModel();
//        $model->loadData($this->request->getAll());
//
//        echo "<pre>";
//        var_dump($model);
//        echo "</pre>";
//        exit;

        $this->db->mysql->query("INSERT INTO users(full_name, username, email, address, password) VALUES('$full_name', '$username', '$email', '$password', '$address')") or die("ERORR: " . mysqli_error());
        return $this->router->view("create", "main");
    }
}