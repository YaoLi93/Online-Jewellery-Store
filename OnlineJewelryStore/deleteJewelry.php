<?php
	session_start();
	$err = "";
	$mysql = mysqli_connect("localhost:8889","root","root","Jewelry_STORE");
	if (mysqli_connect_errno()){
		$err .= "Failed to connect to MySQL: ".mysqli_connect_error().", ";
	}

	$Jewelry_name = mysqli_real_escape_string($mysql,$_POST['Jewelry_name']);
	$query = "UPDATE Jewelry SET isDeleted = 1 WHERE Jewelry_name = '".$Jewelry_name."';";
	if (!mysqli_query($mysql,$query)) {
		$err .= "Error: ".$query.mysqli_error($mysql).", ";
	}

	echo $err;

?>