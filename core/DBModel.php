<?php

namespace app\core;


abstract class DBModel extends Model
{
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
    {   //TODO: Get fields bellow from form
        $this->full_name = "";
        $this->username = "";
        $this->address = "";

        $this->data_created = date("Y-m-d H:i:s");
        $this->data_updated = date("Y-m-d H:i:s");
        //TODO: Get field bellow from sessions
        $this->user_created = 1;
        $this->user_updated = 1;

        $this->active = true;


        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $values = array_map(fn($attr) => ":$attr", $attributes);//TODO: POGLEDAJ

        $db = $this->db->mysql;
        //TODO: POGELDAJ implode
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
        $result = $db->query($sqlString);


        return true;
    }

    public function update(){
        //TODO: code here...
    }
}