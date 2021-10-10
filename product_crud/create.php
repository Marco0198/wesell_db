<?php 
include "../db.php";

// if the form's submit button is clicked, we need to process the form
	if (isset($_POST['submit'])) {
		// get variables from the form
		$product_name = $_POST['productName'];
		$product_image = $_POST['productImage'];
		$product_description = $_POST['productDescription'];
		$product_price = $_POST['price'];
		$product_code = $_POST['code'];
		$product_quantity = $_POST['productQuantity'];
		$product_admin = $_POST['adminId'];


		//write sql query
		$sql = "INSERT INTO product (product_name, product_image, product_description, product_price, code,product_quantity,admin_id) VALUES ('$product_name','$product_image','$product_description','$product_price','$product_code','$product_quantity','$product_admin')";

		// execute the query

		$result = $con->query($sql);

		if ($result == TRUE) {
			echo "New record created successfully.";
		}else{
			echo "Error:". $sql . "<br>". $con->error;
		}

		$con->close();

	}



?>

<!DOCTYPE html>
<html>
  <head>	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>


<div class="product-form">
<h2> Adding new Product</h2>
<form action="" method="POST">

   
    
    <input type="text" name="productName" placeholder="product name" required>
    <br>
   
    <input type="text" name="productImage" placeholder="Enter Product Image" required>
    <br>
    
    <input type="text" name="productDescription" placeholder="Enter Product Description" required>
    <br>
    
    <input type="text" name="price"  placeholder="Enter Product Price" required>
    <br>
	<input type="text" name="code" placeholder="Enter Product code" required>
    <br>
    <input type="text" name="productQuantity" placeholder="Enter Product Quantity" required><br>

	<input type="text" name="adminId" placeholder="Enter Product admin" required><br>

   
    <input type="submit" name="submit" value="submit">

</form>
</div>
</body>
</html>