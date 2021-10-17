<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com
*/
session_start();
$status = "";
if (isset($_POST['action']) && $_POST['action'] == "remove") {
    if (!empty($_SESSION["shopping_cart"])) {
        foreach ($_SESSION["shopping_cart"] as $key => $value) {
            if ($_POST["code"] == $key) {
                unset($_SESSION["shopping_cart"][$key]);
                $status = "<div class='box' style='color:red;'>
		Product is removed from your cart!</div>";
            }
            if (empty($_SESSION["shopping_cart"]))
                unset($_SESSION["shopping_cart"]);
        }
    }
}

if (isset($_POST['action']) && $_POST['action'] == "change") {
    foreach ($_SESSION["shopping_cart"] as &$value) {
        if ($value['code'] === $_POST["code"]) {
            $value['quantity'] = $_POST["quantity"];
            break; // Stop the loop after we've found the product
        }
    }
}
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>home page </title>

    <!--favicon-->
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <!-- Nav -->
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="#"><i class="fa fa-user"></i> My Account</a></li>
                            <li><a href="login.php"><i class="fa fa-user"></i> Login</a></li>
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="product.php">Products</a></li>
                            <li><a href="contact.php">Contact</a></li>

                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">ZAR </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">

                            </li>

                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">English</a></li>

                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->

    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="./"><img src="img/logo1.png"></a></h1>

                    </div>
                </div>
                <?php
                if (!empty($_SESSION["shopping_cart"])) {
                    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                ?>
                    <div class="cart_div">
                        <a href="cart.php"><img src="cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <!-- End site branding area 
  <div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div> 
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.html">Home</a></li>
                    <li><a href="shop.html">Products</a></li>
                    <li><a href="cart.html">Cart</a></li>
                    <li><a href="checkout.html">Checkout</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cart">Cart (<span class="total-count"></span>)</div>
  
                </ul>
            </div>  
        </div>
    </div>
  </div> End mainmenu area -->
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>card</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product_container">



        <div class="cart">
            <?php
            if (isset($_SESSION["shopping_cart"])) {
                $total_price = 0;
            ?>
                <table class="table">
                    <tbody>
                        <tr>
                            <td></td>
                            <td>ITEM NAME</td>
                            <td>QUANTITY</td>
                            <td>UNIT PRICE</td>
                            <td>ITEMS TOTAL</td>
                        </tr>
                        <?php
                        foreach ($_SESSION["shopping_cart"] as $product) {
                        ?>
                            <tr>
                                <td><img src='<?php echo $product["image"]; ?>' width="120" height="120" /></td>
                                <td><?php echo $product["name"]; ?><br />
                                    <form method='post' action=''>
                                        <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                                        <input type='hidden' name='action' value="remove" />
                                        <button type='submit' class='remove'>Remove Item</button>
                                    </form>
                                </td>
                                <td>
                                    <form method='post' action='cart_action.php'>
                                        <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                                        <input type='hidden' name='action' value="change" />
                                        <select name='quantity' class='quantity' onchange="this.form.submit()">
                                            <option <?php if ($product["quantity"] == 1) echo "selected"; ?> value="1">1</option>
                                            <option <?php if ($product["quantity"] == 2) echo "selected"; ?> value="2">2</option>
                                            <option <?php if ($product["quantity"] == 3) echo "selected"; ?> value="3">3</option>
                                            <option <?php if ($product["quantity"] == 4) echo "selected"; ?> value="4">4</option>
                                            <option <?php if ($product["quantity"] == 5) echo "selected"; ?> value="5">5</option>
                                        </select>

                                </td>
                                <td><?php echo "R" . $product["price"]; ?></td>
                                <td><?php echo "R" . $product["price"] * $product["quantity"]; ?></td>
                            </tr>
                        <?php
                            $total_price += ($product["price"] * $product["quantity"]);
                        }
                        ?>
                        <tr>
                            <td colspan="5" align="right">
                                <strong>TOTAL: <?php echo "R" . $total_price; ?><a href="checkout.php"><br><button class="btn btn-danger" name="checkout" type='submit' class='remove'>Checkout
                                        </button></a></strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </form>
            <?php
            } else {
                echo "<h3>Your cart is empty!</h3>";
            }
            ?>
        </div>

        <div style="clear:both;"></div>

        <div class="message_box" style="margin:10px 0px;">
            <?php echo $status; ?>
        </div>


        <br /><br />
    </div>
    <div class="footer-top-area">
        ©2021
    </div>
</body>

</html>