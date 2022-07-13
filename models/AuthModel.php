<?php

namespace app\models;

use app\core\DBModel;

class AuthModel extends DBModel
{

    public $email;
    public $password;

    //self::RULE_EMAIL_UNIQUE

    public function rules():array{
        return [
            "email"=>[self::RULE_EMAIL,self::RULE_REQUIRED ],
            "password"=>[self::RULE_REQUIRED]
        ];
    }


    public function createUser(AuthModel $model){

        $date = date("Y-m-d H:i:s");
        $valid_to = date("Y-m-d H:i:s",strtotime('+ 10 years'));
        $model->password = password_hash($model->password,PASSWORD_DEFAULT);

        $created_user = $model->create();
        //Dodavanje u role
        $role_result = $this->db->mysql->query("SELECT id FROM roles WHERE name='user'");
        $id_role = $role_result->fetch_assoc()["id"];

        $user_result = $this->db->mysql->query("SELECT id FROM users WHERE email='$model->email'");

        $id_user = $user_result->fetch_assoc()['id'];

        $this->db->mysql->query("INSERT INTO user_roles(id_user, id_role, valid_from, valid_to,data_created,data_updated, user_created, user_updated,active) VALUES($id_user, $id_role, '$date', '$valid_to', '$date','$date',1,1,true)") or die("ERORR: " . mysqli_error());

    }

    public function login(AuthModel $model){
        $modelFromDB = new AuthModel();
        $modelFromDB->loadData($modelFromDB->getOne("email = '$model->email'"));

        if ($modelFromDB->email !== null){
            if (password_verify($model->password,$modelFromDB->password)){
                return true;
            }
    }

    }

    public function tableName()
    {
        return "users";
    }


    public function attributes(): array
    {
        return [
          "email",
          "password",
            "full_name",
            "username",
            "address",
            "data_created",
            "data_updated",
            "user_created",
            "user_updated",
            "active"
        ];
    }

    public function attributesForUpdate(): array
    {
        return [
            "password",
            "full_name",
            "username",
            "address",
            "data_updated",
            "user_updated",
            "active"
        ];
    }
}