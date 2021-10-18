<?php
include "../db.php";

// if the form's submit button is clicked, we need to process the form
if (isset($_POST['submit'])) {
    // get variables from the form
    $payment_date = date("y-m-d H:i:s", strtotime($_POST['payment_date']));
    $payment_amount = $_POST['payment_amount'];
    $payment_type = $_POST['payment_type'];

    //write sql query
    $sql = "INSERT INTO payment (payment_date,payment_amount, payment_type) VALUES ('$payment_date','$payment_amount','$payment_type')";

    // execute the query

    $result = $con->query($sql);

    if ($result == true) {
        echo "New record created successfully.";
        echo "<script>alert('New record created successfully')</script>";
        echo "<script type='text/javascript'> document.location ='view.php'; </script>";
    } else {
        echo "Error:" . $sql . "<br>" . $con->error;
        echo "<script>alert('Unsuccessfull')</script>";
        echo "<script type='text/javascript'> document.location ='create.php'; </script>";
    }

    $con->close();

}

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>


    <div class="payment-form">
        <h2> Adding new Payment</h2>
        <form action="" method="POST">


            <input type="date" name="payment_date" placeholder="date" required>
            <br>
            <input type="text" name="payment_amount" placeholder="payment amount" required>
            <br>
            <input type="text" name="payment_type" placeholder="payment_type" required>
            <br>


            <input type="submit" name="submit" value="submit">


        </form>
    </div>
</body>

</html>