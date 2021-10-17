<?php
// i added card action
include './cart.php';
include './db.php';
if (isset($_POST['checkout'])) {
    $quantity = $_POST['quantity'];
    $code = $_POST['code'];
    $total = $total_price;

    // $sql = "INSERT INTO orders (code, quantity, total,) VALUES ($code,$quantity,$total)";

    // // execute the query

    // $result = $con->query($sql);

    // if ($result == TRUE) {
    //     echo "New record created successfully.";
    // } else {
    //     echo "Error:" . $sql . "<br>" . $con->error;
    // }

    // $con->close();


    echo " <script type='text/javascript'>alert('success $total $quantity $code');</script> ";
}
