<?php 
include "../db.php";

// if the form's update button is clicked, we need to process the form
	if (isset($_POST['update'])) {

		$product_id = $_GET['id'];
		$product_name = $_POST['product_name'];
		$product_image = $_POST['product_image'];
		$product_description = $_POST['product_description'];
		$product_price = $_POST['product_price'];
		$product_quantity = $_POST['product_quantity'];



		// write the update query
		$sql = "UPDATE `product` SET `product_name`='$product_name',`product_image`='$product_image',`product_description`='$product_description',`product_price`='$product_price,`product_quantity`='$product_quantity', WHERE `product_id`='$product_id'";

		// execute the query
		$result = $con->query($sql);

		if ($result == TRUE) {
			echo "Record updated successfully.";
		}else{
			echo "Error:" . $sql . "<br>" . $conn->error;
		}
	}


// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id'])) {
	$product_id = $_GET['id'];
	

	// write SQL to get user data
	$sql = "SELECT * FROM `product` WHERE `product_id`='$product_id'";

	//Execute the sql
	$result = $con->query($sql);

	if ($result->num_rows > 0) {
		
		while ($row = $result->fetch_assoc()) {
			$product_name = $row['product_name'];
			$product_image = $row['product_image'];
			$product_description = $row['product_description'];
			$product_price = $row['product_price'];
			$product_quantity = $row['product_quantity'];
			
		}

	?>

	 <!DOCTYPE html>
	 <html lang="en">
	 <head>
	 <link rel="stylesheet" href="style.css" type="text/css">
	 </head>
	 <body>
		 
	
		
		<div class="product-form">

		<form action="" method="post">
		    <h2>update products</h2>
		   <br>
		    <input type="text" name="product_name" value="<?php echo $product_name; ?>">
		   <br>
		    <input type="text" name="product_image" value="<?php echo $product_image; ?>">
		    <br>
		    <input type="text" name="product_description" value="<?php echo $product_description; ?>">
		    <br>
		    <input type="text" name="product_price" value="<?php echo $product_price; ?>">
		    <br>
		    <input type="text" name="product_quantity" value="<?php echo $product_quantity; ?>">
		    <br>
		    <input type="submit" value="Update" name="update">
		  </fieldset>
		</form>
        <div></div>
		</body>
		</html>




	<?php
	} else{
		// If the 'id' value is not valid, redirect the user back to view.php page
	//	header('Location: view.php');
	}

}
?>