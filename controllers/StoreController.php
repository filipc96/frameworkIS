<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;

class StoreController extends Controller
{

    public function store()
    {

        return $this->router->view("/store", "store_layout");
    }

    public function cart()
    {

        return $this->router->view("/cart", "store_layout");
    }

    public function addToCart()
    {
        if (isset($_GET["addToCart"])) {

            if (Application::$app->session->get('cart')) {
                $productListId = array_column(Application::$app->session->get('cart'), "product_id");
                if (in_array($_GET['product_id'], $productListId)) {

                    echo "<script>alert('Product is already added to the cart')</script>";
                } else {

                    $count = count(Application::$app->session->get('cart'));
                    var_dump($count);



                    Application::$app->session->setAtIndex('cart',$_GET['product_id'],$count);
                    var_dump(Application::$app->session->get('cart'));exit();

                }

            } else {
                Application::$app->session->setAtIndex('cart', $_GET['product_id'],0);
            }
        }
        $this->request->redirect("/store");
    }


    public function authorize(): array
    {
        return ["guest"];
    }
}