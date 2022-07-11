<!-- To fix -->

<link href="assets/vendor/toastr/toastr.min.css" rel="stylesheet">
<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
<script src="assets/vendor/toastr/toastr.min.js"></script>

<?php

use app\core\Application;
use app\models\UserModel;

/** @var $params \app\models\UserModel */

//Function for checking errors
function checkError($error, $params){
    if (isset($params->errors[$error])){
        if ($params->errors[$error] !== null ){
            foreach ($params->errors[$error] as $errorMsg){
                echo "<ul>";
                echo "<li class='text-danger' >$errorMsg</li>";
                echo "</ul>";
            }
        }
    }
}

function displayFlash($key){
    if (Application::$app->session->getFlash($key)){
        $msg = Application::$app->session->getFlash($key);
        echo "<script>";
        echo "$( document ).ready(function() {
            toastr.success('$msg');
            });";

        echo"</script>";
    }
}

displayFlash("user");

$id = Application::$app->router->request->getOne("id");
$model = new UserModel();
$userToUpdate = $model->getOne("id=$id");
$model->loadData($userToUpdate);

$role_name = $model->getUserRoleId();
$full_name = $model->full_name;
$username = $model->username;
$email = $model->email;
$address = $model->address;

$optionsString = "<option value='editor'>Editor</option>
                        <option value='delivery'>Delivery</option>
                        <option value='user'>User</option>";

$optionsString = str_replace("value='$role_name'","value='$role_name' selected=''",$optionsString);

?>

<div class="card">
    <div class="card-body">
        <h1>Update User</h1>

        <!-- Vertical Form -->
        <form class="row g-3" method="post" action="/editProcess">
            <div class="col-12">
                <label for="inputNanme4" class="form-label">Users Name</label>
                <input value=<?php echo $full_name?> type="text" class="form-control" id="inputNanme4" name="full_name">
                <?php
                checkError("full_name",$params);
                ?>
            </div>
            <div class="col-12">
                <label for="inputNanme4" class="form-label">Username</label>
                <input value="<?php echo $username?>" type="text" class="form-control" id="inputNanme4" name="username">
                <?php
                checkError("username",$params);
                ?>
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Address</label>
                <input value="<?php echo $address?>" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address">
            </div>
            <div class="row w-auto mb-3"><label class="col-12 col-form-label">User Role</label>
                <div class="col-sm-10">
                    <select name="role" class="form-select" aria-label="Default select example">
                    <?php
                        echo $optionsString;
                    ?>
                    </select></div>
            </div>
            <input name="id" type="hidden" value="<?php echo $id?>">

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update User</button>
                <!--                <button type="reset" class="btn btn-secondary">Reset</button>-->
            </div>
        </form><!-- Vertical Form -->

    </div>
</div>