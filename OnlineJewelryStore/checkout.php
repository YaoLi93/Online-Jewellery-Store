<?php
	session_start();
	$err = "";

	$mysql = mysqli_connect("localhost:8889","root","root","Jewelry_STORE");
	if (mysqli_connect_errno()){
		$err .= "Failed to connect to MySQL: ".mysqli_connect_error().", ";
	}

	$Jewelry_id = $_POST['Jewelry_id'];
	$order_id=$_POST['order_id'];
	$user_id = $_SESSION['id'];


	$query = "UPDATE SHOPPING_CART SET check_out = 1, date = curdate() WHERE Jewelry_id = $Jewelry_id AND user_id = $user_id AND order_id=$order_id;";
	if (!mysqli_query($mysql,$query)) {
		$err .= "Error: ".$query.mysqli_error($conn).", ";
	}
	echo $err;


?>