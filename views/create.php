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
    // Displaying flash message
    if (Application::$app->session->getFlash("user")){
        $msg = Application::$app->session->getFlash("user");
        echo "<script>";
        echo "$( document ).ready(function() {
            toastr.success('$msg');
            });";

        echo"</script>";
    }

?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Create User</h5>

        <!-- Vertical Form -->
        <form class="row g-3" method="post" action="createUserProcess">
            <div class="col-12">
                <label for="inputNanme4" class="form-label">Your Name</label>
                <input type="text" class="form-control" id="inputNanme4" name="full_name">
                <?php
                checkError("full_name",$params);
                ?>
            </div>
            <div class="col-12">
                <label for="inputNanme4" class="form-label">Username</label>
                <input type="text" class="form-control" id="inputNanme4" name="username">
                <?php
                checkError("username",$params);
                ?>
            </div>
            <div class="col-12">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail4" name="email">
                <?php
                checkError("email",$params);
                ?>
            </div>
            <div class="col-12">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword4" name="password">
                <?php
                    checkError("password",$params);
                ?>
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form><!-- Vertical Form -->

    </div>
</div>