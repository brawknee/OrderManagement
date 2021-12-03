<?php

?>

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
                    <a class="navbar-brand text-white" href="admin_dashboard.php">
                       CBOMS
                    </a>
                </h1>
                <button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-lg-auto text-center">
                        <li class="nav-item active  mr-3 mt-lg-0 mt-3">
                            <a class="nav-link" href="admin_dashboard.php">Dashboard
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown mr-3 mt-lg-0 mt-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                Product Category
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="add_category.php">Add Product Category</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="view_category.php">View Product Categories</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown mr-3 mt-lg-0 mt-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                Product SubCategory
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="add_subcategory.php">Add  Product SubCategory</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="view_subcategory.php">View Product SubCategories</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown mr-3 mt-lg-0 mt-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                Products
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="post.php">Add Products</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="picture_product.php">Add  Product Picture</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="view_product.php">View Products</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown mr-3 mt-lg-0 mt-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                Orders
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="view_order.php">View Orders</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown mr-3 mt-lg-0 mt-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                Order Tracker
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="add_tracker_status.php">Add Order Tracker Status</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="view_tracker_status.php">View Tracker Status</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="update_tracker_status.php">Update Order Delivery Status</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown mr-3 mt-lg-0 mt-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                Members
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="view_member.php">View Members</a>
                            </div>
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
    // if(!session_start()){
    //     session_start();
    // }
    // if(!ob_start()){
    //     ob_start();
    // }

    if(isset($_SESSION['username'])){
		unset($_SESSION['username']);
	}
	if(isset($_SESSION['password'])){
		unset($_SESSION['password']);
    }
    session_destroy();
    header("Location: admin.php?s=".urlencode("<b>You have successfully logged out!</b>")); exit;
   /// header("Location: logout.php"); 
}

?>