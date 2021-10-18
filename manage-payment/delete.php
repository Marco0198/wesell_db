<?php
include "../db.php";
// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id'])) {
    $payment_id = $_GET['id'];

    // write delete query
    $sql = "DELETE FROM payment WHERE payment_id='$payment_id'";

    // Execute the query

    $result = $con->query($sql);

    if ($result == true) {

        echo "<script>alert('Your payment was deleted')</script>";
        echo "<script type='text/javascript'> document.location ='view.php'; </script>";
    } else {
        echo "Error:" . $sql . "<br>" . $con->error;
        echo "<script>alert('Unsuccessful')</script>";
        echo "<script type='text/javascript'> document.location ='view.php'; </script>";
    }
}
