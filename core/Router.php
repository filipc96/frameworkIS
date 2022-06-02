<?php

namespace app\core;

class Router
{
    public Request $request;
    public array $routes=[];
    public function __construct()
    {
        $this->request = new Request();
    }

    public function get($path,$callback){
        $this->routes['get'][$path] = $callback;
    }

    public function post($path,$callback){
        $this->routes['post'][$path] = $callback;
    }

    public function resolve(){
        $path = $this->request->getPath();
        $method = $this->request->getMethod();

        $callback = $this->routes[$method][$path] ?? false;

        if ($callback=== false){
            http_response_code(404);
            $callback="notFound";
            echo $this->renderPartialView($callback);
            exit;
        }

        if (is_string($callback)){
            $this->View($callback, "main");

        }

        if (is_array($callback)){
            //var_dump($callback[0]);
            $callback[0] = new $callback[0]();
            return call_user_func($callback);
        }


    }

    public function renderPartialView($view){
        //POGLEDATI!
        ob_start(); //Ciscenje da ne ostaje renderBody
        include_once __DIR__ . "/../views/$view.php";
        return ob_get_clean();
    }

    public function renderPartialViewWithParams($view,$params){

        if ($params !== null){
            //POGLEDATI
            foreach ($params as $key => $value){
                //POGLEDATI
                $$key = $value;
            }
        }

        //POGLEDATI!
        ob_start(); //Ciscenje da ne ostaje renderBody
        include_once __DIR__ . "/../views/$view.php";
        return ob_get_clean();
    }

    public function renderLayout($layout){
        //POGLEDATI!
        ob_start();//Ciscenje da ne ostaje renderBody
        include_once __DIR__ . "/../views/layouts/$layout.php";
        return ob_get_clean();

    }

    public function viewWithParams($partialView,$layout,$params){
        $layoutViewContent = $this->renderLayout($layout);
        $partialViewContent = $this->renderPartialViewWithParams($partialView,$params);

        //Menjamo renderBody u layoutu sa sadrzajem
        $view = str_replace("{{ renderBody }}",$partialViewContent,$layoutViewContent);
        echo $view;
    }

    public function view($partialView,$layout){
        $layoutViewContent = $this->renderLayout($layout);
        $partialViewContent = $this->renderPartialView($partialView);

        //Menjamo renderBody u layoutu sa sadrzajem
        $view = str_replace("{{ renderBody }}",$partialViewContent,$layoutViewContent);
        echo $view;
    }
}