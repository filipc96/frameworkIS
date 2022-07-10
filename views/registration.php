<?php
use app\core\Application;
/** @var $params \app\models\AuthModel */
//Function for checking errors
function checkError($error, $params){
    if (isset($params->errors[$error])){
        if ($params->errors[$error] !== null ){
            foreach ($params->errors[$error] as $errorMsg){
                echo "<ul style='list-style: none'>";
                echo "<li class='text-danger' >$errorMsg</li>";
                echo "</ul>";
            }
        }
    }
}
?>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                    <img src="assets/img/logo.png" alt="">
                    <span class="d-none d-lg-block">NiceAdmin</span>
                </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

                <div class="card-body">

                    <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                        <p class="text-center small">Enter your personal details to create account</p>
                    </div>

                    <form method="post" action="registrationProcess" class="row g-3 needs-validation">
                            <div class="col-12">
                                <label for="yourEmail" class="form-label">Your Full Name</label>
                                <input type="text" name="full_name" class="form-control" id="yourFullName" required>
                            <!-- <div class="invalid-feedback">Please enter a valid Email address!</div>-->

                            </div>

                            <div class="col-12">
                                <label for="yourEmail" class="form-label">Your Address</label>
                                <input type="text" name="address" class="form-control" id="yourAddress" required>
                                <!--  <div class="invalid-feedback">Please enter a valid Email address!</div>-->

                            </div>

                            <div class="col-12">
                                <label for="yourEmail" class="form-label">Your Username</label>
                                <input type="text" name="username" class="form-control" id="yourUserName" required>
                                <!--  <div class="invalid-feedback">Please enter a valid Email address!</div>-->

                            </div>


                            <div class="col-12">
                                <label for="yourEmail" class="form-label">Your Email</label>
                                <input type="email" name="email" class="form-control" id="yourEmail" required>
                                <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                <?php
                                /** @var $params \app\models\AuthModel */
                                checkError("email",$params);
                                ?>
                            </div>

                            <div class="col-12">
                                <label for="yourPassword" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="yourPassword" required>
                                <div class="invalid-feedback">Please enter your password!</div>
                                <?php
                                /** @var $params \app\models\AuthModel */
                                checkError("password",$params);
                                ?>
                            </div>

                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                                    <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                                    <div class="invalid-feedback">You must agree before submitting.</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">Create Account</button>
                            </div>
                            <div class="col-12">
                                <p class="small mb-0">Already have an account? <a href="login">Log in</a></p>
                            </div>
                    </form>

                </div>
            </div>

            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>

        </div>
    </div>
</div>