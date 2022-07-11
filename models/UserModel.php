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
        return [];
    }

    public function attributesForUpdate(): array
    {
        return [
            "full_name",
            "username",
            "address",
            "user_updated",
            "active"
        ];
    }

    public function getUserRoleId(){
        $user_result = $this->db->mysql->query("SELECT id FROM users WHERE email='$this->email'");

        $id_user = $user_result->fetch_assoc()['id'];

        $role_id_result = $this->db->mysql->query("SELECT id_role FROM user_roles WHERE id_user='$id_user'");
        $role_id = $role_id_result->fetch_assoc()["id_role"];
        $role_name_result = $this->db->mysql->query("SELECT name FROM roles WHERE id='$role_id'");
        $role_name= $role_name_result->fetch_assoc()['name'];

        return $role_name;

    }

    public function getAllUsersWithRoles(){
        $result = $this->db->mysql->query(
            "SELECT u.id, u.full_name,u.username,u.email,u.address,r.name,u.active from users u

                    INNER JOIN user_roles ur on u.id = ur.id_user
                    INNER JOIN roles r on ur.id_role= r.id;")or die($this->db->mysql->error);

        $users = $result->fetch_all();

        return $users;
    }
}