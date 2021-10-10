<?php 
include "../db.php";

//write the query to get data from users table

$sql = "SELECT * FROM product";

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
		<h2>Products</h2>
<table class="table">           
	<thead>
		<tr>
		<th>Product Id</th>
		<th>product name </th>
		<th>product description</th>
		<th>product price</th>
		<th>product quantity</th>
		<th>Action</th>
	</tr>
	</thead>
	<tbody>	
		<?php
			if ($result->num_rows > 0) {
				//output data of each row
				while ($row = $result->fetch_assoc()) {
		?>

					<tr>
					<td><?php echo $row['product_id']; ?></td>
					<td><?php echo $row['product_name']; ?></td>
					<td><?php echo $row['product_description']; ?></td>
					<td><?php echo $row['product_price']; ?></td>
					<td><?php echo $row['product_quantity']; ?></td>

					<td><a class="btn btn-info" href="update.php?id=<?php echo $row['product_id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['product_id']; ?>">Delete</a></td>
					</tr>	
					
		<?php		}
			}
		?>
	        	
	</tbody>
</table>
	</div>

</body>
</html>