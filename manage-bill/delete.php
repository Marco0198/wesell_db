<?php
include "../db.php";
// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id'])) {
    $billing_id = $_GET['id'];

    // write delete query
    $sql = "DELETE FROM bill WHERE bill_Id='$billing_id'";

    // Execute the query

    $result = $con->query($sql);

    if ($result == true) {

        echo "Record deleted successfully.";
        //echo "<script>alert('successfully deleted')</script>";
        // echo "<script type='text/javascript'> document.location ='view.php'; </script>";
    } else {
        echo "Error:" . $sql . "<br>" . $con->error;
        // echo "<script>alert('Unsuccessful')</script>";
        //echo "<script type='text/javascript'> document.location ='view.php'; </script>";
    }
}