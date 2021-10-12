<?php
include "db.php";

    // if the form's submit button is clicked, we need to process the form
    if (isset($_POST['woocommerce_checkout_place_order'])) {
		// get variables from the billing form

		
		$country = $_POST['billing_country'];
        $firstname = $_POST['billing_first_name'];
        $lastname = $_POST['billing_last_name'];
        $address = $_POST['billing_address_1'];
        $apartement = $_POST['billing_address_2'];

        $town = $_POST['billing_city'];
        $province = $_POST['billing_state'];
        $postcode = $_POST['billing_postcode'];
        $email = $_POST['billing_email'];
        $phonenumber = $_POST['billing_phone'];

        //writesql query
        $sql= "INSERT INTO bill (country, firstname, lastname, address, Town, province, postcode, email, phonenumber, apartment) VALUES ('$country','$firstname','$lastname','$address','$town','$province','$postcode','$email','$phonenumber','$apartement')";
        // execute the query

		$result = mysqli_query($con,$sql);

		if ($result == TRUE) {
			echo "New record created successfully.";
		}else{
			echo "Error:". $sql . "<br>". $con->error;
		}
        $con->close();
    }
    


?>