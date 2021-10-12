<?php
include "db.php";

// if the form's submit button is clicked, we need to process the form
if (isset($_POST['woocommerce_checkout_place_order'])) {
    // get variables from the form

    $payment_type = $_POST['payment_method'];

    //write sql query
    $sql = "INSERT INTO `payment`( `payment_type`) VALUES ('$payment_type')";

    //$sql = "INSERT INTO `payment`(`Payment_Date`, `Payment_Type`, `Amount`) VALUES ('$payment_date','$payment_type','$amount')";

    // execute the query

    $result = $con->query($sql);

    if ($result == true) {
        echo "New record created successfully.";
    } else {
        echo "Error:" . $sql . "<br>" . $con->error;
    }

    $con->close();

}