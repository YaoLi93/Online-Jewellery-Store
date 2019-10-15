<?php
	session_start();
	$err = "";

	$mysql = mysqli_connect("localhost:8889","root","root","Jewelry_STORE");
	if (mysqli_connect_errno()){
		$err .= "Failed to connect to MySQL: ".mysqli_connect_error().", ";
	}

	$user_id = $_SESSION['id'];
	$Jewelry_id = $_POST['Jewelry_id'];
	$order_id=$_POST['order_id'];
	$query = "DELETE FROM SHOPPING_CART WHERE user_id = $user_id AND Jewelry_id = $Jewelry_id AND order_id=$order_id;";
	if (!mysqli_query($mysql,$query)) {
		$err .= "Error: ".$query.mysqli_error($conn).", ";
	}else{
		$err .= "Item is already removed form your shopping cart.";
	}
	echo $err;

?>