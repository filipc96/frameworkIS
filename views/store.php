<?php

use app\core\Application;
use app\models\ProductManagmentModel;


function getProductsCards(){
    $model = new ProductManagmentModel();
    $productList =  $model->getAll();
    foreach ($productList as $product){
        $product_id = $product["id"];
        $product_name = $product["product_name"];
        $price = $product["price"];
        $quantity = $product["quantity"];
        $stock = $quantity>0 ? "In Stock" : "Out of Stock";

        echo "
             <div class='col mb-5'>
            <div class='card h-100''>
                <!-- Product image-->
                <img class='card-img-top' src='https://dummyimage.com/450x300/dee2e6/6c757d.jpg' alt='...' />
                <!-- Product details-->
                <div class='card-body p-4'>
                    <div class='text-center'>
                        <!-- Product name-->
                        <h5 class='fw-bolder'>$product_name</h5>
                        <!-- Product price-->
        $ $price
        <br/>
                        $stock
                      
        </div>
                </div>
                <!-- Product actions-->
                <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                    <form action='addtocart' action='get' >
                         <div class='text-center'><button type='submit' name='addToCart' class='btn btn-outline-dark mt-auto'>Add to cart</button></div>
                         <input type='hidden' name='product_id' value='$product_id'>
                    </form>
                </div>
            </div>
        </div>
        ";
    }


}


?>



<div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

        <?php
            getProductsCards();
        ?>

    </div>

</div>
