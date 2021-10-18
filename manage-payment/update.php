<?php
include "../db.php";

// if the form's update button is clicked, we need to process the form
if (isset($_POST['update'])) {

    $payment_id = $_GET['id'];
    $payment_date = date('y-m-d', strtotime($_POST['payment_date']));
    $payment_type = $_POST['payment_type'];
    $amount = $_POST['payment_amount'];

    // write the update query
    $sql = "UPDATE payment SET payment_date ='$payment_date',payment_type='$payment_type',payment_amount='$amount' WHERE `payment_id`=$payment_id";

    // execute the query
    $result = $con->query($sql);

    if ($result == true) {
        echo "<script>alert('Your payment was successfully updated')</script>";
        echo "<script type='text/javascript'> document.location ='view.php'; </script>";
    } else {
        echo "Error:" . $sql . "<br>" . $con->error;
        echo "<script>alert('Your payment wasn't updated')</script>";
        echo "<script type='text/javascript'> document.location ='view.php'; </script>";
    }
}

// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id'])) {
    $payment_id = $_GET['id'];

    // write SQL to get user data
    $sql = "SELECT * FROM payment WHERE payment_id='$payment_id'";

    //Execute the sql
    $result = $con->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $payment_id = $row['payment_id'];
            $payment_date = $row['payment_date'];
            $payment_amount = $row['payment_amount'];
            $payment_type = $row['payment_type'];

        }

        ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>



    <div class="payment-form">

        <form action="" method="post">
            <h2>update payment</h2>
            <br>
            <input type="date" name="payment_date" value="<?php echo $payment_date; ?>">
            <br>
            <input type="text" name="payment_amount" value="<?php echo $payment_amount ?>">
            <br>
            <input type="text" name="payment_type" value="<?php echo $payment_type; ?>">
            <br>


            <input type="submit" value="Update" name="update">
            </fieldset>
        </form>
        <div></div>
</body>

</html>




<?php
} else {
        //If the 'id' value is not valid, redirect the user back to view.php page
        header('Location: view.php');
    }

}
?>