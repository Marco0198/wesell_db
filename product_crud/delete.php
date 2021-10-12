<?php 
include "../db.php";
// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id'])) {
	$product_id = $_GET['id'];

	// write delete query
	$sql = "DELETE FROM `product` WHERE `product_id`='$product_id'";

	// Execute the query

	$result = $con->query($sql);

	if ($result == TRUE) {
		echo "Record deleted successfully.";
	}else{
		echo "Error:" . $sql . "<br>" . $con->error;
	}
}

?>