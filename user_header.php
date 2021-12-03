<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>CLOUD BASED ORDER MANAGEMENT SYSTEM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta name="keywords" content="" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/fontawesome-all.min.css" rel="stylesheet">
	<link href="css/minimal-slider.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
	<link href="//fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800,900" rel="stylesheet">
</head>
<body>
        <!-- header -->
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-gradient-secondary">
                <h1>
                    <a class="navbar-brand text-white" href="patient_dashboard.php">
                    CLOUD BASED ORDER MANAGEMENT SYSTEM
                    </a>
                </h1>
                <button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-lg-auto text-center">
                        <li class="nav-item active  mr-3 mt-lg-0 mt-3">
                            <a class="nav-link" href="user_dashboard.php">Dashboard
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <!-- <li class="nav-item dropdown mr-3 mt-lg-0 mt-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                Post My Ads
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="post.php">Post Ads Info</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="picture_product.php">Post Ads Picture</a>
                            </div>
                        </li>
                        <li class="nav-item mr-3 mt-lg-0 mt-3">
                            <a class="nav-link" href="view_my_ads.php" id="navbarDropdown"
                                aria-expanded="false">
                                View My Ads
                            </a>
                        </li> -->

                         <li class="nav-item mr-3 mt-lg-0 mt-3">
                            <a class="nav-link" href="view_product_user.php" aria-expanded="false">
                                View Products
                            </a>
                        </li>
                        
                        <li class="nav-item mr-3 mt-lg-0 mt-3">
                            <a class="nav-link" href="view_order_user.php" aria-expanded="false">
                                View My Orders
                            </a>
                        </li>
                        
                        <li class="nav-item mr-3 mt-lg-0 mt-3">
                            <a class="nav-link" href="track_order_user.php" aria-expanded="false">
                               Track My Order
                            </a>
                        </li>
                       
                        <li>
                            <form action="" method="post">
                            <button type="submit" name="logout" class="btn  ml-lg-2 w3ls-btn">
                                Logout
                            </button>
    </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </header><br><br>
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
            </ul>
<?php
if(isset($_POST['logout'])){
    header("Location: ulogout.php");
}

?>