<?php
include "../db.php";

//write the query to get data from users table

$sql = "SELECT * FROM payment";

//execute the query

$result = $con->query($sql);

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>View Page</title>
    <!-- to make it looking good im using bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Payments</h2>
        <a href="create.php" class="btn btn-info" input="button">+ Add</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Payment Id</th>
                    <th>Payment Date </th>
                    <th>Payment Amount</th>
                    <th>Payment Type</th>
                    <th>Order_id</th>

                </tr>
            </thead>
            <tbody>
                <?php
if ($result->num_rows > 0) {
    //output data of each row
    while ($row = $result->fetch_assoc()) {
        ?>

                <tr>
                    <td><?php echo $row['payment_id']; ?></td>
                    <td><?php echo $row['payment_date']; ?></td>
                    <td><?php echo $row['payment_amount']; ?></td>
                    <td><?php echo $row['payment_type']; ?></td>
                    <td><?php echo $row['order_id']; ?></td>


                    <td><a class="btn btn-info" href="update.php?id=<?php echo $row['payment_id']; ?>">Edit</a>&nbsp;<a
                            class="btn btn-danger" href="delete.php?id=<?php echo $row['payment_id']; ?>">Delete</a>
                    </td>
                </tr>

                <?php	}
}
?>

            </tbody>
        </table>
    </div>

</body>

</html>