<?php
	session_start();
	$err = "";

	$conn = new mysqli('localhost', 'root', 'root', 'Jewelry_store');
	if (mysqli_connect_errno()){
		$err .= "Failed to connect to MySQL: ".mysqli_connect_error().", ";
	}
	$Jewelry_id = $_POST['Jewelry_id'];
	$Jewelry_name = mysqli_real_escape_string($conn,$_POST['Jewelry_name']);
	$rating = $_POST['rating'];
	$year = $_POST['year'];
	$price = $_POST['price'];

	$query = "UPDATE Jewelry SET Jewelry_name = '".$Jewelry_name."',Jewelry_rating = '".$rating."', year = '".$year."',price = '".$price."' WHERE Jewelry_id = $Jewelry_id;";



	if (!mysqli_query($conn,$query)) {
		$err .= "Error: ".$query.mysqli_error($conn).", ";
	}else{ // insert Jewelry row successfully
		$query = "DELETE FROM CATEGORY WHERE Jewelry_id = '".$Jewelry_id."';";
		if (!mysqli_query($conn,$query)) {
			$err .= "Error: ".$query.mysqli_error($conn).", ";
		}	

		foreach ($_POST["category"] as $category) {
			$query = 'INSERT INTO `Category`(`Jewelry_id`, `category`) VALUES ('.$Jewelry_id.',"'.$category.'")';
			if (!mysqli_query($conn,$query)) {
				$err .= "Error: ".$query.mysqli_error($conn).", ";
			}		
		}	
		// upload image
		if ($_FILES["image"]["error"] > 0){
			$err .= "Return Code: " . $_FILES["image"]["error"] . ", ";
		}else{
			$sourcePath = $_FILES['image']['tmp_name']; // Storing source path of the file in a variable
			$_FILES["image"]["name"] = $Jewelry_id.".jpg";
			$targetPath = "inventory/images/".$_FILES['image']['name']; // Target path where file is to be stored
			move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
		}
		// upload synopsis
		if ($_FILES["synopsis"]["error"] > 0){
			$err .= "Return Code: " . $_FILES["synopsis"]["error"] . ", ";
		}else{
			$sourcePath = $_FILES['synopsis']['tmp_name']; // Storing source path of the file in a variable
			$_FILES["synopsis"]["name"] = $Jewelry_id.".txt";
			$targetPath = "inventory/synopsis/".$_FILES['synopsis']['name']; // Target path where file is to be stored
			move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
		}

	}
	echo $err;


?>
