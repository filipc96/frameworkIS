<?php

namespace app\controllers;

use app\core\Controller;

class AuthController extends Controller
{

    public function accessDenied()
    {
        return $this->router->view("accessDenied","error");
    }

    public function notFound(){
        http_response_code(404);
        return $this->router->view("notFound","errr");
    }

    public function authorize(): array
    {
        return [
            "Guest"
        ];
    }
}