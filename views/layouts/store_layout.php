<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage - Start Bootstrap Template</title>


    <link href="/../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="/../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="/../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/../assets/vendor/simple-datatables/style.css" rel="stylesheet">
</head>
<body>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#!">
            E-Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="/store">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/store">About</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">All Products</a></li>
                        <li><hr class="dropdown-divider" /></li>

                    </ul>
                </li>
            </ul>
                <a class="btn btn-outline-dark" href="/cart">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                </a>
            <div class="ms-3 p-0">
                <?php

                $user = \app\core\Application::$app->session->get("logged_in_user");
                if($user !=null){
                    $uname =$user->username;

                    echo "User: " . $uname . " ";
                    echo "<a class='justify-content-around' href='/logout'>Log out</a>";
                }else{
                    echo "<a href='/login'>Log in</a>";
                    echo " ";
                    echo "<a href='/register'>Register</a>";
                }
                ?>

            </div>

        </div>
    </div>
</nav>
<!-- Section-->
<section class="py-5">
    {{ renderBody }}
</section>

<!-- Vendor JS Files -->
<script src="/../assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="/../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/../assets/vendor/chart.js/chart.min.js"></script>
<script src="/../assets/vendor/echarts/echarts.min.js"></script>
<script src="/../assets/vendor/quill/quill.min.js"></script>
<script src="/../assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="/../assets/vendor/tinymce/tinymce.min.js"></script>
<script src="/../assets/vendor/php-email-form/validate.js"></script>

<link href="/../assets/vendor/php-email-form/toastr/toastr.min.css" rel="stylesheet">
<script src="//code.jquery.com/jquery.min.js"></script>
<script src="/../assets/vendor/php-email-form/toastr/toastr.min.js"></script>


<!-- Main JS File -->
<script src="/../assets/js/main.js"></script>


</body>
</html>