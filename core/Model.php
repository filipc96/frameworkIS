<?php

namespace app\core;

abstract class Model
{
    public $errors;
    public DBConnection $db;

    public const RULE_EMAIL = 'email';
    public const RULE_REQUIRED = 'required';

    public abstract function rules() :array;

    public function __construct()
        {
            $this->db = new DBConnection();
        }

    public function loadData($data){
        if($data !==null){
            foreach($data as $key=>$value){
                if(property_exists($this,$key)){
                    $this->{$key} =$value; //POGLEDATI
                }
            }
        }
    }

    public function validate(){


    }
}