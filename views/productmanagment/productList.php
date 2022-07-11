<?php

use app\models\CategoryModel;
use app\models\ProductManagmentModel;
use app\models\UserModel;

function getProductRows()
{
    $productModel = new ProductManagmentModel();
    $productList = $productModel->getAll();


    foreach ($productList as $product){
        $product_id = $product["id"];
        $product_name = $product["product_name"];
        $price = $product["price"];
        $quantity = $product["quantity"];
        $active= $product["active"];
        $category = $product["category"];
        $catgoryModel = new CategoryModel();
        $category_name = $catgoryModel->getOne("id = $category")["category_name"];
        if ($active) {
            echo "       
                <tr>
                    <th scope='row'>$product_id</th>
                    <td>$product_name</td>
                     <td>$price</td>
                    <td>$quantity</td>
                    <td>$category_name</td>
                    <td class='text-center'>
                        <form class='d-inline' method='post' action='/deleteProcess'>
                            <button class='btn btn-danger'>Delete</button> 
                            <input name='id' type='hidden' value='$product_id'>
                         </form>
                        <form class='d-inline' action='/edit' method='get'>
                            <button class='btn btn-success'>Edit</button>
                            <input name='id' type='hidden' value='$product_id'>
                        </form
                    </td>   
                </tr>
                  
        ";
        }
    }
}

?>

<table class="table">
    <thead class="table-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Product Name</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Category</th>
        <th scope="col"></th>


    </tr>
    </thead>
    <tbody>
    <?php
    getProductRows();
    ?>
    </tbody>
</table>

<a href="/productmanagment/create" class="btn btn-primary">Add Product</a>