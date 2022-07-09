<?php

namespace app\models;

use app\core\DBModel;

class LoggedInUserModel extends DBModel
{
    public $id;
    public $full_name;
    public $address;
    public  array $roles=[];


    public function getUser($email){
        $result = $this->db->mysql->query(
            "SELECT u.id, u.full_name,u.email,u.address,r.name from users u

                    INNER JOIN user_roles ur on u.id = ur.id_user
                    INNER JOIN roles r on ur.id_role= r.id
                    WHERE u.email='$email';"
        )or die($this->db->mysql->error);

        while ($row=$result->fetch_assoc()){
            if($email!==null){
                $this->loadData($row);
            }
            array_push($this->roles, $row["name"]);
        }

        return $this;
    }

    public function rules(): array
    {
        return [];
    }

    public function tableName()
    {
        // TODO: Implement tableName() method.
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