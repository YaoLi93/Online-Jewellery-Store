<?php
	session_start();
	$err = "";
	$mysql = mysqli_connect("localhost:8889","root","root","Jewelry_STORE");
	if (mysqli_connect_errno()){
		$err .= "Failed to connect to MySQL: ".mysqli_connect_error()."<br/>";
	}

	$user_id = $_SESSION['id'];
	
	$Jewelry_id = $_POST['Jewelry_id'];
	$order_id=rand(0,10000);
	
	if($user_id == ""){
		$err = "Please login. ";
	}else{
/*category
		$query = "SELECT * FROM SHOPPING_CART WHERE user_id = '".$user_id."' AND Jewelry_id = '".$Jewelry_id."';";
		$result = mysqli_query($mysql,$query);
		if(mysqli_num_rows($result) != 0){
			$err .= "This item is in your shopping cart or you have already bought it before.";
		}else{
*/
			$query = "INSERT INTO SHOPPING_CART VALUES ($user_id,$Jewelry_id,0,curdate(),$order_id);";
			if (!mysqli_query($mysql,$query)) {
				$err .= $query.mysqli_error($mysql).", ";
			}
// 		}
	}
	echo $err;






?>