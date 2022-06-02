<?php

namespace app\core;

class Request
{
    public function getPath(){

        //Ukoliko je prazan prosledjujemo ga na home
        $path = $_SERVER["REQUEST_URI"] ?? "/";

        //Razdvajamo parametre od ostatka
        $position = strpos($path, "?");

        if ($position===false){
            return substr($path,1);

        }

        //Odvajamo putanju od parametara
        $path = substr($path,1,$position-1);
        return $path;
    }

    public function getMethod(){
        return strtolower($_SERVER["REQUEST_METHOD"]);

    }

    public function getOne($key){
        return $_REQUEST[$key];
    }

    public function getAll(){
        return $_REQUEST;
    }
}