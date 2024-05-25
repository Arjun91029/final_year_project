<?php session_start(); ?>
<?php include("includes/db.php"); ?>
<?php include("functions/functions.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>E commerce Store</title>
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet">
    <link href="styles/bootstrap.min.css" rel="stylesheet">
    <link href="styles/style.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <div id="top">
        <div class="container">
            <div class="col-md-6 offer">
                <a href="#" class="btn btn-success btn-sm">
                    <?php if(!isset($_SESSION['customer_email'])) { echo "Welcome :Guest"; } else { echo "Welcome : " . $_SESSION['customer_email'] . ""; } ?>
                </a>
            </div>
            <div class="col-md-6">
                <ul class="menu">
                    <li><a href="customer_register.php">Register</a></li>
                    <li><?php if(!isset($_SESSION['customer_email'])) { echo "<a href='checkout.php'>My Account</a>"; } else { echo "<a href='customer/my_account.php?my_orders'>My Account</a>"; } ?></li>
                    <li><a href="cart.php">Go to Cart</a></li>
                    <li><?php if(!isset($_SESSION['customer_email'])) { echo "<a href='checkout.php'>Login</a>"; } else { echo "<a href='logout.php'>Logout</a>"; } ?></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="navbar navbar-default" id="navbar">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand home" href="index.php">
                    <img src="images/BB new2-01.png" alt="ecom logo" class="hidden-xs" height="45px">
                    <img src="images/ecom-store-logo-mobile.png" alt="ecom logo" class="visible-xs">
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
                        <li><a href="shop.php">Shop</a></li>
                        <li><?php if(!isset($_SESSION['customer_email'])) { echo "<a href='checkout.php'>My Account</a>"; } else { echo "<a href='customer/my_account.php?my_orders'>My Account</a>"; } ?></li>
                        <li><a href="cart.php">Shopping Cart</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                    </ul>
                </div>
                <a class="btn btn-primary navbar-btn right" href="cart.php">
                    <i class="fa fa-shopping-cart"></i>
                    <span><?php items(); ?> items in cart</span>
                </a>
                <div class="navbar-collapse collapse right">
                    <button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle Search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>
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
    <div id="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li>Register</li>
                </ul>
            </div>
            <div class="col-md-3">
                <?php include("includes/sidebar.php"); ?>
            </div>
            <div class="col-md-9">
                <?php if(!isset($_SESSION['customer_email'])) { include("customer/customer_login.php"); } else { include("payment_options.php"); } ?>
            </div>
        </div>
    </div>
    <?php include("includes/footer.php"); ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
