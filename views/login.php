
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                    <img src="assets/img/logo.png" alt="">
                    <span class="d-none d-lg-block">E-Store</span>
                </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

                <div class="card-body">

                    <form method="post" action="loginProcess" class="row g-3 needs-validation">

                        <div class="col-12">
                            <label for="yourEmail" class="form-label">Your Email</label>
                            <input type="email" name="email" class="form-control" id="yourEmail" required>
                            <div class="invalid-feedback">Please enter a valid Email adddress!</div>

                        </div>

                        <div class="col-12">
                            <label for="yourPassword" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="yourPassword" required>
                            <div class="invalid-feedback">Please enter your password!</div>

                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit">Log In</button>
                        </div>
                        <div class="col-12">
                            <p class="small mb-0">Don't have an account? <a href="registration">Register</a></p>
                        </div>
                    </form>

                </div>
            </div>


        </div>
    </div>
</div>