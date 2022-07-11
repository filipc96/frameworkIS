<?php

namespace app\core;


abstract class DBModel extends Model
{

    public $id;
    public $data_created;
    public $data_updated;
    public $user_created;
    public $user_updated;
    public $active;

    public $full_name;
    public $username;
    public $address;


    public abstract function rules() :array;
    public abstract function tableName();
    public abstract function attributes() :array;

    public function create()
    {
        if(Application::$app->session->getFlash("logged_in_user")){
            return false;
        }


        $this->data_created = date("Y-m-d H:i:s");
        $this->data_updated = date("Y-m-d H:i:s");
//      $this->user_created = Application::$app->session->getFlash("logged_in_user")["id"];
//      $this->user_updated = Application::$app->session->getFlash("logged_in_user")["id"];

        $this->user_created = 1;
        $this->user_updated = 1;

        $this->active = true;


        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $values = array_map(fn($attr) => ":$attr", $attributes);

        $db = $this->db->mysql;
        $sqlString = "INSERT INTO $tableName (" . implode(',', $attributes) . ") VALUES (" . implode(',', $values) . ")";

        foreach ($attributes as $attribute) {
            $attributeValue = (is_numeric($this->{$attribute}) or is_bool($this->{$attribute})) ? $this->{$attribute} : '"' . $this->{$attribute} . '"';
            $sqlString = str_replace(":$attribute", $attributeValue , $sqlString);
        }
        $db->query($sqlString) or die();

        return true;
    }

    public function getAll(){
        $table_name = $this->tableName();
        $sqlString = "SELECT * FROM $table_name";

        $db = $this->db->mysql;
        $result = $db->query($sqlString);
        $resultArr = [];

        while($results = $result->fetch_assoc()){
            array_push($resultArr, $results);
        }

        return $resultArr;

    }

    public function getAllWithStatment($where){
        $table_name = $this->tableName();
        $sqlString = "SELECT * FROM $table_name WHERE $where";

        $db = $this->db->mysql;
        $result = $db->query($sqlString);
        $resultArr = [];

        while($results = $result->fetch_assoc()){
            array_push($resultArr, $results);
        }

        return $resultArr;

    }

    public function getOne($where){
        $table_name = $this->tableName();
        $sqlString = "SELECT * FROM $table_name WHERE $where";

        $db = $this->db->mysql;
        $result = $db->query($sqlString);

        return $result->fetch_assoc();

    }

    public function delete($where){
        $table_name = $this->tableName();
        $sqlString = "DELETE FROM $table_name WHERE $where";

        $db = $this->db->mysql;
        $result = $db->query($sqlString) or die();


        return true;
    }

    public function deactivate($where){
        $table_name = $this->tableName();
        $sqlString = "UPDATE $table_name SET active=0 WHERE $where;";

        $db = $this->db->mysql;
        $result = $db->query($sqlString) or die();

        return true;
    }

    public function update($where){
        if(Application::$app->session->getFlash("logged_in_user")){
            return false;
        }


        $this->data_updated = date("Y-m-d H:i:s");
//        $this->user_updated = Application::$app->session->getFlash("logged_in_user");
        $this->user_updated = 1;
        $this->active= true;


        $tableName = $this->tableName();
        $attributes = $this->attributesForUpdate();
        $values = array_map(fn($attr) => ":$attr", $attributes);

        $db = $this->db->mysql;
        //TODO: POGELDAJ implode
        $sqlString = "UPDATE $tableName SET " ;

        foreach ($attributes as $attribute) {
            $sqlString .= $attribute;
            $sqlString.= '=';
            $sqlString .= (is_numeric($this->{$attribute}) or is_bool($this->{$attribute})) ? $this->{$attribute} .  ',' : '"' . $this->{$attribute} . '"' . ",";

        }
        $sqlString = substr_replace($sqlString, " ", -1);
        $sqlString = $sqlString . ' WHERE ' . $where . ";";


        $db->query($sqlString) or die();

        return true;
    }
}