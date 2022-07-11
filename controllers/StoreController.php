<?php

namespace app\controllers;

use app\core\Controller;

class StoreController extends Controller
{

    public function store(){

        return $this->router->view("/store","store_layout");
    }
    public function cart(){

        return $this->router->view("/cart","store_layout");
    }


    public function authorize(): array
    {
        return ["guest"];
    }
}