<?php
include "../db.php";

//write the query to get data from users table

$sql = "SELECT * FROM bill";

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
        <h2>Bills</h2>
        <a href="create.php" class="btn btn-info" input="button">+ Add</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Bill Id</th>
                    <th>County </th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Addres</th>
                    <th>Apartment</th>
                    <th>Town </th>
                    <th>Province</th>
                    <th>Postcode</th>
                    <th>Email</th>
                    <th>Phone</th>

                </tr>
            </thead>
            <tbody>
                <?php
if ($result->num_rows > 0) {
    //output data of each row
    while ($row = $result->fetch_assoc()) {
        ?>

                <tr>
                    <td><?php echo $row['bill_Id']; ?></td>
                    <td><?php echo $row['country']; ?></td>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['apartment']; ?></td>
                    <td><?php echo $row['town']; ?></td>
                    <td><?php echo $row['province']; ?></td>
                    <td><?php echo $row['postcode']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phonenumber']; ?></td>
                    <td><a class="btn btn-info" href="update.php id=<?php echo $row['bill_Id']; ?>">Edit</a>&nbsp;<a
                            class="btn btn-danger"
                            href="delete.php?payment_id=<?php echo $row['bill_Id']; ?>">Delete</a></td>
                </tr>

                <?php	}
}
?>

            </tbody>
        </table>
    </div>

</body>

</html>