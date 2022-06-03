<?php

namespace app\core;


abstract class DBModel extends Model
{
    public $date_created;
    public $date_update;
    public $user_created;
    public $user_updated;
    public $active;


    public abstract function rules() :array;

}