<?php
	session_start();
	$err = "";
	$list = array();
	$mysql = mysqli_connect("localhost:8889","root","root","project");
	if (mysqli_connect_errno()){
		$err .= "Failed to connect to MySQL: ".mysqli_connect_error()."<br/>";
	}

	$Jewelry_name = mysqli_real_escape_string($mysql,$_POST['Jewelry_name']);
	$category = $_POST['category'];
	if($Jewelry_name != "" &&$category !=""){
		$query = "SELECT * FROM Jewelry NATURAL JOIN category WHERE Jewelry_name LIKE '%".$Jewelry_name."%' AND isDeleted = 0 AND category LIKE '%".$category."%';";
	}else if($Jewelry_name != ""){
		$query = "SELECT * FROM CATEGORY  NATURAL JOIN Jewelry WHERE Jewelry_name LIKE '%".$Jewelry_name."%' AND isDeleted = 0;";
	}else if($category !=""){
		$query = "SELECT * FROM CATEGORY  NATURAL JOIN Jewelry WHERE category = '".$category."' AND isDeleted = 0;";
	}else{
		$query = "SELECT * FROM CATEGORY NATURAL JOIN Jewelry WHERE isDeleted = 0;";
	}
	$result = mysqli_query($mysql,$query);
		while($Jewelry = mysqli_fetch_array($result)){
				$id = $Jewelry['Jewelry_id'];
				$name = $Jewelry['Jewelry_name'];
				$rating = $Jewelry['Jewelry_rating'];
				$year = $Jewelry['year'];
				$price = $Jewelry['price'];
				$cat_array = $Jewelry['category'];
				// echo "<p>"+$id+"</p>";
				
				$single_Jewelry = array('id'=>$id,'name'=>$name,'rating'=>$rating,'year'=>$year,'price'=>$price,'category'=>$cat_array);
				array_push($list,$single_Jewelry);
			}




	$mysql->close();
	$message = array('err'=>$err,'list'=>$list);
	echo json_encode($message);

?>