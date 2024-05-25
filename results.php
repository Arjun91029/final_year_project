<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>E-commerce Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet">
    <link href="styles/bootstrap.min.css" rel="stylesheet">
    <link href="styles/style.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>

    <!-- Top section -->
    <div id="top">
        <div class="container">
            <div class="col-md-6 offer">
                <a href="#" class="btn btn-success btn-sm">
                    <?php
                    if (!isset($_SESSION['customer_email'])) {
                        echo "Welcome: Guest";
                    } else {
                        echo "Welcome: " . $_SESSION['customer_email'];
                    }
                    ?>
                </a>
            </div>
            <div class="col-md-6">
                <ul class="menu">
                    <li><a href="customer_register.php">Register</a></li>
                    <li>
                        <?php
                        if (!isset($_SESSION['customer_email'])) {
                            echo "<a href='checkout.php'>My Account</a>";
                        } else {
                            echo "<a href='customer/my_account.php?my_orders'>My Account</a>";
                        }
                        ?>
                    </li>
                    <li><a href="cart.php">Go to Cart</a></li>
                    <li>
                        <?php
                        if (!isset($_SESSION['customer_email'])) {
                            echo "<a href='checkout.php'>Login</a>";
                        } else {
                            echo "<a href='logout.php'>Logout</a>";
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <div class="navbar navbar-default" id="navbar">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand home" href="index.php">
                    <img src="images/BB new2-01.png" alt="computerfever logo" class="hidden-xs" height="45px">
                    <img src="images/ecom-store-logo-mobile.png" alt="computerfever logo" class="visible-xs">
                </a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle Navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle Search</span>
                    <i class="fa fa-search"></i>
                </button>
            </div>
            <div class="navbar-collapse collapse" id="navigation">
                <div class="padding-nav">
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="index.php">Home</a></li>
                        <li class="active"><a href="shop.php">Shop</a></li>
                        <li>
                            <?php
                            if (!isset($_SESSION['customer_email'])) {
                                echo "<a href='checkout.php'>My Account</a>";
                            } else {
                                echo "<a href='customer/my_account.php?my_orders'>My Account</a>";
                            }
                            ?>
                        </li>
                        <li><a href="cart.php">Shopping Cart</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="services.php">Services</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                    </ul>
                </div>
                <!-- Shopping Cart Icon -->
                <a class="btn btn-primary navbar-btn right" href="cart.php">
                    <i class="fa fa-shopping-cart"></i>
                    <span><?php items(); ?> items in cart</span>
                </a>
                <!-- Search Button -->
                <div class="navbar-collapse collapse right">
                    <button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle Search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                <!-- Search Form -->
                <div class="collapse clearfix" id="search">
                    <form class="navbar-form" method="get" action="results.php">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Search" name="user_query" required>
                            <span class="input-group-btn">
                                <button type="submit" value="Search" name="search" class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div id="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li>Search Results</li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="row" id="Products">
                    <?php
                    if (isset($_GET['search'])) {
                        $user_keyword = $_GET['user_query'];
                        $get_products = "SELECT * FROM products WHERE product_title LIKE '%$user_keyword%'";
                        $run_products = mysqli_query($con, $get_products);
                        $count = mysqli_num_rows($run_products);
                        if ($count == 0) {
                            echo "<div class='box'><h2>Search Results Not Found</h2></div>";
                        } else {
                            while ($row_products = mysqli_fetch_array($run_products)) {
                                $pro_id = $row_products['product_id'];
                                $pro_title = $row_products['product_title'];
                                $pro_price = $row_products['product_price'];
                                $pro_img1 = $row_products['product_img1'];
                                echo "
                                    <div class='col-md-4 col-sm-6 single'>
                                        <div class='product'>
                                            <a href='details.php?pro_id=$pro_id'>
                                                <img src='admin_area/product_images/$pro_img1' class='img-responsive'>
                                            </a>
                                            <div class='text'>
                                                <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                                                <p class='price'>Rs$pro_price</p>
                                                <p class='buttons'>
                                                    <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View details</a>
                                                    <a href='details.php?pro_id=$pro_id' class='btn btn-primary'>
                                                    <i class='fa fa-shopping-cart'></i> Add to cart
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                ";
                            }
                        }
                    }
                ?>

            </div><!-- row Ends -->
        </div><!-- col-md-9 Ends --->
    </div><!-- container Ends -->
</div><!-- content Ends -->

<?php
    include("includes/footer.php");
?>

<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>