<?php

namespace app\core;

abstract class Model
{
    public $errors;
    public DBConnection $db;

    public const RULE_EMAIL = 'email';
    public const RULE_EMAIL_UNIQUE = 'email_unique';
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
                    $this->{$key} =$value; //TODO: POGLEDATI
                }
            }
        }
    }

    public function validate(){
        foreach ($this->rules() as $attribute=>$rules){
            $attributeValue = $this->{$attribute};
            foreach ($rules as $rule){
                //Password Required
                if($rule === self::RULE_REQUIRED && !$attributeValue ){
                    $this->errors[$attribute][] = "Polje $attribute je obavezno";
                }
                // EMAIL validation
                if($rule === self::RULE_EMAIL && !filter_var($attributeValue, FILTER_VALIDATE_EMAIL) ){
                    $this->errors[$attribute][] = "Polje $attribute mora biti u dobrom formatu!";
                }

                if($rule === self::RULE_EMAIL_UNIQUE && !$this->findEmail($attributeValue) ){
                    $this->errors[$attribute][] = "Polje $attribute mora biti jedinstveno!";
                }
            }
        }
    }

    public function findEmail($email){
        $sql = "SELECT * FROM users WHERE email ='$email'";

        $result = $this->db->mysql->query($sql) or die();


        if (mysqli_num_rows($result)>0){
            return false;
        }

        return true;
    }
}