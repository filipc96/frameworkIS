<?php
namespace app\models;

use app\core\DBModel;

class UserModel extends DBModel
{
    public $full_name;
    public $email;
    public $password;
    public $address;
    public $username;
    public $role;

    public function rules():array{
        return [
            "email"=>[self::RULE_EMAIL,self::RULE_REQUIRED],
            "password"=>[self::RULE_REQUIRED],
            "full_name"=>[self::RULE_REQUIRED],
            "username"=>[self::RULE_REQUIRED]
        ];
    }

    public function tableName()
    {
        return "users";
    }

    public function attributes(): array
    {
        // TODO: Implement attributes() method.
    }



    public function getAllUsersWithRoles(){
        $result = $this->db->mysql->query(
            "SELECT u.id, u.full_name,u.username,u.email,u.address,r.name from users u

                    INNER JOIN user_roles ur on u.id = ur.id_user
                    INNER JOIN roles r on ur.id_role= r.id;")or die($this->db->mysql->error);

        $users = $result->fetch_all();

        return $users;
    }
}