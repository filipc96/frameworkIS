<?php

namespace app\models;

use app\core\DBModel;

class RegistrationModel extends DBModel
{

    public $email;
    public $password;

    public function rules():array{
        return [
            "email"=>[self::RULE_EMAIL,self::RULE_REQUIRED],
            "password"=>[self::RULE_REQUIRED]
        ];
    }


    public function create(){
        
    }

}