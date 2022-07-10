<!-- To fix -->

<link href="assets/vendor/toastr/toastr.min.css" rel="stylesheet">
<script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
<script src="assets/vendor/toastr/toastr.min.js"></script>

<?php

use app\core\Application;

/** @var $params \app\models\UserModel */

//Function for checking errors
function checkError($error, $params)
{
    if (isset($params->errors[$error])) {
        if ($params->errors[$error] !== null) {
            foreach ($params->errors[$error] as $errorMsg) {
                echo "<ul>";
                echo "<li class='text-danger' >$errorMsg</li>";
                echo "</ul>";
            }
        }
    }
}

function displayFlash($key)
{
    if (Application::$app->session->getFlash($key)) {
        $msg = Application::$app->session->getFlash($key);
        echo "<script>";
        echo "$( document ).ready(function() {
            toastr.success('$msg');
            });";

        echo "</script>";
    }
}

displayFlash("user");


?>


<h1>Create Product</h1>
<br/>

<form method="post" action="createProductProcess">
    <div class="row mb-3"><label for="inputText" class="col-sm-2 col-form-label">Product Name</label>
        <div class="col-sm-10">
            <input name="product_name" type="text" class="form-control"></div>
        <?php
        if (isset($params)) {
            checkError("product_name", $params);
        }
        ?>

    </div>

    <div class="row mb-3"><label for="inputNumber" class="col-sm-2 col-form-label">Price</label>
        <div class="col-sm-10"><input name="price" type="number" class="form-control"></div>
        <?php
        if (isset($params)) {
            checkError("price", $params);
        }
        ?>

    </div>


    <div class="row mb-3"><label for="inputNumber" class="col-sm-2 col-form-label">Quantity</label>
        <div class="col-sm-10"><input name="quantity" type="number" class="form-control"></div>
        <?php
        if (isset($params)) {
            checkError("quantity", $params);
        }
        ?>
    </div>
    <div class="row mb-3"><label for="inputNumber" class="col-sm-2 col-form-label">Product Image</label>
        <div class="col-sm-10"><input name="" class="form-control" type="file" id="formFile"></div>
    </div>

    <div class="row mb-3"><label for="inputPassword" class="col-sm-2 col-form-label">Descritpion</label>
        <div class="col-sm-10"><textarea name="description" class="form-control" style="height: 100px"></textarea></div>


    </div>


    <div class="row mb-3"><label class="col-sm-2 col-form-label">Category</label>
        <div class="col-sm-10"><select name="category" class="form-select" aria-label="Default select example">
                <option selected="">Select category</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select></div>
        <?php
        if (isset($params)) {
            checkError("category", $params);
        }
        ?>
    </div>

    <div class="row mb-3">
        <div class="col-sm-10 text-center">
            <button type="submit" class="btn btn-primary">Create Product</button>
        </div>
    </div>
</form>