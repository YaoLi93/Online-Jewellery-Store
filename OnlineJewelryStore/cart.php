<?php
	session_start();
	$err = "";
	$mysql = mysqli_connect("localhost:8889","root","root","Jewelry_STORE");
	if (mysqli_connect_errno()){
		$err .= "Failed to connect to MySQL: ".mysqli_connect_error()."<br/>";
	}

	$user_id = $_SESSION['id'];
	if($user_id == ""){
		$err .= "Session expires, please re-login.";
	}
	else{
		$Jewelrys = array();

		$query = "SELECT * FROM SHOPPING_CART WHERE user_id = $user_id AND check_out = 0;";
		$result = mysqli_query($mysql,$query);
		while($tuple = mysqli_fetch_array($result)){
			$Jewelry_id = $tuple['Jewelry_id'];
			$order_id=$tuple['order_id'];
			$query = "SELECT * FROM Jewelry WHERE Jewelry_id = $Jewelry_id AND isDeleted = 0;";
			$record = mysqli_query($mysql,$query);
			if(mysqli_num_rows($record)!=0){
				$Jewelry = mysqli_fetch_array($record);
				$Jewelry_name = $Jewelry['Jewelry_name'];
				$rating = $Jewelry['Jewelry_rating'];
				$year = $Jewelry['year'];
				$price = $Jewelry['price'];
				
				$single_Jewelry = array('id'=>$Jewelry_id,'name'=>$Jewelry_name,'rating'=>$rating,'year'=>$year,'price'=>$price,'order_id'=>$order_id);
				array_push($Jewelrys, $single_Jewelry);

			}
	

		}
	}


	$message = array('err'=>$err,'list'=>$Jewelrys);
	echo json_encode($message);



?>