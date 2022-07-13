<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>FrameworkIS</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/../assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/../assets/css/style.css" rel="stylesheet">

</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="/store" class="logo d-flex align-items-center">
            <img src="/../assets/img/logo.png" alt="">
            <span class="d-none d-lg-block">E-Store</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">


            <li class="nav-item mx-3">
                <?php

                    $user = \app\core\Application::$app->session->get("logged_in_user");
                    if($user !=null){
                        $uname =$user->username;

                        echo "User: " . $uname . " ";
                        echo "<a class='justify-content-around' href='/logout'>Log out</a>";
                    }else{
                        echo "Not logged in ";
                        echo "<a href='/login'>Log in</a>";
                    }
                ?>

            </li>

        </ul>
    </nav>

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="/admin">
                <i class="bi bi-bar-chart-line"></i>
                <span>Home</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/createUser">
                <i class="bi bi-journal-text"></i>
                <span>Create User</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/productmanagment/create">
                <i class="bi bi-journal-text"></i>
                <span>Create Product</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/categorymanagment/create">
                <i class="bi bi-journal-text"></i>
                <span>Create Category</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/userList">
                <i class="bi bi-layout-text-window-reverse"></i>
                <span>User List</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/productmanagment/productList">
                <i class="bi bi-layout-text-window-reverse"></i>
                <span>Product List</span>
            </a>
        </li>

    </ul>



</aside><!-- End Sidebar-->

<main id="main" class="main">
    {{ renderBody }}

</main><!-- End #main -->


<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="/../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/../assets/vendor/chart.js/chart.min.js"></script>
<script src="/../assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="/../assets/vendor/php-email-form/validate.js"></script>

<link href="/../assets/vendor/php-email-form/toastr/toastr.min.css" rel="stylesheet">
<script src="//code.jquery.com/jquery.min.js"></script>
<script src="/../assets/vendor/php-email-form/toastr/toastr.min.js"></script>


<!-- Template Main JS File -->
<script src="/../assets/js/main.js"></script>

</body>

</html>