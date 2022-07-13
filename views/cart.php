<?php

use app\core\Application;
use app\models\ProductManagmentModel;

function getCartItems()
{
    $product_id_list = Application::$app->session->get('cart');
    foreach ($product_id_list as $product_id) {
        $model = new ProductManagmentModel();
        $product = $model->getOne("id = $product_id");
        $product_name = $product['product_name'];
        $product_price = $product['price'];


        echo "<div class='card  mb-4'>
                    <div class='card-body p-4'>
                        <div class='row d-flex justify-content-between align-items-center'>
                            <div class='col-md-2 col-lg-2 col-xl-2'>
                                <img
                                        src='https://dummyimage.com/450x300/dee2e6/6c757d.jpg'
                                        class='img-fluid rounded-3' alt='Cotton T-shirt'>
                            </div>
                            <div class='col-md-3 col-lg-3 col-xl-3'>
                                <p class='lead fw-normal mb-2'>$product_name</p>
                            </div>
                            <div class='col-md-3 col-lg-3 col-xl-2 d-flex'>
                                       <div class='col-sm-10'><input name='quantity' type='number' id='quantityId' class='form-control'></div>

                            </div>
                            <div class='col-md-3 col-lg-2 col-xl-2 offset-lg-1'>
                                <h5 id='priceIdCart' class='mb-0'>$product_price $</h5>
                            </div>
                            <div class='col-md-1 col-lg-1 col-xl-1 text-end'>
                                <a href='#!' class='text-danger'><i class='fas fa-trash fa-lg'></i></a>
                            </div>
                        </div>
                    </div>
                </div>";
    }
}

function getTotal(){
$product_id_list = Application::$app->session->get('cart');
$total=0;
foreach ($product_id_list as $product_id) {
    $model = new ProductManagmentModel();
    $product = $model->getOne("id = $product_id");
    $product_price = $product['price'];
    $total+=$product_price;

}
echo $total;
}


?>


<section class="h-100" style="background-color: #eee;">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                </div>

                <?php
                getCartItems()
                ?>

                <hr class="mt-3 mb-3"/>

                <h2 id="totalPriceCart">Total: <?php  getTotal(); ?> $</h2>

                <button class="btn btn-lg btn-primary mt-3">Order</button>


            </div>
        </div>
    </div>
</section>
