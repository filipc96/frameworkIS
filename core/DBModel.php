<?php

namespace app\core;


abstract class DBModel extends Model
{
    public $data_created;
    public $data_update;
    public $user_created;
    public $user_updated;
    public $active;


    public abstract function rules() :array;
    public abstract function tableName();
    public abstract function attributes() :array;

    public function create()
    {
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
        var_dump($sqlString);exit();
        $db->query($sqlString) or die();

        return true;
    }

}