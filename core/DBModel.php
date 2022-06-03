<?php

namespace app\core;


abstract class DBModel extends Model
{
    public abstract function rules() :array;

}