<?php
namespace app\controllers;

use app\core\Router;
use app\core\DBConnection;
use app\core\Request;
use app\core\Application;
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
        return $this->router->viewWithParams("create", "main", new UserModel());
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
}