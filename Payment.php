<?php
include "db.php";

// if the form's submit button is clicked, we need to process the form
if (isset($_POST['woocommerce_checkout_place_order'])) {
    // get variables from the form
    $current_time = date("Y-m-d");
    $payment_type = $_POST['payment_method'];
    $order_id = null;
    $payment_amount = null;

    $sql_get_order_id = "SELECT order_id,total_amount FROM orders ORDER BY order_id DESC LIMIT 1";

    if ($result = $con->query($sql_get_order_id)) {
        while ($row = $result->fetch_row()) {
            $order_id = $row[0];
            $payment_amount = $row[1];
        }
    } else {
        echo $con->error;
    }

    //echo $order_id;

    //write sql query
    $sql = "INSERT INTO payment(payment_amount,payment_type,order_id) VALUES ('$payment_amount','$payment_type','$order_id')";

    $result = $con->query($sql);

    if ($result == true) {
        echo "<script>alert('Your payment was successfull')</script>";
        echo "<script type='text/javascript'> document.location ='product.php'; </script>";
    } else {
        echo "Error:" . $sql . "<br>" . $con->error;
        //  echo "<script>alert('Your payment was not successfull')</script>";
        // echo "<script type='text/javascript'> document.location ='product.php'; </script>";
    }

    $con->close();

}