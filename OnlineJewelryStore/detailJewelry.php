<?php
	session_start();
	$err = "";
	$single_Jewelry = array();
	$mysql = mysqli_connect("localhost:8889","root","root","Jewelry_STORE");
	if (mysqli_connect_errno()){
		$err .= "Failed to connect to MySQL: ".mysqli_connect_error()."<br/>";
	}

	$Jewelry_id = $_POST['Jewelry_id'];
	$query = "SELECT * FROM Jewelry WHERE Jewelry_id = $Jewelry_id;";
	$result = mysqli_query($mysql,$query);
	$Jewelry = mysqli_fetch_array($result);
	$name = $Jewelry['Jewelry_name'];
	$rating = $Jewelry['Jewelry_rating'];
	$year = $Jewelry['year'];
	$price = $Jewelry['price'];
	$cat_array = array();

	$query = "SELECT * FROM CATEGORY WHERE Jewelry_id = $Jewelry_id;";
	$cat_result = mysqli_query($mysql,$query);
	while($cat = mysqli_fetch_array($cat_result)){
		$cat_temp = $cat['category'];
		array_push($cat_array,$cat_temp);
	}
	$single_Jewelry = array('id'=>$id,'name'=>$name,'rating'=>$rating,'year'=>$year,'price'=>$price,'category'=>$cat_array);
	

	echo json_encode($single_Jewelry);



?>